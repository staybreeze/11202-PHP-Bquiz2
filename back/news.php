<form action="" method="post"  style="text-align:center">
    <table>

        <tr>
            <th style="width:10%">編號</th>
            <th style="width:70%">標題</th>
            <th style="width:10%">顯示</th>
            <th style="width:10%">刪除</th>
        </tr>
        <?php
    $total=$New->count();
$div=3;
$pages=ceil($total/$div);
$now=$_GET['p']??1;
$start=($now-1)*$div;
$rows=$New->all(" limit $start,$div");


        foreach ($rows as $idx => $row) {
        ?>
            <tr style='text-align:center'>
                <td><?= $idx+1+$start; ?></td>
                <td><?= $row['title']; ?></td>
                <td>
                <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                </td>
                <td>

                    <input type="checkbox" name="del[]" id="" value="<?= $row['id']; ?>">
                </td>
            </tr><?php
                }
                    ?>
    </table>
<div class="ct">

<?php

if($now-1>0){
$prev=$now-1;



}

?>

<?php
for($i=1;$i<=$pages;$i++){
$size=($i==$now)?'font-size:22px':'font-size:16px';
echo "<a href='back.php?do=news&p=$i' style='{$size}'>";
echo $i;
echo "</a>";

}

?>
    <a href="">


    </a></div>
    <input type="submit" value="確定修改" style="margin-top:50px">
</form>


