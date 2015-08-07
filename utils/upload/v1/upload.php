<?php
/**
 * Created by PhpStorm.
 * User: jiefzz
 * Date: 5/9/15
 * Time: 4:26 PM
 */
define('DS', DIRECTORY_SEPARATOR);                              //定义简写的文件分隔符
define('FILE_ROOT', dirname(dirname(dirname(__DIR__))));
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
            $fileInfo = getRandomFileName($index, (isset($_POST['pre']) && !empty($_POST['pre']))?$_POST['pre']:'');
            move_uploaded_file($item["tmp_name"],$fileInfo['sys']);
            $result[$index] = $fileInfo['http'];
        }
        //header('Content-type: application/json');
        echo json_encode($result);
        exit;
    }
    header("Status: 400 Bad Request");
} else
    header("Status: 405 Method Not Allowed");