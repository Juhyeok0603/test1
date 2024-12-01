<!--login-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link type="text/css" rel="stylesheet" href="../style.css">
    <style>
        @font-face {
    font-family: 'EF_jejudoldam';
    src: url('https://fastly.jsdelivr.net/gh/projectnoonnu/noonfonts_2210-EF@1.0/EF_jejudoldam.woff2') format('woff2');
    font-weight: normal;
    font-style: normal;
}
        h2{
            font-family: 'EF_jejudoldam';
        }
        @font-face {
    font-family: 'HakgyoansimPuzzleTTF-Black';
    src: url('https://fastly.jsdelivr.net/gh/projectnoonnu/2408-5@1.0/HakgyoansimPuzzleTTF-Black.woff2') format('woff2');
    font-weight: normal;
    font-style: normal;
}
h1{
    font-family: 'HakgyoansimPuzzleTTF-Black';
}
.box{
    width: 300px;
    background-color: skyblue ;
    margin-left: 10px;
    padding: 20px;
    border-radius: 5px;
    margin-left: auto;
    margin-right: auto;
    
    border: 2px solid black;
    text-align: center;
}
.sign:hover{
    color: blue;
}

    </style>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['name'])){
        echo "<script>
        alert('이미 로그인 하셨습니다');
        location.href = '../main/index.php';
        </script>
";    }
    ?>
    <h1>로그인</h1>
    <!--로그인 만들기-->
    <div class="box">
        <form method="post" name="form" action="login.php">
            <input type="text" id="id" name="id" autocomplete="off">
            <input type="password" id="password" name="password" autocomplete="off">
            <input type="submit" value="로그인">
        </form>
        <h6><a class="sign" href="sign_up.php" target="_blank">회원가입&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a class="sign" href="find.php" target="_blank">&nbsp;아이디/비밀번호 찾기</a></h6>
    </div>
</body>
</html>