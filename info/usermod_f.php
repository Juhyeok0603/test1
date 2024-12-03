<!--info-->

<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>
    alert('로그인이 필요합니다');
    location.href = '../login/login_ok.php';
    </script>";
}else{

    include '../dbconn.php';
    $realname = $_SESSION['name'];

    $newid = htmlspecialchars($_POST['newid']);
    $newbirth = htmlspecialchars($_POST['newbirth']);
    $newname = htmlspecialchars($_POST['newname']);

    $sql = "UPDATE idtable set id='$newid', realname='$newname', birth='$newbirth' where realname='$realname';";
    if(mysqli_query($connect,$sql)){
    $_SESSION['name'] = $newname;    
    echo "<script>
        alert('수정사항이 적용되었습니다');
        location.href='userinfo.php';
    </script>";
    }


}

?>