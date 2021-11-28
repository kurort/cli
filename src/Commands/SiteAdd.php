<?php

namespace Kurort\Cli\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use \Illuminate\Filesystem\FilesystemManager;

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
     * @var FilesystemManager
     */
    private FilesystemManager $fileManager;

    /**
     * @param  FilesystemManager  $filesystemManager
     */
    public function __construct(FilesystemManager $filesystemManager)
    {
        $this->fileManager = $filesystemManager;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $site = $this->argument('site');


        if ($this->fileManager->disk('home')->exists($site)) {
            $this->warn('Site exist');
            return Command::INVALID;
        }

        $this->fileManager->disk('home')->makeDirectory($site);

        collect([
            'favicon.ico',
            'index.html',
            'robots.txt',
        ])->each(fn($file) => $this->fileManager->disk('global')->copy(__DIR__.'/../../stubs/site/'.$file, "/home/kurort/$site/$file"));

        $template = $this->fileManager->disk('stubs')->get('nginx');

        $this->fileManager->put("/etc/nginx/sites-available/$site", Str::of($template)->replace('$site', $site));
        //$this->fileManager->relativeLink("/etc/nginx/sites-available/$site", "/etc/nginx/sites-enabled/$site");


        $fileSystem = new Filesystem();
        $fileSystem->relativeLink("/etc/nginx/sites-available/$site", "/etc/nginx/sites-enabled/$site");

        return Command::SUCCESS;
    }
}