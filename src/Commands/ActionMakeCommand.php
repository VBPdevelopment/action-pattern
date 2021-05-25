<?php

declare(strict_types=1);

namespace VertaalbureauPerfect\ActionPattern\Commands;

use Illuminate\Console\GeneratorCommand;

class ActionMakeCommand extends GeneratorCommand
{
    protected $name = 'make:action';

    protected $description = 'Create a new action';

    protected $type = 'Action';

    protected function getStub()
    {
        return __DIR__ . '/../../stubs/Action.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Actions';
    }

    protected function getNameInput(): string
    {
        return trim($this->argument('name')) . 'Action';
    }
}
