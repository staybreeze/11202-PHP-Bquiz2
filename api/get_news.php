<?php include_once "db.php";

$news=$New->find($_GET['id']);
echo nl2br($news['news']);