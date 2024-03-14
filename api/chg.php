<?php
include_once "db.php";
if($_POST['good']==0){
    $Good->del(['news_id'=>$_POST['news_id'],'acc'=>$_SESSION['acc']]);
    $n = $News->find(['id'=>$_POST['news_id']]);
    $n['good']--;
    $News->save($n);
}else{
    $Good->save(['news_id'=>$_POST['news_id'],'acc'=>$_SESSION['acc']]);
    $n = $News->find(['id'=>$_POST['news_id']]);
    $n['good']++;
    $News->save($n);
}
?>