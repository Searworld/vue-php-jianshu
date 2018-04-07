<?php
//$link = mysqli_connect("localhost", "root", "123456", 'login');
$link = mysqli_connect("localhost", "demo", "demo", 'demo');

//浏览器设置为UTF8
header("Content-Type:text/html;charset=utf-8");
header('Content-type:application/json;charset=utf-8');
//解决跨域访问问题
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
//字符转换,解决中文转码错误问题
mysqli_query($mysqli, 'set names utf8');
if ($link) {
    $data = file_get_contents("php://input");
    $user = json_decode($data)->user_name;
    $pws = json_decode($data)->pass_word;
    $sql = "select * from demo WHERE name = '$user' AND password= '$pws' ";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo 'false';
    } else {
        echo 'true';
    }
} else {
    echo '链接失败' . mysqli_connect_error();
}
?>
