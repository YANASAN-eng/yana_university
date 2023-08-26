<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:python';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'pythonファイル実行テスト';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo "cd \public\python\ test.py";
    }
}
