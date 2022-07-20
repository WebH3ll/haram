<?
include "../default_setting.php";

$query = "DELETE FROM user WHERE idx=?";
$data = $db->query($query, $_GET['idx']);
?>

<script>
    alert("Successfully deleted the User!");
    location.href = "./";
</script>