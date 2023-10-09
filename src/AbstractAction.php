<?php

declare(strict_types=1);

namespace VertaalbureauPerfect\ActionPattern;

use Illuminate\Container\Container;
use PHPUnit\Framework\Assert;

abstract class AbstractAction
{
    final public static function fake($returnValue = null)
    {
        $fake = new ActionFake();
        $fake->returnValue = $returnValue;

        Container::getInstance()->instance(static::class, $fake);
    }

    final public static function execute(...$parameters)
    {
        return call_user_func_array([
            resolve(static::class),
            'handle'
        ], $parameters);
    }

    public static function assertExecuted(): void
    {
        $action = resolve(static::class);
        Assert::assertGreaterThan(0, $action->getTimesExecuted(), class_basename(static::class) . 'Action not executed');
    }

    public static function assertExecutedExactly(int $times): void
    {
        $action = resolve(static::class);
        Assert::assertEquals($times, $action->getTimesExecuted(), class_basename(static::class) . 'Action not executed '. $times . ' times, but ' . $action->getTimesExecuted());
    }

}
