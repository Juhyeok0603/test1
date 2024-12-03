<?php


#db 연결
$servername = 'ip-172-31-11-83.ap-northeast-2.compute.internal';
$username = 'juhyeok';
$password = '0603';
$db = 'userdata';

$connect= mysqli_connect($servername,$username,$password,$db);

if(!$connect)die("연결에 실패 하였습니다.".mysqli_connect_error());

mysqli_set_charset($connect,"utf8");

?>
