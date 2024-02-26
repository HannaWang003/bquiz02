<?php
include_once "db.php";
// echo json_encode($_POST);
// exit();
if(isset($_POST['id'])){
  foreach($_POST['id'] as $key=>$id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
$news = $News->find($id);
if(isset($_POST['sh']) && in_array($id,$_POST['sh'])){
    $news['sh']=1;
}else{
    $news['sh']=0;
}
$News->save($news);
    }
  }
    $News->save($_POST);
}else{
    $_POST['sh']=1;
    $_POST['good']=0;
    $News->save($_POST);
}
?>