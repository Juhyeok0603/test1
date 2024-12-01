<!--list-->
<?php

session_start();
if(!isset($_SESSION['name'])){
    echo "<script>
    alert ('로그인이 필요합니다');
    location.href = '../login/login_ok.php';
    </script>";
}else{
    #db연결
    include '../dbconn.php';

$writer = $_GET['writer'];
if($_SESSION['name']== 'admin'){

    $idx=$_GET['idx'];
    echo $_GET['idx'];  //파라미터 확인용
#삭제쿼리
    $que = "DELETE from board where idx='$idx';";

    mysqli_query($connect, $que);

    mysqli_close($connect);

    echo "<script>
    alert('글이 삭제되었습니다');
    location.href = 'list.php';
    </script>
    ";

}else if(($_SESSION['name'] == $writer)){

    $idx=$_GET['idx'];
    echo $_GET['idx'];  //파라미터 확인용
#삭제쿼리
    $que = "DELETE from board where idx='$idx';";

    mysqli_query($connect, $que);

    mysqli_close($connect);

    echo "<script>
    alert('글이 삭제되었습니다');
    location.href = 'list.php';
    </script>
    ";
}else if($_SESSION['name']!=$writer){
    echo "<script>
    alert('작성자만 삭제할 수 있습니다.');
    location.href = 'list.php';
    </script>";
};
}

?>