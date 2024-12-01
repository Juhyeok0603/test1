<?php

session_start();
if(!isset($_SESSION['name'])){
    echo "<script>
    alert ('로그인이 필요합니다');
    location.href = '../login/login_ok.php';
    </script>";
}else{

#db 연결
include '../dbconn.php';

$blank = '';
#form에서 값 받기
$title = htmlspecialchars($_POST['title']);
$writer = isset($_POST['writer']) ? $_POST['writer'] : '';
$content = htmlspecialchars($_POST['content']);
//$content = isset($_POST['content']) ? $_POST['content'] : '';

if(strcasecmp($title, $blank) == 0){
    echo "<script>
    alert ('제목이 비어 있습니다.');
    location.href = 'write.php';
    </script>";
}else if(strcasecmp($content, $blank) == 0){
    echo "<script>
    alert ('내용이 비어 있습니다.');
    location.href = 'write.php';
    </script>";
}else{
#db로 값 전송

$write =$_SESSION['name'];
$query = "insert into board(title, writer, content)
	     value('$title','$write', '$content')";

/*mysql_query("set names utf8",$connect); db한글문서깨질경우 추가*/


mysqli_query($connect,$query);

echo "<script>
    alert('글이 저장되었습니다');
    location.href = '../list/list.php';
</script>";
}
}
?>