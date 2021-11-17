<?php

namespace Kurort\Cli;

use Illuminate\Support\Arr;
use PhpParser\Error;
use Symfony\Component\Process\Process as SymfonyProcess;

class Process
{
    /**
     * @param  string|array   $command
     * @param  callable|null  $success
     * @param  callable|null  $error
     */
    public static function run(string|array $command, callable $success = null, callable $error = null)
    {
        $process = new SymfonyProcess(Arr::wrap($command));

        try {
            $process->start();
            self::then($success, $process->getOutput());
        } catch (\Exception|Error $exception){
            self::then($error, $exception);
        }
    }

    /**
     * @param callable|null $callable
     * @param mixed $result
     */
    public static function then($callable, $result)
    {
        if($callable !== null){
            $callable($result);
        }
    }
}