<?
$connect = mysqli_connect("13.125.206.156", "root", "0620", "webhell_db");

if (mysqli_connect_error()) {
    echo "접속 중 에러 발생";
    echo mysqli_connect_error();
}

// Error 메시지 끄기
// error_reporting(1);
// ini_set("display_errors", 1);

// session 시작
session_start();