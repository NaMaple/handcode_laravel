<?php

//var_dump(__DIR__);
require __DIR__ . '/../vendor/autoload.php';

/**
 * Class Log
 * Log 依赖 File
 */
class Log
{
    protected $file;
    public function __construct(File $file)
    {
        $this->file = $file;
    }
}

/**
 * Class File
 * File 依赖 Sys
 */
class File
{
    protected $sys;
    public function __construct(Sys $sys)
    {
        $this->sys = $sys;
    }
}

class Sys
{

}

$container = new \Illuminate\Container\Container();
// 类名::class，带命名空间的类名

// Log 注入容器，解析 Log 的依赖
// 假如 File 还有依赖 Sys
$obj = $container->make(Log::class);

var_dump($obj);
//    object(Log)#8 (1) {
//    ["file":protected]=>
//      object(File)#9 (1) {
//      ["sys":protected]=>
//        object(Sys)#10 (0) {
//        }
//      }
//    }