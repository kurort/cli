<?php

namespace Kurort\Cli\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Kurort\Cli\Process;

class ServiceStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:status {service}';

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
     */
    public function handle()
    {
        $service = $this->argument('service');

        $command = sprintf('service %s status', $service);

        Process::run($command, function ($output) use ($service) {
            $running = Str::contains($output, ['memcached is running', 'active (running)']);

            $running
                ? $this->comment($service.' is running')
                : $this->comment($service.' is not running');

            $this->line($output);
        });

        return Command::SUCCESS;
    }
}