<?php

namespace Savvyosive\HandlerGenerator\Tests\Feature\Commands;

use Savvyosive\HandlerGenerator\Tests\TestCase;

class HandlerGeneratorCommandTest extends TestCase
{
    /** @test **/
    public function handler_generator_command_works()
    {
        $this->artisan('laravel-handler-generator')->assertExitCode(0);
    }

    /** @test **/
    public function the_config_file_value_is_used_as_output()
    {
        $this
            ->artisan('laravel-handler-generator')
            ->expectsOutput('sampleTest')
            ->assertExitCode(0);

        $text = 'customised text';
        config()->set('handler-generator.stub_directory', $text);

        $this
            ->artisan('laravel-handler-generator')
            ->expectsOutput($text)
            ->assertExitCode(0);
    }
}
