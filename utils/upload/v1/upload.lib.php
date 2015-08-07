<?php
/**
 * Created by PhpStorm.
 * User: jiefzz
 * Date: 6/3/15
 * Time: 10:20 AM
 */

function getRandomFileName($index, $pre = ''){
    $target = $_FILES[$index];
    //提取后缀名
    $uploadFile = $target["name"];
    $ana = explode('.', $uploadFile);
    if(count($ana)<2)
        throw new Exception();
    $suffix = end($ana);

    //计算随机文件名
    $numbers = range (1,61);
    shuffle ($numbers);
    $randKey=$numbers[($numbers[0]+$numbers[15])%60];
    $fileMd564=getInt64(md5(serialize($target).microtime()));

    $nonce = abs((time()*$randKey*microtime()))%3000
        .DS.
        abs(($fileMd564[1]%1500)+($fileMd564[0]%1500))
        .DS.
        crc32(time().serialize($target).microtime());
    $filename = (($pre=='')?"non_pre":$pre).DS.$nonce.'.'.$suffix;
    /**
     * @todo if you change the file upload root path, pls change here too!
     */
    $res = array(
        'http' => '/upload/'.$filename,
        'sys' => FILE_ROOT_UPLOAD.DS.$filename
    );
    $targetDir = dirname($res['sys']);
    if(!mkdirs($targetDir)){
        header('HTTP/1.1 500 Internal Server Error');
        die;
    }
    return $res;
}
function mkdirs($dir){
    if(!is_dir($dir)){
        if(!mkdirs(dirname($dir))){
            return false;
        }
        if(!mkdir($dir)){
            return false;
        }
    }
    return true;
}

/**
 * @brief 返回十六进制字符的十进制标示
 * @param $ch
 * @return integer
 */
function getDecimalVal($ch)
{
    if (is_numeric($ch))
    {
        return intval(ord($ch) - ord('0'));
    }
    else
    {
        return intval(ord($ch) - ord('a') + 10);
    }
}
/**
 * @brief 将md5的返回值转化为两个int64
 * @param $strMd5Val
 * @return array
 */
function getInt64($strMd5Val)
{
    $intStrLen = strlen($strMd5Val);
    $arrMd5Val = array();
    for ($i = 0; $i < $intStrLen; ++$i)
    {
        $arrMd5Val[$i] = substr($strMd5Val, $i, 1);
    }
    $intStrHalfLen = $intStrLen / 2;
    $arrRes = array();
    $arrRes[0] = intval(0);
    $arrRes[1] = intval(0);
    for ($i = 0; $i < $intStrHalfLen; ++$i)
    {
        $arrRes[0] = intval((($arrRes[0]<<4)|getDecimalVal($arrMd5Val[$i])));
        $arrRes[1] = intval((($arrRes[1]<<4)|getDecimalVal($arrMd5Val[$intStrHalfLen + $i])));
    }
    return $arrRes;
}