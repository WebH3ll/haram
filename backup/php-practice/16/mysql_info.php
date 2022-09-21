<?
    $connect = mysqli_connect("localhost", "root", "0620", "php_db");

    if(mysqli_connect_error()) {
        echo "접속 중 에러 발생";
        echo mysqli_connect_error();
    } 

    