<?php

namespace Kurort\Cli;

use Illuminate\Console\OutputStyle;

/**
 * Source: https://github.com/RahulDey12/laravel-console-spinner
 */
class SpinnerProgress
{
    private const CHARS = ['⠏', '⠛', '⠹', '⢸', '⣰', '⣤', '⣆', '⡇'];

    /**
     * @var \Symfony\Component\Console\Helper\ProgressBar
     */
    protected $progressBar;

    /**
     * @var int
     */
    protected $step;

    public function __construct(OutputStyle $output, int $max = 0)
    {
        $this->step = 0;

        $this->progressBar = $output->createProgressBar($max);
        $this->progressBar->setBarCharacter('✔');
        $this->progressBar->setProgressCharacter(self::CHARS[0]);
        $this->progressBar->setMessage('');
        $this->progressBar->setFormat('%bar% %message%');
        $this->progressBar->setBarWidth(1);
        $this->progressBar->setRedrawFrequency(31);
    }

    /**
     * @return \Symfony\Component\Console\Helper\ProgressBar
     */
    public function getOriginalProgressBar()
    {
        return $this->progressBar;
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->progressBar, $name], $arguments);
    }

    public function advance(int $step = 1)
    {
        $this->step += $step;
        $this->progressBar->setProgressCharacter(self::CHARS[$this->step % count(self::CHARS)]);
        $this->progressBar->advance($step);
    }
}

$spinner = new SpinnerProgress($this->output, 100);

for($i = 0; $i < 100; $i++) {
    usleep(10000);
    $spinner->advance();
}

$spinner->finish();