<?php

namespace Savvyosive\HandlerGenerator\Tests\Feature\Commands;

use Savvyosive\HandlerGenerator\Tests\TestCase;

class HandlerGeneratorCommandTest extends TestCase
{
    /** @test **/
    public function handler_generator_command_works()
    {
        $this
            ->artisan('laravel-handler-generator')
            ->assertExitCode(0);
    }
}
