<?php
include_once "db.php";
$que = $Que->find($_POST['id']);
$que['sh']=($que['sh']==0)?1:0;
echo $que['sh'];
$Que->save($que);


?>