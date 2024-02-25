<?php
include_once "db.php";
$news=$News->find($_POST['news_id']);
// echo $Good->count(['news_id'=>$_POST['news_id'],'acc'=>$_SESSION['acc']]);
if($Good->count(['news_id'=>$_POST['news_id'],'acc'=>$_SESSION['acc']])>0){
    $Good->del(['news_id'=>$_POST['news_id'],'acc'=>$_SESSION['acc']]);
    $news['good']--;
}
else{
    $Good->save(['news_id'=>$_POST['news_id'],'acc'=>$_SESSION['acc']]);
    $news['good']++;
}
$News->save($news);
?>