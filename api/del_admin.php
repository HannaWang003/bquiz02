<?php
include_once "db.php";
$User->del($_POST['del']);
to("../back.php?do=admin");
?>