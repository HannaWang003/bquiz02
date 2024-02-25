<?php
$opts = $Que->all(['subject_id'=>$_GET['id']]);
$subject=$Que->find($_GET['id']);
?>
<fieldset>
    <legend>
    目前位置:首頁 > 問卷調查區><?=$subject['text']?>
    </legend>
    <span style="font-weight:bolder;"><?=$subject['text']?></span>
    <table style="width:100%">
    <?php
    $total = ($subject['vote']!=0)?$subject['vote']:1;
foreach($opts as $key => $opt){
    $rate = round($opt['vote']/$total,2)*100;
    $length=$rate*0.8;
 ?>
 <tr>
    <td style="width:40%"><?=$opt['text']?></td>
    <td style="width:60%;vertical-align:middle"><span style="display:inline-block;width:<?=$length?>%;height:30px;background:#eee;"></span><?=$opt['vote']?>票(<?=$rate?>%)</td>
 </tr>

        
    <?php
}
    ?>
    </table>
    <div class='ct'>
            <input type="button" value="返回" onclick="location.href='?do=que'">
    </div>
</fieldset>