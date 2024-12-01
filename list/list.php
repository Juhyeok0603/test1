<!--list-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 목록</title>
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

        h3, h4 {
            color: #555;
            text-align: center;
        }

        #search {
            text-align: center;
            margin-bottom: 20px;
        }

        #search input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #search input[type="submit"] {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        #search input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .list2 {
            margin-left: auto;
            margin-right: auto;
            width: 700px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .list2 a {
            text-decoration: none;
            color: #007BFF;
        }

        .list2 a:hover {
            text-decoration: underline;
        }

        .list2 button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .list2 button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['name'])){
        echo "<script>
        alert ('로그인이 필요합니다');
        location.href = '../login/login_ok.php';
        </script>";
    }else{
    ?>
    <h1>글 목록</h1>
    <h3><a href="../main/index.php?">메인 화면</a></h3>
    <h4><a href="list.php">글 목록</a></h4>
    <h4><a href="../write/write.php">글 쓰기</a></h4>
    

    <form action="search.php" name="form">
        <div id="search"><input name="search" type="text" autocomplete="off" placeholder="검색어를 입력하세요.">
        <input type="submit" value="검색"></div>
    </form>

<?php
include '../dbconn.php';

$sql = "SELECT * FROM board;";

$result = mysqli_query($connect, $sql);

$sql2 = "SELECT * FROM idtable;";
$result2= mysqli_query($connect,$sql2);
$row2 = mysqli_fetch_array($result2);

while($row = mysqli_fetch_array($result)){
    ?>
<div class="list2"><a class="list" href="../content/content.php?idx=<?=$row['idx']?>&title=<?=$row['title']?>"><?=$row['title']?></a>

</form>
<button onclick="location.href='./delete.php?idx=<?=$row['idx']?>&writer=<?=$row['writer']?>'">삭제</button>
<!--<button href="/test1/list/delete.php?idx=<?=$row['idx']?>">삭제</button>-->
조회수 <a><?=$row['look']?></a>
</div>
<br>
<?php
}

$connect -> close();
    }

?>

</body>
</html>