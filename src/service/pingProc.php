<?

$ip =  $_GET['ip'];
$output;
$return_var;

if(isset($_GET['ip'])) {
    exec("ping -c 1 $ip", $output, $return_var);
    
    foreach($output as $result) {
        $ex = iconv("EUC-KR", "UTF-8", $result);
        echo $ex;
    }
}

?>