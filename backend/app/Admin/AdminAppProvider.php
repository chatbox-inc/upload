<?php
namespace App\Admin;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/04/24
 * Time: 23:32
 */
class AdminAppProvider extends ServiceProvider
{
    public function register()
    {
        /** @var Application $app */
        $app = $this->app;

        $app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \App\Admin\Exceptions\Handler::class
        );
    }

}
