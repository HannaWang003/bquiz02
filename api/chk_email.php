<?php
include_once "db.php";
if ($User->count(['email' => $_POST['email']]) <= 0) {
    echo "查無此資料";
} else {
    $pw = $User->find(['email' => $_POST['email']])['pw'];
    echo "您的密碼為:" . $pw;
}
