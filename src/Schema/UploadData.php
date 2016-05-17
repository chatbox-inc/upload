<?php
namespace Chatbox\Upload\Schema;
use Illuminate\Database\Schema\Blueprint;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/05/16
 * Time: 20:52
 */
class UploadData
{
    public $table;

    public function up()
    {
        \Schema::create($this->table,function(Blueprint $blueprint){
            $blueprint->increments("id");
            $blueprint->string("key");
            $blueprint->binary("data");
            $blueprint->timestamps();
        });
    }

    public function down()
    {
        \Schema::dropIfExists($this->table);

    }

}