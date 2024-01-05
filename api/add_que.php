<?php
include_once "db.php";
if (isset($_POST['subject'])) {
    $Que->save([
        'text' => $_POST['subject'],
        'subject_id' => 0,
        'vote' => 0
    ]);
    // 方法一
    // 找到符合選項，並把他的['id']賦值給$subject_id
    $subject_id = $Que->find(['text' => $_POST['subject']])['id'];
    // 方法二
    // $subject_id=$Que->max('id');
}

echo $subject_id;


if (isset($_POST['option'])) {
    foreach ($_POST['option'] as $option) {
        $Que->save(['text' => $option, 'subject_id' => $subject_id, 'vote' => 0]);
    }
}

to("../back.php?do=que");
