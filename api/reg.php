<?php
include_once "db.php";
if(isset($_POST['acc'])){
    if($User->find(['acc'=>$_POST['acc']])>0){
        echo "1";
    }else{
        unset($_POST['pw2']);
        $User->save($_POST);
    }
}

?>