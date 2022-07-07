<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>30 - Memo</title>
    <style>
        .text-right{text-align: right;}
    </style>
    <script>
        function chkFrm() {
            let a = document.getElementById("name");

            if(a.value == "") {
                alert('이름을 입력해주세요.');
                a.focus();
                return false;
            } 

            return true;
        }
    </script>
</head>
<body>

    <form action="joinProc.php" method="post" onsubmit="return chkFrm();">
        <div>
            id : <input type="text" name="user_id" placeholder="아이디">
        </div>
        <div>
            pw : <input type="password" name="pwd" placeholder="비밀번호">
        </div>
        <div>
            이름 : <input type="text" name="name" id="name" placeholder="이름" value="">
        </div>
        <div>
            이메일 : <input type="text" name="email" placeholder="이메일">
        </div>
        <div>
            <button type="submit">회원가입</button>
        </div>
    </form>

</body>
</html>
