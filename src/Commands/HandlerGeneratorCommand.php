<?php

namespace Savvyosive\HandlerGenerator\Commands;

use Illuminate\Console\Command;

class HandlerGeneratorCommand extends Command
{
    public $signature = 'laravel-handler-generator';

    public $description = 'Generate Handlers For Your Models';

    public function handle()
    {
        HandlerGenerator::handler()->generate();

        $this->comment('Generated Handlers for models ....');
    }
}
