<?
include "mysql_connect.php";
?>

<table width=800 border=1>
    <tr>
        <th width=50> NO </th>
        <th> 제목 </th>
        <th width=100> 작성자 </th>
        <th width=150> 작성 </th>
    </tr>
    <?
    $query = "select * from MyBoard order by idx desc";
    $result = mysqli_query($connect, $query);

    while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td> <?= $data['idx'] ?> </td>
            <td> <a href="view.php?idx=<?= $data['idx'] ?>"><?= $data['subject'] ?></a></td>
            <td> <?= $data['name'] ?> </td>
            <td> <?= $data['regdate'] ?> </td>
        </tr>
    <?
    }
    ?>
</table>

<a href="write.php">글쓰기</a>