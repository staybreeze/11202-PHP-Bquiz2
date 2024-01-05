<?php

include_once "db.php";

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $id) {

        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $New->del($id);
        }else{
            $news=$New->find($id);
            $news['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $New->save($news);
        }
    }
}

to('../back.php?do=news');
