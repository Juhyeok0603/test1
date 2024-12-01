<!--login-->

<?php



include '../dbconn.php';

#form에서 값 받기
$id = isset($_POST['id']) ? $_POST['id'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$realname = isset($_POST['realname']) ? $_POST['realname'] : '';
$birth = isset($_POST['birth']) ? $_POST['birth'] : '';


$blank = '';

if(strcasecmp($id, $blank) == 0){
    echo "<script>
    alert ('아이디를 입력하시오.');
    location.href = 'sing_up.php';
    </script>";
}else if(strcasecmp($password, $blank) == 0){
    echo "<script>
    alert ('비밀번호를 입력하시오.');
    location.href = 'sign_up.php';
    </script>";
}else if(strcasecmp($realname, $blank) == 0){
    echo "<script>
    alert ('사용자명을 입력하시오.');
    location.href = 'sign_up.php';
    </script>";
}else if(strcasecmp($birth, $blank) == 0){
    echo "<script>
    alert ('생년월일을 입력하시오.');
    location.href = 'sign_up.php';
    </script>";
}else if($id == 'admin' or $password == 'admin' or $realname == 'admin' or $birth == 'admin'){
    echo "<script>
    alert('사용할 수 없는 계정입니다');
    location.href = 'sign_up.php';
    </script>";
}
else{
    $query = "INSERT into idtable(id, password, realname, birth)
    value('$id', '$password', '$realname','$birth')";

    mysqli_query($connect, $query);

    echo "<script>
    alert('회원가입이 완료되었습니다.');
    location.href = 'login_ok.php';
</script>";

}
?>