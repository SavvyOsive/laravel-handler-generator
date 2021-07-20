<?php

namespace Savvyosive\HandlerGenerator;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class HandlerGenerator
{
    protected Filesystem $readFilesystem;
    protected Filesystem $writeFilesystem;

    public static function handler(): self
    {
        return new static();
    }

    public function __construct()
    {
        $readAdapter = new Local(__DIR__.'/../stubs/');
        $writeAdapter = new Local(__DIR__.'/../generated/');
        $this->readFilesystem = new Filesystem($readAdapter);
        $this->writeFilesystem = new Filesystem($writeAdapter);
    }

    public function generate()
    {
        $stubContent = $this->readStub();
        $processedStub = $this->processStub($stubContent);
        $this->save($processedStub);
        $this->register("ClientHandler");
    }

    private function readStub()
    {
        $stubContent = $this->readFilesystem->read("Handler.stub");

        return $stubContent;
    }

    private function processStub(string $stubContent)
    {
        $processedStub = str_replace('<Model>', 'Client', $stubContent);

        return $processedStub;
    }

    private function save(string $processedStub)
    {
        $this->writeFilesystem->write('ClientHandler.php', $processedStub);
    }

    private function register($handlerName)
    {
        app()->singleton($handlerName, function () use ($handlerName) {
            return new $handlerName();
        });
    }
}
