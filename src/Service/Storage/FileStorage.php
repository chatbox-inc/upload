<?php
namespace Chatbox\Upload\Service\Storage;
use Chatbox\Upload\Service\FileStorageServiceInterface;
use Chatbox\Upload\Entity\UploadFileInterface;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/13
 * Time: 1:08
 */
class FileStorage implements FileStorageServiceInterface
{
    static public function getUrl($key)
    {
        // TODO: Implement getUrl() method.
    }

    public function store($key, UploadFileInterface $file)
    {
        // TODO FIX PATH
        $path = $this->getPath($key);
        file_put_contents($path,$file->getData());
    }

    public function remove($key)
    {
        $path = $this->getPath($key);
        if(file_exists($path) && is_file($path) && is_writable($path)){
            unlink($path);
        }
    }

    protected function getPath($key){
        $path = app()->basePath() . "/../public/img/${key}";
        return $path;
    }

}