<?

include "default_setting.php"; // 오류 메시지 제거, mysql 연결, session start

$isLogin = $_SESSION['isLogin'];

if (!isset($isLogin)) {
?>
    로그인 후 이용해주세요. <br>
    <a href="login.php">로그인</a>
<?
}
?>