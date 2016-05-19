<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/13
 * Time: 0:04
 */

namespace Chatbox\Upload;


use Chatbox\Upload\Service\FileInfo\UploadFile;
use Chatbox\Upload\Service\Storage\FileStorage;
use Illuminate\Support\ServiceProvider;
use Chatbox\Upload\Http\UploadController;

use Chatbox\Upload\Service\FileInfoServiceInterface;
use Chatbox\Upload\Service\FileStorageServiceInterface;

use Chatbox\Upload\Commands\SchemaCommand;


class UploadServiceProvider extends ServiceProvider
{
    public function register()
    {
        $app = $this->app;

        $app->singleton(FileInfoServiceInterface::class,UploadFile::class);
        $app->singleton(FileStorageServiceInterface::class,FileStorage::class);

        $this->registerRoute($app);

        $this->commands([SchemaCommand::class]);
    }

    protected function registerRoute($router){
        $router->get("/api/upload",UploadController::class."@get");
        $router->post("/api/upload",UploadController::class."@post");
        $router->put("/api/upload",UploadController::class."@put");
        $router->delete("/api/upload",UploadController::class."@delete");

    }


}