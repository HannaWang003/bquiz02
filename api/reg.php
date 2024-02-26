<?php
include_once "db.php";
if (($User->count(['acc' => $_POST['acc']])) > 0) {
    echo "帳號重覆";
} else {
    $User->save($_POST);
    echo "註冊成功，請登入";
}
