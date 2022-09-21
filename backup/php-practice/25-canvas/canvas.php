<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>25 - Canvas</title>
    <style>
        .canvas{border:1px solid #aaa;}
    </style>
    <script>
        let canvas;
        let ctx;

        // 캔버스에 그리는 함수
        function draw() {
            canvas = document.getElementById("c");

            // 브라우저 지원 여부 확인
            if(canvas.getContext) {
                ctx= canvas.getContext("2d");
                
                ctx.fillStyle = "rgb(255,0,0)";
                ctx.fillRect(5, 5, 100, 100);

                ctx.fillStyle = "rgb(0,255,0)";
                ctx.fillRect(300, 5, 50, 50);
            }
        }

        // 서버에 저장 함수
        function saveImage() {
            let a = canvas.toDataURL("image/png");
            document.getElementById("image").value = a;
            document.getElementById("frm").submit();
        }
    </script>
</head>
<body onload="draw();">
    
    <canvas id="c" width="500" height="500" class="canvas"></canvas>
    <form action="canvasSave.php" method="post" id="frm">
        <input type="hidden" name="image" id="image" value="">
        <button type="button" onclick="saveImage();">이미지 서버에 업로드</button>
    </form>
</body>
</html>