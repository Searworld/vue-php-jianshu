<?php
/**
 * Created by PhpStorm.
 * User: sear
 * Date: 2017/12/23
 * Time: 上午12:36
 */

//$mysqli = mysqli_connect("localhost", "demo", "demo", 'demo');
$mysqli = mysqli_connect("120.79.1.128", "demo", "demo", 'demo');
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
$content = json_decode($data)->content;
$articleHead = json_decode($data)->articleHead;
$isSave = json_decode($data)->isSave;
$sql = "INSERT INTO articles(content,articleHead,isSave,time) VALUES('$content','$articleHead','$isSave',CURTIME())";
if (mysqli_query($mysqli, $sql)) {
    echo 'ok';
} else {
    die('errors' . mysqli_error());
}
//$stmt = $mysqli->prepare("INSERT INTO articles(content,articleHead) VALUES (?,?)");
//$data = file_get_contents("php://input");
//$content = json_decode($data)->content;
//$articleHead = json_decode($data)->articleHead;
//$stmt->bind_param('ss', $content, $articleHead);
//执行命令
//if ($stmt->execute()) {
//    echo "ok";
//} else {
//    echo "error";
//}
//$stmt->close();
mysqli_close($mysqli);
?>