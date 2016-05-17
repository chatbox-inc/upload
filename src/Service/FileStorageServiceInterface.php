<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/13
 * Time: 0:52
 */

namespace Chatbox\Upload\Service;

use Chatbox\Upload\Entity\UploadFileInterface;

interface FileStorageServiceInterface
{
    static public function getUrl($key);

    public function store($key,UploadFileInterface $file);

    public function remove($key);

}