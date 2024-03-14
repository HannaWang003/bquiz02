<?php
include_once "db.php";
// dd($_POST);
$rows = $News->all(['type'=>$_POST['type']]);
foreach($rows as $row){
    echo "<p class='itemBtn' data-id='{$row['id']}'>{$row['title']}</p>";
}

?>
