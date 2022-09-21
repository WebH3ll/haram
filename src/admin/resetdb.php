<?
include "../default_setting.php";

$query = "DELETE FROM board WHERE idx>=78";
$result = mysqli_query($connect, $query);
?>

<script>
    alert("DB 리셋 완료!\n수고가 많으십니다 ^^!");
    location.href="/";
</script>