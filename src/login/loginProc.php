<?
include "../default_setting.php";

$uid = $_POST['uid'];
$upass = $_POST['upass'];

$query = "select * from user where uid=? and upass=md5(?)";
$data = $db->query($query, $uid, $upass)->fetchArray();

// 로그인 실패
if (!isset($data['idx'])) {
    echo "로그인 정보가 잘못 되었습니다.";
?>
    <br>
    <a href="../../index.php">홈으로</a>
<?
    exit;
}

// 로그인 성공
$_SESSION['isLogin'] = $uid;
setcookie("user_name",  $data['name'], 0, '/');

Header("Location: ../../index.php");
