<?
include "../default_setting.php";

$uid = $_SESSION['isLogin'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");
$secret = isset($_POST['secret']) ? $_POST['secret'] : NULL;

$query = "insert into board(uid, title, content, regdate, secret) values(?, ?, ?, ?, ?)";
$data = $db->query($query, $uid, $title, $content, $date, $secret);
?>

<script>
alert("Successfully Posted!");
location.href = "./";
</script>