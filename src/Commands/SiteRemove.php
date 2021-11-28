<?php

namespace Kurort\Cli\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class SiteRemove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:remove {site}';

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

        $files->deleteDirectory("/home/kurort/$site");
        $files->delete([
            "/etc/nginx/sites-available/$site",
            "/etc/nginx/sites-enabled/$site",
        ]);

        return Command::SUCCESS;
    }
}