<?
include "dbClass.php";
session_start();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>30 - Memo</title>
    <style>
    .text-right {
        text-align: right;
    }
    </style>
</head>

<body>
    <div class="text-right">
        <? if (isset($_SESSION['isLoginId'])) { ?>
        <a href="logout.php">로그아웃</a>
        <? } else { ?>
        <a href="join.php">회원가입</a>
        <a href="login.php">로그인</a>
        <? } ?>
    </div>

    <? if (isset($_SESSION['isLoginId'])) { ?>

    <form action="memoProc.php" method="post">
        <textarea name="memo" placeholder="메모를 입력해주세요." style="width: 500px; height:200px"></textarea>
        <br>
        <button type="submit">저장</button>
    </form>

    <table border=1>
        <tr>
            <td>아이디</td>
            <td>메모</td>
            <td>등록일</td>
        </tr>
        <?
            $query = "select * from uni_memo where user_id=?";
            $list = $db->query($query, $_SESSION['isLoginId'])->fetchAll();
            foreach ($list as $data) {
            ?>
        <tr>
            <td> <?= $data['user_id'] ?> </td>
            <td> <?= nl2br($data['memo']) ?> </td>
            <td> <?= $data['regdate'] ?> </td>
        </tr>
        <? } ?>
    </table>
    <? } ?>
</body>

</html>