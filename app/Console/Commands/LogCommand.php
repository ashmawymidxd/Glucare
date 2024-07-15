<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class LogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:log-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::emergency('This is an emergency message');
        Log::alert('This is an alert message');
        Log::critical('This is a critical message');
        Log::error('This is an error message');
        Log::warning('This is a warning message');
        Log::notice('This is a notice message');
        Log::info('This is an info message');
        Log::debug('This is a debug message');
    }
}
