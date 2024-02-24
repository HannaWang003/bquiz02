<?php
include_once "db.php";
// echo $_POST['email'];
$res = $User->find(['email'=>$_POST['email']]);
echo json_encode($res);
?>