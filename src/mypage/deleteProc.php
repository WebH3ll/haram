<?
include "../default_setting.php";

$query = "select * from user where uid=? and upass=md5(?)";
$data = $db->query($query, $_SESSION['isLogin'], $_GET['pwd'])->fetchArray();

// 비밀번호 일치
if(isset($data['idx'])) {
    $query = "delete from user where idx=?";
    $data = $db->query($query, $data['idx']);

?>

<script>
alert("정상적으로 계정이 삭제되었습니다.");
location.href = "../login/logout.php";
</script>

<? } else { ?>

<script>
alert("비밀번호가 일치하지 않습니다.");
location.href = "./";
</script>

<? } ?>