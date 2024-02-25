<?php
include_once "db.php";
$opt = $Que->find($_POST['opt']);
$opt['vote']++;
$subject=$Que->find($opt['subject_id']);
$subject['vote']++;
$Que->save($opt);
$Que->save($subject);
to('../index.php?do=que')
?>