<?php
include_once "db.php";
if(isset($_POST['del'])){
    $News->del($_POST['del']);
}
if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        $new = $News->find($id);
        $new['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $News->save($new);
    }
}
else{
    $_POST['sh']=1;
    $_POST['good']=0;
    $News->save($_POST);
}
to('../back.php?do=news');
?>