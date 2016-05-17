<?php

require_once __DIR__.'/../vendor/autoload.php';

use Chatbox\Upload\Entity\FileInfoServiceInterface;
use Chatbox\Upload\Entity\FileStorageServiceInterface;


try {
    (new \Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
    throw $e;
}

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/')
);

$app->withFacades();

$app->withEloquent();

$app->register(\Chatbox\Upload\UploadServiceProvider::class);

$app->get("/",function(){
    return redirect("/app");
});

return $app;
