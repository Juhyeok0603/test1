<!--login-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
        include '../dbconn.php';

        //find_in_set를 사용할 것이다.

        #form에서 값 받기
$id = isset($_POST['id']) ? $_POST['id'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$blank = '';

if(strcasecmp($id, $blank) == 0){
    echo "<script>
    alert ('아이디를 입력하시오.');
    location.href = 'login_ok.php';
    </script>";
}else if(strcasecmp($password, $blank) == 0){
    echo "<script>
    alert ('비밀번호를 입력하시오.');
    location.href = 'login_ok.php';
    </script>";
}else{
    session_start();
    
    //$sql = "SELECT id from idtable where find_in_set('$id',id);";
    $sql = "SELECT id from idtable where id = '$id';";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result);
    if(isset($row)){
        //$sql2 = "SELECT password from idtable where find_in_set('$password',password);";
        $sql2 = "SELECT password from idtable where password='$password';";
        $result2 = mysqli_query($connect,$sql2);
        $row2 = mysqli_fetch_array($result2);
        if(isset($row2)){
            $query = "SELECT realname from idtable where id='$id'";
            $result3 = mysqli_query($connect, $query);
            $row3 = mysqli_fetch_array($result3);
            $_SESSION['name'] = $row3['realname'];
            echo "<script>
            alert ('",$_SESSION['name']," 님 방문을 환영합니다');
            location.href = '../main/index.php?id=$id';
        </script>";
        }else{
            echo "<script>
            alert ('비밀번호가 틀렸습니다.');
            location.href = 'login_ok.php';
        </script>";
        }

    }else{
        echo "<script>
            alert ('아이디가 틀렸습니다.');
            location.href = 'login_ok.php';
        </script>";
    }

}
    ?>
</body>
</html>