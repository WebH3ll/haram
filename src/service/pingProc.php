<?

$ip =  $_GET['ip'];
$output;
$return_var;

if(isset($_GET['ip'])) {

    // // Window
    // if($userAgent = preg_match("/Win/i", $_SERVER["SERVER_SOFTWARE"])) {
    //     exec("ping -n 1 $ip", $output, $return_var);
    // }
    // // Linux
    // else {
    //     exec("ping -c 1 $ip", $output, $return_var);
    // }

    exec("ping -c 1 $ip", $output, $return_var);

    $str = '';
    foreach($output as $result) {
        $tmp = iconv("EUC-KR", "UTF-8", $result);    // 한글 인코딩
        $str = $str.$tmp."\\n";
    }

    echo "<script>alert('$str');</script>";
}
?>

<script>
location.href = "./";
</script>