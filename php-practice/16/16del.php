<?
    include "mysql_info.php";

    $idx = $_GET['idx'];

    $query = "delete from memo where idx='$idx'";

    mysqli_query($connect, $query);
?>
<script>
    location.href = '16.php';
</script>