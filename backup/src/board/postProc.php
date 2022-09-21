<?
include "../default_setting.php";

$uid = $_SESSION['isLogin'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");
$secret = isset($_POST['secret']) ? $_POST['secret'] : NULL;

$query = "INSERT INTO board(uid, title, content, regdate, secret) VALUES(?, ?, ?, ?, ?)";
$data = $db->query($query, $uid, $title, $content, $date, $secret);

/* File Upload 처리 */
$file = $_FILES['file']['tmp_name'];

if ($file) {
    $upload_dir = './data';

    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];

    // idx 가져오기
    $idx_query = "SELECT idx FROM board WHERE uid=? AND regdate=?";
    $idx_data = $db->query($idx_query, $uid, $date)->fetchArray();
    $idx = $idx_data['idx'];

    // 파일 이동
    move_uploaded_file($_FILES['file']['tmp_name'], "$upload_dir/$name");

    $file_query = "INSERT INTO file (idx, name, size) VALUES (?, ?, ?)";
    $file_data = $db->query($file_query, $idx, $name, $size);
}

?>

<script>
    alert("Successfully Posted!");
    location.href = "./";
</script>