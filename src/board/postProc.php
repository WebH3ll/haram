<?
include "../default_setting.php";

$uid = $_SESSION['isLogin'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");
$isPrivate = isset($_POST['isPrivate']) ? '1' : '0';

$query = "insert into board(uid, title, content, regdate, isPrivate) values(?, ?, ?, ?, ?)";
$data = $db->query($query, $uid, $title, $content, $date, $isPrivate);
?>

<script>
    alert("Successfully Posted!");
    location.href = "./";
</script>