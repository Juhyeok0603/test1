<!--login-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <style>
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
    </style>
</head>
<body>
    <div class="box">
    <form action="fsign_up.php" method="post" name="form">
        <p>사용할 아이디: <input type="text" name="id" id="id" autocomplete="off"></p>
        <p>사용할 비밀번호: <input type="password" name="password" id="password" autocomplete="off"></p>
        <p>사용자명: <input type="text" name="realname" id="realname" autocomplete="off">
        <p>생년월일 8자리: <input type="text" id="birth" name="birth" autocomplete="off"></p>
        <input type="submit" value="회원가입">
    </form>
    </div>
</body>
</html>