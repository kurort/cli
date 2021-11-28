<?php

namespace Kurort\Cli\Commands\Cron;

use Illuminate\Console\Command;
use Kurort\Cli\Process;

class Show extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:list {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is obtaining the list of user cron jobs';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = $this->argument('user');

        $command = sprintf('crontab -l -u %s', $user);

        Process::run($command, function ($output) {
            $this->line($output);
        });

        return Command::SUCCESS;
    }
}