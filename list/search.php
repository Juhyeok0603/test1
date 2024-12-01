<!--list-->

<?php
    session_start();
    if(!isset($_SESSION['name'])){
        echo "<script>
        alert ('로그인이 필요합니다');
        location.href = 'login_ok.php';
        </script>";
    }else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link type="text/css" rel="stylesheet" href="../style.css">
    <style>
        @font-face {
    font-family: 'HakgyoansimDunggeunmisoTTF-B';
    src: url('https://fastly.jsdelivr.net/gh/projectnoonnu/2408-5@1.0/HakgyoansimDunggeunmisoTTF-B.woff2') format('woff2');
    font-weight: 700;
    font-style: normal;
}
        .sea{
            text-align: center;
            font-family: 'HakgyoansimDunggeunmisoTTF-B';
        }
    </style>
</head>
<body>
    <h1>글 목록</h1>
    <h3><a href="../main/index.php">메인 화면</a></h3>
    <h4><a href="list.php">글 목록</a></h4>
    <h4><a href="../write/write.php">글 쓰기</a></h4>
    
    <?php
    include '../dbconn.php';

    $search = $_GET['search'];

    $blank = '';

    if(strcasecmp($search, $blank) == 0){
        echo "<script>
        alert ('검색 내용이 비어 있습니다.');
        location.href = 'list.php';
        </script>";
    }else{?>
        <form class="sea" action="search.php" name="form">
        <div id="search"><input name="search" type="text" autocomplete="off" placeholder="검색어를 입력하세요.">
        <input type="submit" value="검색"></div>
    </form><?php
        $query = "SELECT * FROM board WHERE title LIKE '%$search%';";
        $db_str = mysqli_query($connect, $query);
    
        while($row = mysqli_fetch_array($db_str)){
            ?>   
            <div class="sea"><a class="list" href="content.php?title=<?=$row['title']?>"><?=$row['title']?></a>
<button onclick="location.href='delete.php?title=<?=$row['title']?>'">삭제</button>
조회수 <a><?=$row['look']?></a>
</div>
        <?php
        };
    }


    ?>
</body>
</html><?php } ?>