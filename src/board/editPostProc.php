<?
include "../default_setting.php";

$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");
$secret = isset($_POST['secret']) ? $_POST['secret'] : NULL;

$query = "UPDATE board SET title=?, content=?, regdate=?, secret=? WHERE idx=?";
$data = $db->query($query, $title, $content, $date, $secret, $_POST['idx']);
?>

<script>
    alert("Successfully Edited!");
    location.href = "./";
</script>