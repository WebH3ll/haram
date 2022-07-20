<?

$url =  $_GET['url'];
$output;
$return_var;

if(isset($_GET['url'])) {

    exec("nslookup $url", $output, $return_var);

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