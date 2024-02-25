<?php
include_once "db.php";
$res = $News->find($_GET['id']);
echo json_encode($res);

?>