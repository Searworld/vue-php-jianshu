<?php
/**
 * Created by PhpStorm.
 * User: sear
 * Date: 2017/12/1
 * Time: 上午10:23
 */
$link = mysqli_connect("120.79.1.128", "demo", "demo", 'demo');
//$link = mysqli_connect("localhost", "demo", "demo", 'demo');
//解决跨域访问问题
header('Content-type:text/html;charset=utf8');
header('Content-type:application/json;charset=utf-8');
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:POST');

header('Access-Control-Allow-Headers:x-requested-with,content-type');
mysqli_query($link, 'set names utf8');
if (!$link) {
    echo '还没链接';
}
$data = file_get_contents("php://input");
$articleId = json_decode($data)->articleId;
$sql = "DELETE FROM articles where articleId = '$articleId'";
$result = mysqli_query($link, $sql);
if ($result) {
    echo 'true';
} else {
    echo 'false';
}
?>