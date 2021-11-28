<?php

namespace Kurort\Cli\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Kurort\Cli\Paths;

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
        $fileSystem = new Filesystem();

        if ($fileSystem->exists(Paths::home($site))) {
            $this->warn('Site exist');
            return Command::INVALID;
        }

        $fileSystem->makeDirectory(Paths::home($site));

        collect([
            'favicon.ico',
            'index.html',
            'robots.txt',
        ])->each(fn($file) => $fileSystem->copy(Paths::stubs("/site/$file"), Paths::home("$site/$file")));

        $template = $fileSystem->get(Paths::stubs('nginx'));

        $fileSystem->put(
            Paths::nginx("sites-available/$site"),
            Str::of($template)->replace('$site', $site)
        );

        $fileSystem->link(
            Paths::nginx("sites-available/$site"),
            Paths::nginx("sites-enabled/$site")
        );

        return Command::SUCCESS;
    }
}