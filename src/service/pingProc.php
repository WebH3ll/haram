<?

$ip =  $_GET['ip'];
$output;
$return_var;

if(isset($_GET['ip'])) {
    setlocale(LC_ALL, 'ko_KR.utf8');
    exec("ping -c 1 $ip", $output, $return_var);
    
    print_r($output);
}

?>