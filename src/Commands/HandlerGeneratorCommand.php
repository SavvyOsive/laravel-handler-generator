<?php

namespace Savvyosive\HandlerGenerator\Commands;

use Illuminate\Console\Command;
use Savvyosive\HandlerGenerator\HandlerGenerator;

class HandlerGeneratorCommand extends Command
{
    public $signature = 'laravel-handler-generator';

    public $description = 'Generate Handlers For Your Models';

    public function handle()
    {
        $outputText = config('handler-generator.stub_directory');

        $this->comment($outputText);
    }
}
