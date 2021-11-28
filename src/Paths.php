<?php

namespace Kurort\Cli;

use Illuminate\Support\Str;

class Paths
{
    /**
     * @param  string  $path
     *
     * @return string
     */
    public static function stubs(string $path)
    {
        return __DIR__.'/../../stubs'.Str::of($path)->start('/');
    }

    /**
     * @param  string  $path
     *
     * @return string
     */
    public static function nginx(string $path)
    {
        return __DIR__.'/../stubs'.Str::of($path)->start('/');
    }

    /**
     * @param  string  $path
     *
     * @return string
     */
    public static function home(string $path)
    {
        return '/home/kurort'.Str::of($path)->start('/');
    }
}