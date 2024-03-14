<?php
include_once "db.php";
$Que->save(['text'=>$_POST['big'],'vote'=>0,'subject_id'=>0]);
$big_id = $Que->max('id');
foreach($_POST['sub'] as $val){
    $Que->save(['text'=>$val,'vote'=>0,'subject_id'=>$big_id]);
}
to("../index.php");

?>