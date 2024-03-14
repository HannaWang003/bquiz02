<?php
include_once "db.php";
$sub = $Que->find($_POST['sub']);
$sub['vote']++;
$Que->save($sub);
$big = $Que->find($sub['subject_id']);
$big['vote']++;
$Que->save($big);
to("../index.php?do=result&id={$big['id']}");

?>