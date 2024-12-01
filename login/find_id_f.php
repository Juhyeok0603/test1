<!--login-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>
    <style>
        .result{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    $realname = isset($_POST['realname']) ? $_POST['realname'] : '';
    $birth = isset($_POST['birth']) ? $_POST['birth'] : '';
    
    include '../dbconn.php';

    $sql = "SELECT * FROM idtable WHERE realname='$realname' AND birth='$birth';";
    
    $result = mysqli_query($connect, $sql);
    $datacount = $result -> num_rows;
    for($i = 0; $i < $datacount;$i++){
        $kor = $result -> fetch_array(MYSQLI_NUM);
        ?><div class="result"><?php echo "회원님의 아이디 : ". $kor[0];
    }
    ?>
    <p><a href="login_ok.php">로그인하기</a></p> 
</div>
    
    
    
    
</body>
</html>