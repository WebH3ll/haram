<?
    include "default_setting.php";
    $memo = $_POST['memo'];
    $memo = mysqli_real_escape_string($connect, $memo);

    $list = explode('\r\n', $memo);

    foreach($list as $url) {

        // 줄바꿈 제거
        $url = trim($url);
        if(!$url)   continue;

        echo "<li>";
        echo $url;

        $query = "select * from bookmark where url='$url'";
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($result);

        if(isset($data['idx'])) {
            continue;
        }


        $query = "insert into bookmark(url, regdate) values('$url', now())";
        mysqli_query($connect, $query);
    }

    Header("Location: index.php");