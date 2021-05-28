<?php

declare(strict_types=1);

namespace VertaalbureauPerfect\ActionPattern;

class ActionFake
{
    public $returnValue;

    protected int $time_executed = 0;

    public function handle()
    {
        $this->time_executed ++;
        return $this->returnValue;
    }

    public function getTimesExecuted(): int
    {
        return $this->time_executed;
    }
}
