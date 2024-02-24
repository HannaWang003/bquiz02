<?php
include_once "db.php";
// echo json_encode($_POST);
$res = $User->count(['acc'=>$_POST['acc']]);
if($res==0){
echo "查無帳號";
}else{
    $res=$User->count($_POST);
    if($res==0){
        echo "密碼錯誤";
    }
    else{
$_SESSION['acc']=$_POST['acc'];
        echo "1";
    }
}

?>