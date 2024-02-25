<?php
include_once "db.php";
if(isset($_POST['acc'])){
    $res = $User->count(['acc'=>$_POST['acc']]);
    if($res==0){
        echo "查無帳號";
    }else{
        $res = $User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
        if($res==0){
            echo "密碼錯誤";
        }else{
            if($_POST['acc']=='admin'){
                $_SESSION['acc']="admin";
                echo "2";
            }
            else{
                $_SESSION['acc']=$_POST['acc'];
                echo "1";
            }
        }
    }
}

?>