<!--content-->

<?php
    session_start();
    if(!isset($_SESSION['name'])){
        echo "<script>
        alert ('로그인이 필요합니다');
        location.href = '../login/login_ok.php';
        </script>";
    }else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify</title>
    <link type="text/css" rel="stylesheet" href="../style.css">
    <style>
        .mod{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>수정페이지</h2>
    <?php
    include '../dbconn.php';

    $title = $_GET['title'];

$query = "SELECT * from board where title ='$title'";
$result = mysqli_query($connect, $query);

$data = mysqli_fetch_array($result);
if($_SESSION['name'] == $data['writer']){
?>
<div class="mod">
<p>제목 : <?= $data['title']?></p>
<p>작성자 : <?= $data['writer']?></p>
<form method="post" name="form" action="fmodify.php?title=<?=$title?>&idx=<?=$data['idx']?>">

        <textarea name="content" id="content" cols="20" rows="10"><?= $data['content']?></textarea>
      <br>  <input type="submit" value="수정완료">
    </form></div>
</body>
</html>
<?php
    }
else{
    echo "<script>
    alert('작성자만 수정할 수 있습니다');
    location.href='../list/list.php';
    </script>";
}
}
    ?>