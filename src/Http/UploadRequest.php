<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/13
 * Time: 0:05
 */

namespace Chatbox\Upload\Http;

use Chatbox\Upload\Entity\UploadFileInterface;
use Illuminate\Http\Request;

class UploadRequest
{
    protected $request;

    /**
     * UploadRequest constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function getFile():UploadFileInterface{
        $file = $this->request->get("file");
        $info = $this->request->get("info",[]);

        \Log::info("hogehogepiyo",$info);
        return $this->getFileObj($file,$info);
    }

    protected function getFileObj($file,$info){
        return new class($file,$info) implements UploadFileInterface{

            protected $file;
            protected $info;

            public function __construct(array $file,array $info){
                $this->file = $file;
                $this->info = $info;
            }

            public function getMime()
            {
                return $this->file["mime"];
            }

            public function getSize()
            {
                return $this->file["size"];
            }

            /**
             * DataURL のフォーマット data:[<mediatype>][;base64],<data>
             */
            public function getData()
            {
                $data = $this->file["data"];
                list($mime,$data) = explode(",",$data,2);
                return base64_decode($data);
            }

            public function getName()
            {
                return $this->file["origin"];
            }

            public function getKey()
            {
                return null;
            }

            public function getInfo():array
            {
                return $this->info;
            }
        };
    }

    public function getFileKey(){
        $fileKey = $this->request->get("key");
        return $fileKey;
    }

}