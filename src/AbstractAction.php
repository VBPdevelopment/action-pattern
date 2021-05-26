<?php

declare(strict_types=1);

namespace VertaalbureauPerfect\ActionPattern;

use Illuminate\Container\Container;

abstract class AbstractAction
{

    protected static int $times_fake_executed = 0;

    protected static $fake;

    final public static function fake($returnValue = null)
    {
        $fake = new ActionFake();
        $fake->returnValue = $returnValue;

        self::$fake = $fake;

        Container::getInstance()->instance(static::class, $fake);
    }

    final public static function execute(...$parameters)
    {
        if (self::$fake) {
            self::$times_fake_executed++;
        }

        return call_user_func_array([
            resolve(static::class),
            'handle'
        ], $parameters);
    }

    public static function isExecuted(): bool
    {
        return self::$times_fake_executed > 0;
    }

    public static function isExecutedExactly(int $times): bool
    {
        return $times === self::$times_fake_executed;
    }

}
