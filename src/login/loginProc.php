<!-- Change lower -->
<?
include "../default_setting.php";

$uid = $_POST['uid'];
$upass = $_POST['upass'];

$query = "SELECT * FROM user WHERE uid='$uid' AND upass=md5('$upass')";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

// 로그인 실패
if (!isset($data['idx'])) {
    echo "<script>alert('로그인 정보가 잘못 되었습니다.')</script>";
}
// 로그인 성공 
else {
    $_SESSION['isLogin'] = $uid;
    setcookie("user_name",  $data['name'], 0, '/');
}
?>

<script>
    location.href = "/"
</script>

<!-- 
Using dbClass
<?
include "../default_setting.php";

$uid = $_POST['uid'];
$upass = $_POST['upass'];

$query = "select * from user where uid=? and upass=md5(?)";
$data = $db->query($query, $uid, $upass)->fetchArray();

// 로그인 실패
if (!isset($data['idx'])) {
    echo "<script>alert('로그인 정보가 잘못 되었습니다.')</script>";
}
// 로그인 성공 
else {
    $_SESSION['isLogin'] = $uid;
    setcookie("user_name",  $data['name'], 0, '/');
}
?>

<script>
    location.href = "/"
</script> 
-->