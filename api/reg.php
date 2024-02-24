<?php
include_once "db.php";
// echo json_encode($_POST);
$res = $User->count(['acc'=>$_POST['acc']]);
if($res>0){
    echo $res;
}else{
    unset($_POST['pw2']);
    $User->save($_POST);
    echo "0";
}

?>