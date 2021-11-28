<?php

namespace Kurort\Cli\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class SiteAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:add {site}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is a simple hello world';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $site = $this->argument('site');
        $files = new Filesystem();

        if ($files->exists("/home/kurort/$site")) {
            $this->warn('Site exist');
            return Command::INVALID;
        }

        $files->makeDirectory("/home/kurort/$site");

        collect([
            __DIR__.'/../../stubs/site/favicon.ico',
            __DIR__.'/../../stubs/site/index.html',
            __DIR__.'/../../stubs/site/robots.txt',
        ])->each(fn($file) => $files->copy($file, "/home/kurort/$site"));

        $template = $files->get(__DIR__.'/../../stubs/nginx');
        $files->put("/etc/nginx/sites-available/$site", Str::of($template)->replace('$site', $site));
        $files->link("/etc/nginx/sites-available/$site", "/etc/nginx/sites-enabled/$site");

        collect([
            __DIR__.'/../../stubs/nginx',
        ])->each(fn($file) => $files->copy($file, "/home/kurort/$name"));

        return Command::SUCCESS;
    }
}