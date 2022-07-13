<?
include "../default_setting.php";

$uid = $_POST['uid'];
$upass = $_POST['upass'];

$uid = mysqli_real_escape_string($connect, $uid);
$upass = mysqli_real_escape_string($connect, $upass);

if (isset($data)) {
    $_SESSION['isLogin'] = time();
?>
    <script>
        location.href = 'list.php';
    </script>
<?
} else {
    echo "로그인 정보가 올바르지 않습니다.";
}
