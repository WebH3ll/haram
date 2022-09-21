<?
    include "default_setting.php";

    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "select * from bookmark where idx='$idx'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    // 쿠키를 사용하여 사용자당 방문자수 1번으로 제한
    $tmp = $_COOKIE['url_'.$idx];
    if(!isset($tmp)) {
        $query = "update bookmark set cnt=cnt+1 where idx='$idx'";
        mysqli_query($connect, $query);
        setcookie("url_".$idx,time(),time()+86400);
    }

    Header("Location: {$data['url']}");