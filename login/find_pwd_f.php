<!--login-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 찾기</title>
    <style>
        .result{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $birth = isset($_POST['birth']) ? $_POST['birth'] : '';
    
    include '../dbconn.php';

    $sql = "SELECT * FROM idtable WHERE id='$id' AND birth='$birth';";
    
    $result = mysqli_query($connect, $sql);
    $datacount = $result -> num_rows;
    for($i = 0; $i < $datacount;$i++){
        $kor = $result -> fetch_array(MYSQLI_NUM);
        ?><div class="result"><?php echo "회원님의 비밀번호 : ". $kor[1];
    }
    ?>
    <p><a href="login_ok.php">로그인하기</a></p>    
</div>
    
    
    
    
</body>
</html>