<?php

namespace Kurort\Cli;

class Process
{
    /**
     * @param  string    $command
     * @param  callable  $handle
     */
    public static function run(string $command, callable $handle): void
    {
        exec($command, $output);

        $handle(implode(PHP_EOL, $output));
    }
}