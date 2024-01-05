<?php
include_once "db.php";
$_GET['type'];
$rows=$New->all(['type'=>$_GET['type']]);

foreach($rows as $row){

    echo "<a href='Javascript:getNews({$row["id"]})' style='display:block'>";
    echo $row['title'];
    echo "</a>";
    // echo "</a><br>";
}