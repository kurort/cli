<?php

namespace Kurort\Cli\Commands;

namespace Kurort\Cli\Commands;

use Illuminate\Console\Command;
use Kurort\Cli\Process;

class SystemUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update & Upgrade';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $command = 'sudo apt-get update && sudo apt-get -y upgrade && apt-get autoremove && apt-get autoclean';

        Process::run($command, function (){

        });

        return Command::SUCCESS;
    }
}