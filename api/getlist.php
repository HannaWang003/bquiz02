<?php
include_once "db.php";
$res = $News->all(['type'=>$_GET['type'],'sh'=>"1"]);
echo json_encode($res);

?>