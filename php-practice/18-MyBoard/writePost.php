<?
include "mysql_connect.php";

$name = $_POST['name'];
$subject = $_POST['subject'];
$memo = $_POST['memo'];
$pwd = $_POST['pwd'];
$name = mysqli_real_escape_string($connect, $name);
$subject = mysqli_real_escape_string($connect, $subject);
$memo = mysqli_real_escape_string($connect, $memo);
$pwd = mysqli_real_escape_string($connect, $pwd);

$idx = $_POST['idx'];
$idx = mysqli_real_escape_string($connect, $idx);

if ($idx) { // 수정

    $query = "select * from MyBoard where idx='$idx' and pwd=md5('$pwd')";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    if (!isset($data['idx'])) {
        echo "
        <script>
        alert('비밀번호가 달라 수정이 불가능합니다.');
        hisroty.back(1);
        </script>";
        exit;
    }


    $query = "update MyBoard set name='$name', subject='$subject', memo='$memo' where idx='$idx'";
} else { // 새글쓰기

    $regdate = date("Y-m-d H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    $query = "insert into MyBoard(name,subject,memo,regdate,ip, pwd)
                    values('$name','$subject','$memo','$regdate','$ip', md5('$pwd'))";
}

mysqli_query($connect, $query);
?>
<script>
    location.href = 'list.php';
</script>