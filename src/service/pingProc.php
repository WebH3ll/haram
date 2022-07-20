<?

$ip =  $_GET['ip'];
$output;
$return_var;

if (isset($_GET['ip'])) {

    exec("ping -c 1 $ip", $output, $return_var);

    $str = '';
    foreach ($output as $result) {
        $tmp = iconv("EUC-KR", "UTF-8", $result);    // 한글 인코딩
        $str = $str . $tmp . "\\n";
    }

    echo "<script>alert('$str');</script>";
}
?>

<script>
    location.href = "./";
</script>