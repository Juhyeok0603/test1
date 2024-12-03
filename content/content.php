<!--content-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글</title>
    <link type="text/css" rel="stylesheet" href="/test1/style.css">
    <style>
    
.list2{

    font-family: 'JNE-Yuna-TTF-Regular';
    text-align: center;
}
a{
    text-decoration-line: none;
    color: inherit;
}
    </style>
</head>
<body><div class="list2">
<h1><a href="../main/index.php">메인 화면</a></h3>
    <h2><a href="/test1/list/list.php">글 목록</a></h4>
    <h2><a href="../write/write.php">글 쓰기</a></h4>
    </div>
<?php
include '../dbconn.php';

session_start();
if(!isset($_SESSION['name'])){
    echo "<script>
    alert ('로그인이 필요합니다');
    location.href = '/test1/login/login_ok.php';
    </script>";
}else{
    $idx = $_GET["idx"];

$title = $_GET['title'];
//$title = isset($_GET['title']) ? $_GET['title'] : '';
//$title = mysqli_real_escape_string($connect, $title);

$query = "SELECT * from board where idx ='$idx'";
$result = mysqli_query($connect, $query);

$sql = "UPDATE board SET look=look+1 WHERE idx='$idx';";
mysqli_query($connect, $sql);

?>
<div class="list2"><h3>
<?php
while ($data = mysqli_fetch_array($result)){
   
    echo
'<p>',    '제목 : ',$data['title'],'</p>',
  '<p>',  '작성자 : ',$data['writer'],'</p>',
   '<p>', '내용 : ',$data['content'],'</p>';
    };
    
#print_r($data);
?>
</h3>

<button type="button" onclick="location.href='./modify.php?title=<?=$title?>'">수정</button>
<?php
}
?>
</div>
</body>
</html>
