<?php
include_once "db.php";
if(isset($_POST['subject'])){
    $Que->save([
        'text'=>$_POST['subject'],
        'vote'=>0,
        'sh'=>1,
        'subject_id'=>0
    ]);
    $subject_id=$Que->max('id');
    foreach($_POST['opts'] as $opt){
        $Que->save([
            'text'=>$opt,
            'vote'=>0,
            'sh'=>1,
            'subject_id'=>$subject_id
        ]);
    }
}
to("../back.php?do=que")
?>