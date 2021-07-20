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
        $models = $this->getListOfModelFilesToProcess();
        $stubContent = $this->readStub();

        if ($models !== null) {
            foreach ($models as $model) {
                // check if these operations are already performed for that model or not
                $modelName = str_replace('.php', '', $model);
                $processedStub = $this->processStub($stubContent, $modelName);
                $this->save($processedStub, $modelName);
                $this->register("$modelName.handler");
            }
        }
    }

    private function getListOfModelFilesToProcess(): array
    {
        $modelFilesToProcess = [];

        $recursiveDirectoryIterator = new \RecursiveDirectoryIterator('app/Models', \FilesystemIterator::SKIP_DOTS);
        $iterator = new \RecursiveIteratorIterator($recursiveDirectoryIterator);
        foreach ($iterator as $file) {
            $validModelFile = $this->checkValidModelFile($file);
            if ($validModelFile) {
                $modelFile = $file->getFilename();
                $modelFilesToProcess[] = $modelFile;
            }
        }

        return $modelFilesToProcess;
    }

    private function checkValidModelFile($modelFile): bool
    {
        $validFile = false;
        $modelFilePath = $modelFile->getPathname();
        // read each file
        $fileContent = file_get_contents($modelFilePath);

        // if the class in the file extends Model returns true
        // or check pattern for " class <name> extends Model "
        // if the class is direct children of Model
        $search = 'extends Model';
        if (str_contains($fileContent, $search)) {
            $validFile = true;
        }

        return $validFile;
    }

    private function readStub()
    {
        $stubContent = $this->readFilesystem->read("Handler.stub");

        return $stubContent;
    }

    private function processStub(string $stubContent, string $modelName)
    {
        $processedStub = str_replace('<Model>', $modelName, $stubContent);

        return $processedStub;
    }

    private function save(string $processedStub, string $modelName)
    {
        $this->writeFilesystem->write($modelName.'Handler.php', $processedStub);
    }

    private function register($handlerName)
    {
        app()->singleton($handlerName, function () use ($handlerName) {
            return new $handlerName();
        });
    }
}
