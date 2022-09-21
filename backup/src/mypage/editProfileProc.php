<?
include "../default_setting.php";

$query = "select * from user where uid=?";
$data = $db->query($query, $_SESSION['isLogin'])->fetchArray();


// 비밀번호 일치 - 보류 for CSRF
// if (isset($data['idx'])) {
print_r($_GET);
$query = "UPDATE user SET name=?, uid=?, upass=md5(?) WHERE idx=?";
$data = $db->query($query, $_GET['username'], $_GET['uid'], $_GET['newpass'], $data['idx']);
?>

<script>
alert("정상적으로 프로필이 변경되었습니다.");
</script>

<?
    // 로그인
    $_SESSION['isLogin'] = $_GET['uid'];
    setcookie("user_name", $_GET['username'], 0, '/');
    Header("Location: ./");
// } else { 
    ?>

<!-- <script>
alert("비밀번호가 일치하지 않습니다.");
location.href = "./editProfile.php";
</script> -->

<? 
// } 
?>