<?
include "../default_setting.php";

if (isset($_GET['file_idx'])) {
    $idx = $_GET['file_idx'];

    $query = "SELECT * FROM file WHERE idx=?";
    $file = $db->query($query, $idx)->fetchArray();
    $filepath = 'data/' . $file['name'];

    // 파일이 존재하는 경우
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('data/' . $file['name']));
        readfile('data/' . $file['name']);
    }
}
