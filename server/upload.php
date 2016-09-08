<?php
/**
 * Created by PhpStorm.
 * User: jiefzz
 * Date: 5/9/15
 * Time: 4:26 PM
 */
define('DS', DIRECTORY_SEPARATOR);                              //定义简写的文件分隔符
define('FILE_ROOT', __DIR__);
define('FILE_ROOT_UPLOAD', FILE_ROOT.DS.'upload');              //定于上传的根目录

require "upload.lib.php";

if($_SERVER['REQUEST_METHOD']=="POST" || $_SERVER['REQUEST_METHOD']=="PUT") {
    if (!empty($_FILES)) {
        $result = array();
        foreach($_FILES as $v){
            if ($v["error"] != 0) {
                header("Status: 415 Unsupported Media Type");
                die;
            }
        }
        foreach($_FILES as $index => $item) {
            $fileName = getRandomFileName($index);
            move_uploaded_file($item["tmp_name"], __DIR__.'/'.$fileName);
            $result[$index] = __DIR__.'/'.$fileName;
        }
        //header('Content-type: application/json');
        echo json_encode($result);
        exit;
    }
    header("Status: 400 Bad Request");
} else
    header("Status: 405 Method Not Allowed");