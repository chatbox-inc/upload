<?php
namespace Chatbox\Upload\Service;
use Chatbox\Upload\Entity\UploadFileInterface;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/13
 * Time: 0:14
 */
class UploadService
{
    protected $info;

    protected $storage;

    /**
     * UploadService constructor.
     * @param $info
     * @param $storage
     */
    public function __construct(FileInfoServiceInterface $info,FileStorageServiceInterface $storage)
    {
        $this->info = $info;
        $this->storage = $storage;
    }

    public function get($conj){
        return $this->info->get($conj);
    }

    public function store(UploadFileInterface $file){
        $key = $this->info->store($file);
        $this->storage->store($key,$file);
    }

    public function remove($key){
        $this->storage->remove($key);
        $this->info->remove($key);
    }


}