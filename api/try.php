<?php
/**
 * Created by PhpStorm.
 * User: sear
 * Date: 2018/1/3
 * Time: 下午7:48
 */
//$link = mysqli_connect("ftp6124385.host580.zhujiwu.me", "zjwdb_6124385", "Helloworld123", "zjwdb_6124385");
$link = mysqli_connect("111.67.201.205", "zjwdb_6124385", "Helloworld123", "zjwdb_6124385");
if($link) {
   echo 'yes';
}else{
    echo 'no';
}
?>

