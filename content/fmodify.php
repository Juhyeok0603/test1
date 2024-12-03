<!--content-->

<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>
    alert ('로그인이 필요합니다');
    location.href = '../login/login_ok.php';
    </script>";
}else{

include '../dbconn.php';

$content = isset($_POST['content']) ? $_POST['content'] : '';
$title = $_GET['title'];
$idx = $_GET['idx'];

$sql = "UPDATE board SET content = '$content' WHERE idx = '$idx'";


mysqli_query($connect, $sql);
echo "<script>
    alert ('글이 수정되었습니다.');
    location.href = './content.php?idx=$idx&title=$title';
</script>
";
}
?>