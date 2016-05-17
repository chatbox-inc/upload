<?php
namespace Chatbox\Upload\Http;
use Chatbox\Upload\Service\UploadService;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/13
 * Time: 0:05
 */
class UploadController
{
    protected $upload;

    protected $request;

    /**
     * UploadController constructor.
     * @param $upload
     */
    public function __construct(UploadService $upload,UploadRequest $request)
    {
        $this->upload = $upload;
        $this->request = $request;
    }

    public function get()
    {
        $data =  $this->upload->get([]);

        $rtn = [];
        foreach ($data as $item) {
            $rtn[] = [
                "key" => $item->key,
                "info" => $item->getInfo()
            ];
        }
        return $rtn;

    }

    public function post()
    {
        $file = $this->request->getFile();

        $this->upload->store($file);

    }

    public function put()
    {

    }

    public function delete()
    {
        $key = $this->request->getFileKey();
        $this->upload->remove($key);
        return [];

    }

    protected function format(){

    }

}