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

    // True-Client-IP
    $headers = apache_request_headers();

    if (isset($headers['True-Client-IP'])) {
        $ip = $headers['True-Client-IP'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $query = "UPDATE user SET ip='$ip' WHERE uid='$uid'";
    $result = mysqli_query($connect, $query);
}
?>

<script>
    location.href = "/"
</script>