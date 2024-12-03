<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>
    alert('로그인이 필요합니다');
    location.href = '../login/login_ok.php';
    </script>";
} else {
    if ($_SESSION['name'] == "admin") {
        # db 연결
        include '../dbconn.php';
        $idx = $_GET['idx'];

        # 삭제 쿼리
        $que = "DELETE FROM board WHERE idx='$idx';";

        if (mysqli_query($connect, $que)) {
            echo "<script>
            alert('글이 삭제되었습니다');
            location.href = 'list.php';
            </script>";
        } else {
            echo "<script>
            alert('삭제 실패: " . mysqli_error($connect) . "');
            location.href = 'list.php';
            </script>";
        }

        mysqli_close($connect);
    } else {
        echo "<script>
        alert('삭제할 수 없습니다.');
        location.href = 'list.php';
        </script>";
    }
}
?>
