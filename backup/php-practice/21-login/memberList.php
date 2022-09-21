<?
// Error 메시지 끄기
error_reporting(1);
ini_set("display_errors", 1);

$isAdmin = $_COOKIE['isAdmin'];
if ($isAdmin != 'Ok') {
    echo "관리자만 접근 가능합니다.";
    exit;
}
?>

1. aaa <br>
2. bbb <br>
3. ccc <br>

<a href="logOut.php">로그아웃</a>