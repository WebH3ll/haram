<?
    include "../default_setting.php";

    unset($_SESSION['isLogin']);
    unset($_COOKIE['user_name']);
    setcookie('user_name', '', time() - 3600, '/');

    Header("Location: ../../index.php");
    