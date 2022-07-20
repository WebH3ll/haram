<?
include "../default_setting.php";

$uid = $_POST['uid'];
$upass = $_POST['upass'];
$name = $_POST['name'];

$query = "select * from user where uid='$uid'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

// 관리자 계정으로 회원가입 하려는 경우
if ($uid == "Admin") {
    echo "<script>alert('해당 엑세스 권한이 없습니다.')</script>";
}
// uid가 중복되지 않는 경우
else if (!isset($data)) {
    $user_info = array($uid, $upass, $name);
    $user_info[] = $_SERVER['REMOTE_ADDR'];

    $query = "insert into user(uid, upass, name, ip) values(?, md5(?), ?, ?)";
    $insert = $db->query($query, $user_info);

    echo "<script>alert('회원가입이 완료되었습니다.')</script>";
}
// uid가 중복되는 경우
else {
    echo "<script>alert('이미 존재하는 아이디입니다.')</script>";
}
?>

<script>
    location.href = "/";
</script>