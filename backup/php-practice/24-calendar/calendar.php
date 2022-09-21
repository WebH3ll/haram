<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender - 24</title>
    <style>
        .item{width:14%; height:100px; border:1px solid #aaa; float:left; margin-left: -1px; margin-bottom: -1px;}
    </style>
</head>
<body>

<?
    if(isset($_GET['year']) && isset($_GET['month'])) {
        $year = $_GET['year'];
        $month = $_GET['month'];
    } else {
        $year = date("Y");
        $month = date("m");
    }

    $tm = $year."-".$month."-01";

    $a = strtotime($tm);
    $blank = date("w", $a);
    $days = date("t", $a);
?>

<form action="calendar.php">
    <div style="text-align:center;">
        <select name="year">
            <? for($i=2000;$i<=2022; $i++) { ?>
                <option value="<?=$i?>" <? if($year==$i) echo "selected"; ?> ><?=$i?>년</option>
            <? } ?> 
        </select>

        <select name="month">
            <? for($i=1; $i<=12; $i++) { ?>
                <option value="<?=$i?>" <? if($month==$i) echo "selected"; ?> ><?=$i?>월</option>
            <? } ?>
        </select>
        <button type="submit">이동</button>
    </div>
</form>

<? for($i=0; $i<$blank;$i++) { ?>
    <div class="item"></div>
<? } ?>
<? for($i=1; $i < $days; $i++) { ?>
    <div class="item">
        <?=$i?>
    </div>
<? } ?>

</body>
</html>