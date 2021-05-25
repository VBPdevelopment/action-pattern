<?php

declare(strict_types=1);

namespace VertaalbureauPerfect\ActionPattern;

class ActionFake
{
    public $returnValue;

    public function handle()
    {
        return $this->returnValue;
    }
}
