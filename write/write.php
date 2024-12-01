<!--write-->
<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>
    alert ('로그인이 필요합니다.');
    location.href = '../login/login_ok.php';
    </script>";
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 쓰기</title>
    <link type="text/css" rel="stylesheet" href="../style.css">
    <style>
                @font-face {
    font-family: 'HakgyoansimPuzzleTTF-Black';
    src: url('https://fastly.jsdelivr.net/gh/projectnoonnu/2408-5@1.0/HakgyoansimPuzzleTTF-Black.woff2') format('woff2');
    font-weight: normal;
    font-style: normal;
}
h3{
    font-family: 'HakgyoansimPuzzleTTF-Black';
}
@font-face {
    font-family: 'EF_jejudoldam';
    src: url('https://fastly.jsdelivr.net/gh/projectnoonnu/noonfonts_2210-EF@1.0/EF_jejudoldam.woff2') format('woff2');
    font-weight: normal;
    font-style: normal;
}
h4{
    font-family: 'EF_jejudoldam';
}
    </style>
</head>
<body>
    
    <h3><a href="../main/index.php">메인 화면</a></h3>
    <h4><a href="../list/list.php">글 목록</a></h4>
    <h4><a href="./write.php">글 쓰기</a></h4>
    <form class="list2" method="post" action="db.php" name="form" enctype="multipart/form-data">
       <p> 제목 : <input name="title" id="title" type="text"> </p>
      <p>  작성자 : <?php echo $_SESSION['name']; ?> </p>
      <p>  내용 : <textarea name="content" id="content" cols="20" rows="10"></textarea> </p>
        <input type="submit" value="작성">
    </form>
</body>
</html><?php } ?>