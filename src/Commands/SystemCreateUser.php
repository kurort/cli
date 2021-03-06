<?php

namespace Kurort\Cli\Commands;

namespace Kurort\Cli\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Kurort\Cli\Process;

class SystemCreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:create-user {name} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is a command for creates new user.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $password = $this->argument('password');

        $command = sprintf('useradd -m %s', $name);

        Process::run($command, function ($output) {
            if (Str::contains($output, 'already exists')) {
                $this->warn($output);
            } else {
                $this->comment('User created');
            }
        });

        $command = sprintf('echo "%s:%s" | /usr/sbin/chpasswd', $name, $password);

        Process::run($command, function () {
            $this->comment('User set you password');
        });

        $this->comment('Hello World');

        return Command::SUCCESS;
    }
}