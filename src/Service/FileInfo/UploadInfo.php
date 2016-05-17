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
class UploadInfo extends Model
{
    protected $table = "tbl_upload_info";

    protected $fillable = ["name","value","key"];
}