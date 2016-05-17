<?php
namespace App\Console;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;
use Laravel\Lumen\Console\Kernel;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/04/24
 * Time: 23:32
 */
class ConsoleAppProvider extends ServiceProvider
{
    public function register()
    {
        /** @var Application $app */
        $app = $this->app;

        $app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \App\Console\Exceptions\Handler::class
        );

        $app->singleton(
            \Illuminate\Contracts\Console\Kernel::class,
            function(){
                return $this->makeConsoleKernel();
            }
        );

        $app->register(IdeHelperServiceProvider::class);
    }

    protected function makeConsoleKernel(){
        assert($this->app instanceof Application);
        return new class($this->app) extends Kernel{
            /**
             * The Artisan commands provided by your application.
             *
             * @var array
             */
            protected $commands = [
                Commands\Debug::class,
            ];

            /**
             * Define the application's command schedule.
             *
             * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
             * @return void
             */
            protected function schedule(Schedule $schedule)
            {
                //
            }
        };
    }
}
