<?php
namespace App\Providers;
use Monolog\Logger;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\AbstractProcessingHandler;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('customlogger', function () {
            return new Logger('customlogger', [new CustomLogHandler()]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

class CustomLogHandler extends AbstractProcessingHandler
{
    protected function write(array $record): void
    {
        \DB::table('logs')->insert([
            'level' => $record['level'],
            'message' => $record['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
