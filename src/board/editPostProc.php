<?
include "../default_setting.php";

$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");
$isPrivate = isset($_POST['isPrivate']) ? '1' : '0';

$query = "UPDATE board SET title=?, content=?, regdate=?, isPrivate=? WHERE idx=?";
$data = $db->query($query, $title, $content, $date, $isPrivate, $_POST['idx']);
?>

<script>
    alert("Successfully Edited!");
    location.href = "./";
</script>