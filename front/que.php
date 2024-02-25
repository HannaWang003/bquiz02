<div>目前位置:首頁 > 問卷調查區</div>
<br>
<table style="width:98%;margin:auto">
    <tr>
        <th style="width:10%">編號</th>
        <th style="width:45%;text-align:start">問卷題目</th>
        <th style="width:15%">投票總數</th>
        <th style="width:15%">結果</th>
        <th style="width:15%">狀態</th>
    </tr>
    <?php
$rows = $Que->all(['subject_id'=>0]);
foreach($rows as $key=> $row){
    ?>
    <tr>
    <td class="ct"><?=$key+1?></td>
    <td><?=$row['text']?></td>
    <td  class="ct"><?=$row['vote']?></td>
    <td  class="ct">結果</td>
    <td  class="ct">
<?=(isset($_SESSION['acc']))?"<a href='?do=vote&id={$row['id']}'>參與投票</a>":"<a href='?do=login'>請先登入</a>"?>
</td>
</tr>
<?php
}
?>
</table>