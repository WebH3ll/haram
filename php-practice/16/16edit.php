<?
    include "mysql_info.php";

    $idx = $_GET['idx'];
    $memo = $_GET['memo'];

    $query = "update memo set memo='$memo' where idx='$idx'";

    mysqli_query($connect, $query);
?>
<script>
    location.href = '16.php';
</script>