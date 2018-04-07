<?php
/**
 * Created by PhpStorm.
 * User: sear
 * Date: 2017/12/10
 * Time: 下午5:52
 */
$link = mysqli_connect("localhost", "demo", "demo", 'demo');
//$link = mysqli_connect("localhost", "root", "123456", 'login');

//浏览器设置为UTF8
header("Content-Type:text/html;charset=utf-8");
header('Content-type:application/json;charset=utf-8');
//解决跨域访问问题
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
//字符转换,解决中文转码错误问题
mysqli_query($link, 'set names utf8');
if (!$link) {
    echo '链接失败';
}
$sql = 'select * from imgList';
$result = mysqli_query($link, $sql);
$arr = array();//开始转换
while ($row = mysqli_fetch_assoc($result)) {

    $arr[] = $row;
};
echo json_encode($arr);
mysqli_close($link);
?>