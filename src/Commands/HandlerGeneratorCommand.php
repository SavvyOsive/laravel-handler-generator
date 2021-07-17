<?php

namespace Savvyosive\HandlerGenerator\Commands;

use Illuminate\Console\Command;

class HandlerGeneratorCommand extends Command
{
    public $signature = 'laravel-handler-generator';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
