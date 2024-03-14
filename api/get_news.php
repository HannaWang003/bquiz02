<?php
include_once "db.php";
// dd($_POST);
$row = $News->find(['id'=>$_POST['id']]);
    echo "<pre>{$row['news']}</pre>";

?>
