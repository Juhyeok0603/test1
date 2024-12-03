
<!--login-->
<?php
session_start();
// 세션 데이터 빈 배열로 초기화
$_SESSION = array();
// 또는 session_unset(); 사용

// 세션 ID 값이 저장되어 있는 쿠키 삭제
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(
    session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
  );
}

// 세션 파일 삭제
session_destroy();

echo "<script>
alert ('로그아웃 되었습니다.');
location.href = 'login_ok.php';
</script>";