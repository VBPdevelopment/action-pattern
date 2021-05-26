<?php

declare(strict_types=1);

namespace VertaalbureauPerfect\ActionPattern;

use Illuminate\Container\Container;
use PHPUnit\Framework\Assert;

abstract class AbstractAction
{

    protected static int $times_fake_executed = 0;

    protected static $fake;

    final public static function fake($returnValue = null)
    {
        $fake = new ActionFake();
        $fake->returnValue = $returnValue;

        static::$fake = $fake;

        Container::getInstance()->instance(static::class, $fake);
    }

    final public static function execute(...$parameters)
    {
        if (static::$fake) {
            static::$times_fake_executed++;
        }

        return call_user_func_array([
            resolve(static::class),
            'handle'
        ], $parameters);
    }

    public static function assertExecuted(): void
    {
        Assert::assertGreaterThan(0, static::$times_fake_executed, class_basename(static::class) . 'Action not executed');
    }

    public static function assertExecutedExactly(int $times): void
    {
        Assert::assertEquals($times, static::$times_fake_executed, class_basename(static::class) . 'Action not executed '. $times . ' times, but ' . self::$times_fake_executed);
    }

}
