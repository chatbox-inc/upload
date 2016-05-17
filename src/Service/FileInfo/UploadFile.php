<?php
namespace Chatbox\Upload\Service\FileInfo;
use Chatbox\Upload\Service\FileInfoServiceInterface;
use Chatbox\Upload\Entity\UploadFileInterface;
use Chatbox\Upload\Service\UploadServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/13
 * Time: 0:49
 */
class UploadFile extends Model implements FileInfoServiceInterface,UploadFileInterface
{
    protected $table = "tbl_upload";

    protected $fillable = ["name","size","mime","key"];

    public function info(){
        return $this->hasMany(UploadInfo::class,"key","key");
    }

    public function get(array $conj):array
    {
        $uploadList = $this->all();
        return $uploadList->all();
    }

    public function store(UploadFileInterface $file)
    {
        $key = Str::random();

        $fileEloquent = $this->newInstance([
            "name" => $file->getName(),
            "size" => $file->getSize(),
            "mime" => $file->getMime(),
            "key" => $key
        ]);
        $fileEloquent->save();
        if($infoList = $file->getInfo()){
            foreach ($infoList as $name=>$value) {
                $info = new UploadInfo([
                    "key" => $key,
                    "name" => $name,
                    "value" => $value,
                ]);
                $info->save();
            }
        }
        \Log::error("hoge",$infoList);
        return $key;
    }

    public function remove($key)
    {
        $this->where("key",$key)->first()->delete();
    }


    public function getMime()
    {
        return $this->mime;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getData()
    {
        // TODO implement
    }

    public function getName()
    {
        return $this->name;
    }

    public function getInfo():array
    {
        $infoList = $this->info()->get();
        $rtn = [];
        foreach ($infoList as $info) {
            $rtn[$info->name] = $info->value;
        }
        return $rtn;
    }


}