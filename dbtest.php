<?php

#db 연결

$servername = 'ec2-3-36-49-209.ap-northeast-2.compute.amazonaws.com';
$username = 'juhyeok';
$password = '0603';
$db = 'userdata';

$connect= mysqli_connect($servername,$username,$password,$db);

if(empty($connect) == true){
    echo "db연결 안 됨";
}else{
    echo "연결 성공";
}

mysqli_set_charset($connect,"utf8");
?>