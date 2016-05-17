<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/13
 * Time: 0:52
 */

namespace Chatbox\Upload\Service;

use Chatbox\Upload\Entity\UploadFileInterface;


interface FileInfoServiceInterface
{
    /**
     * UploadFileInterface の配列
     */
    public function get(array $conj):array;

    public function store(UploadFileInterface $file);

    public function remove($key);

}