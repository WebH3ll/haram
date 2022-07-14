<?
include "../default_setting.php";
include "../dbClass.php";

$uid = $_POST['uid'];
$upass = $_POST['upass'];
$name = $_POST['name'];

$query = "select * from user where uid='$uid'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

// uid가 중복되지 않는 경우
if(!isset($data)) {
    $user_info = array($uid, $upass, $name);
    $user_info[] = $_SERVER['REMOTE_ADDR'];

    $query = "insert into user(uid, upass, name, ip) values(?, md5(?), ?, ?)";
    $insert = $db->query($query, $user_info);
    
    echo "회원가입이 완료되었습니다.";
} 
// uid가 중복되는 경우
else {
    echo "이미 존재하는 아이디입니다.";
}
?>

<br>
<a href="../../index.php">홈으로</a>