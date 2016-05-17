<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/04/25
 * Time: 0:07
 */
class Debug extends Command
{
    protected $signature = "debug";

    public function handle(){
        $this->line("hogehoge");
//        throw new \Exception("hgoehoge");
    }


}