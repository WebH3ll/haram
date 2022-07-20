<?
include "../default_setting.php";

$uid = $_SESSION['isLogin'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");
$secret = isset($_POST['secret']) ? $_POST['secret'] : NULL;

$query = "insert into board(uid, title, content, regdate, secret) values(?, ?, ?, ?, ?)";
$data = $db->query($query, $uid, $title, $content, $date, $secret);

// image upload
$file = $_FILES['image']['tmp_name'];


// $idx = $data['idx'];
$idx = 30;
$image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);
// $image_size = getimagesize($_FILES['image']['tmp_name']);

// if($image_size == FALSE) {
//     echo "That is not an image";
//     exit;
// }

$query = "INSERT INTO image(idx, img, name) VALUES(?,?,?)";
$data = $db->query($query, $idx, $image_data, $image_name);


$query = "SELECT * FROM image WHERE idx=?";
$data = $db->query($query, $idx)->fetchArray();
echo "<img src='data:image/jpeg;base64," . base64_encode($data['img']) . "' width='250' height='200' />";
?>

<script>
// alert("Successfully Posted!");
// location.href = "./";
</script>