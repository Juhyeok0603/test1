<!--info-->

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
    <link type="text/css" rel="stylesheet" href="../style.css">
    <title>회원정보 수정</title>
    <script>
        function conf(){
            const result = confirm('변경사항이 저장되지 않습니다. 이동하시겠습니까?');
            if(result){
                location.href="../main/index.php";
            }
        }
    </script>
    <style>
        .box{
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<h1><div onclick="conf()">메인 화면</div></h1>
<?php
    include '../dbconn.php';
    $name = $_SESSION['name'];
    $sql = "SELECT * from idtable where realname='$name'"; 
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result);
        ?>
        <div class="box">
    <form method="post" action="usermod_f.php">
        <p> 새 아이디  <input type="text" name="newid" id="newid" placeholder="<?=$row['id']?>"></p>
        <p> 생년월일  <input type="text" name="newbirth" id="newbirth" placeholder="<?=$row['birth']?>"></p>
        <p> 이름  <input type="text" name="newname" id="newname" placeholder="<?=$row['realname']?>"></p>
        <p> <input type="submit" value="수정"></p>
    </form>
</div>
</body>
</html>
<?php
    }
    ?>