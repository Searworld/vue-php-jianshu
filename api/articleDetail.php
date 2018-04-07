<?php
/**
 * Created by PhpStorm.
 * User: sear
 * Date: 2018/1/1
 * Time: 下午12:01
 */
//$link = mysqli_connect("localhost", "demo", "demo", 'demo');
$link = mysqli_connect("120.79.1.128", "demo", "demo", 'demo');
//浏览器设置为UTF8
header("Content-Type:text/html;charset=utf-8");
header('Content-type:application/json;charset=utf-8');
//解决跨域访问问题
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
//字符转换,解决中文转码错误问题
mysqli_query($link, 'set names utf8');
if ($link) {
    $data = file_get_contents("php://input");
    $articleId = json_decode($data)->articleId;
    $sql = "select * from articles where articleId = '$articleId'";
    $result = mysqli_query($link, $sql);
    $arr = array();//开始转换
    while ($row = mysqli_fetch_assoc($result)) {
        $arr = $row;
    };
    echo json_encode($arr);
    mysqli_close($link);
} else {
    echo '数据库链接错误';
}
?>