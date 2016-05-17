<?php
namespace Chatbox\Upload\Commands;
use Chatbox\Upload\Schema\Upload;
use Chatbox\Upload\Schema\UploadData;
use Chatbox\Upload\Schema\UploadInfo;
use Illuminate\Console\Command;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/16
 * Time: 20:58
 */
class SchemaCommand extends Command
{
    protected $signature = "upload:schema";

    protected $upload;
    protected $info;
    protected $data;

    /**
     * SchemaCommand constructor.
     * @param $upload
     * @param $info
     * @param $data
     */
    public function __construct(Upload $upload,UploadInfo $info,UploadData $data)
    {
        $this->upload = $upload;
        $this->info = $info;
        $this->data = $data;

        $this->upload->table = "tbl_upload";
        $this->info->table = "tbl_upload_info";
        $this->data->table = "tbl_upload_data";

        parent::__construct();
    }


    public function handle(){

        $this->upload->up();
        $this->info->up();
        $this->data->up();



    }


}