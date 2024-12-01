<!--main-->

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
    <title>메인 화면</title>
    <link type="text/css" rel="stylesheet" href="../style.css">
    <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #333;
}

h2 {
    color: #555;
    margin-top: 20px;
}

.container {
    max-width: 800px;
    margin: auto;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.post {
    border-bottom: 1px solid #ddd;
    padding: 15px 0;
}

.post:last-child {
    border-bottom: none;
}

.post-title {
    font-size: 1.5em;
    color: #007BFF;
}

.post-content {
    margin-top: 10px;
    color: #666;
}

.write-button {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    font-size: 1em;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
}

.write-button:hover {
    background-color: #0056b3;
}

.logout {
    text-align: right;
    margin-bottom: 20px;
}

.logout input {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    background-color: #dc3545;
    color: white;
    cursor: pointer;
}

.logout input:hover {
    background-color: #c82333;
}
.obx{
    margin-left: auto;
    margin-right: auto;
    width: 700px;
}
    </style>
</head>
<body>

<!--사용자님 환영합니다! 만들기-->
    <h1><a href="index2.php">메인 화면</a></h1>
    <h2><a href="../list/list.php">글 목록</a></h2>
    <h2><a href="../write/write.php">글 쓰기</a></h2>
    <div class="obx">
    <p style="text-align: right;"><a href="../info/userinfo.php">회원정보</a></p>
    <form class="logout" method="post" action="../login/logout.php">
        <input type="submit" value="로그아웃">
    </form>
    <?php
    include '../dbconn.php';
    

    //사용자님 환영합니다! 만들기
   // $id = $_GET['id'];
    //$query = "SELECT username from idtable where id='$id'";
    //$result = mysqli_query($connect, $query);
    //$row = mysqli_fetch_array($result);
    ?>
    <p style="text-align: center;"><?php echo $_SESSION['name'] ?>님 방문을 환영합니다!</p>
    </div>
</body>
</html>
<?php 
} ?>