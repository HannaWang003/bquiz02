<?php
include_once "db.php";
unset($_POST['pw2']);
$User->save($_POST);
// 下述用於ajax, 可以直接顯示，不用重新整理
// $res = $User->find(['acc' => $_POST['acc']]);
// header("Content-type:application/json;charset:utf8");
// echo json_encode($res);

//實務要給前端0或1的回傳資料，用以判斷是否已寫入資料庫