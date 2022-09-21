<?
include "../default_setting.php";

// For exploit
echo "<script>alert('권한 탈취 실습을 위해 실제 삭제 기능은 주석 처리하였습니다.')</script>";

// $query = "DELETE FROM user WHERE idx=?";
// $data = $db->query($query, $_GET['idx']);
?>

<script>
    alert("Successfully deleted the User!");
    location.href = "./";
</script>