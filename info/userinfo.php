<!--info-->

<?php
    session_start();
    if(!isset($_SESSION['name'])){
        echo "<script>
        alert ('로그인이 필요합니다');
        location.href = '../login/login_ok.php';
        </script>";
    }else{
        include '../dbconn.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../style.css">
    <title>회원정보</title>
    <style>
        .box{
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            
        }
        .b{
            margin-left: auto;
            margin-right: auto;
            width: 300px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1><a href="../main/index.php">메인 화면</a></h1>

    <div class="box">
    <h2>회원정보</h3>
    <?php
    $name = $_SESSION['name'];
    $sql = "SELECT * from idtable where realname='$name'"; 
    $result = mysqli_query($connect,$sql);

    $sql2 = "SELECT * FROM board where writer='$name'";
    $result2 = mysqli_query($connect,$sql2);
    while($row = mysqli_fetch_array($result)){
        ?>
        <p>회원 이름 : <?=$row['realname']?></p>
        <p>아이디 : <?=$row['id']?></p>
        <p>생년월일 : <?=$row['birth']?></p>
        <p>내가 쓴 글</p>
        <p>
        <?php
            while($row2 = mysqli_fetch_array($result2)){
            ?>
            <div class="b"><a href="../content/content.php?idx=<?=$row2['idx']?>&title=<?=$row2['title']?>"><?= $row2['title'] ?></a></div>
            <?php
            }
            ?>
        </p>
        <form action="usermod.php">
            <input type="submit" value="회원정보 수정">
        </form>
        </div>
   <?php
    }
    ?>


</body>
</html>

<?php } ?>