<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/13
 * Time: 0:16
 */

namespace Chatbox\Upload\Entity;


interface UploadFileInterface
{
    public function getKey();

    public function getMime();

    public function getSize();

    public function getData();

    public function getName();

    public function getInfo():array;

}