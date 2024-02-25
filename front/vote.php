<?php
$que=$Que->find($_GET['id']);
$opts = $Que->all(['subject_id'=>$_GET['id']]);
?>
<style>
    fieldset{
        width:99%;
        margin:auto;
        padding:2vw;
    }
</style>
<form action="./api/vote.php" method="post">
<fieldset>
    <legend>
    目前位置:首頁 > 問卷調查區><?=$que['text']?>
    </legend>
    <span style="font-weight:bolder;"><?=$que['text']?></span>
    <?php
foreach($opts as $opt){
 ?>
    <div><input type="radio" name="opt" value="<?=$opt['id']?>"><?=$opt['text']?></div>
    <?php
}
    ?>
    <div class='ct'>
            <input type="submit" value="我要投票">
    </div>
</fieldset>
</form>