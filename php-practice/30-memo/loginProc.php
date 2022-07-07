<?
    include "dbClass.php";
    session_start();

    $user_id = $_POST['user_id'];
    $pwd = $_POST['pwd'];

    $query = "select * from uni_member where user_id=?";
    $data = $db->query($query, $user_id)->fetchArray();

    if(!isset($data['idx'])) {
        echo "존재하지 않는 회원입니다.";
        exit;
    }

    $query = "select md5(?) pwd";
    $tmp = $db->query($query, $pwd)->fetchArray();

    if($data['pwd'] != $tmp['pwd']) {
        echo "로그인 정보가 잘못되었습니다.";
        exit;
    }

    $_SESSION['isLoginId'] = $user_id;

    Header("Location: index.php");