<?
include "../default_setting.php";

$query = "DELETE FROM board WHERE idx=?";
$data = $db->query($query, $_GET['idx']);
?>

<script>
    alert("Successfully Deleted!");
    location.href = "./";
</script>