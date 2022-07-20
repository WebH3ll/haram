<?

$ip =  $_GET['ip'];
$output;
$return_var;

if(isset($_GET['ip'])) {

    // Window
    if($userAgent = preg_match("/Windows/i", $_SERVER["HTTP_USER_AGENT"])) {
        exec("ping -n 1 $ip", $output, $return_var);
    }
    // Linux
    else if($userAgent = preg_match("/Linux/i", $_SERVER["HTTP_USER_AGENT"])) {
        exec("ping -c 1 $ip", $output, $return_var);
    }

    $str = '';
    foreach($output as $result) {
        $tmp = iconv("EUC-KR", "UTF-8", $result);    // 한글 인코딩
        $str = $str.$tmp."<br>";
    }

    echo $str;
}

?>