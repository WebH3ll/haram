<?
    list($a, $b) = explode(",", $_POST['image']);

    // base64 디코딩
    $c = base64_decode($b);

    $fp = fopen("canvas.png", "wb");
    fwrite($fp, $c);
    fclose($fp);

?>

사진이 저장되었습니다.
<br>
<img src="canvas.png" border=1>
