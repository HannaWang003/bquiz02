<?php
include_once "db.php";
$res = $User->all();
header("Content-type:application/json;charset:utf8");
echo json_encode($res);
