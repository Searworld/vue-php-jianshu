<?php
/**
 * Created by PhpStorm.
 * User: sear
 * Date: 2017/12/23
 * Time: 上午12:36
 */
//收藏
$mysqli = new mysqli("localhost", "demo", "demo", 'demo');
//$mysqli = new mysqli("120.79.1.128", "demo", "demo", 'demo');


//浏览器设置为UTF8
header("Content-Type:text/html;charset=utf-8");
header('Content-type:application/json;charset=utf-8');
//解决跨域访问问题
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
//字符转换,解决中文转码错误问题
mysqli_query($mysqli, 'set names utf8');

$data = file_get_contents("php://input");
$articleId = json_decode($data)->articleId;
$isSave = json_decode($data)->isSave;
$sql = "update articles set isSave='$isSave' where articleId = '$articleId' ";
if (mysqli_query($mysqli, $sql)) {
    echo $isSave;
} else {
    echo "Could not update record: " . mysqli_error($mysqli);
}

?>