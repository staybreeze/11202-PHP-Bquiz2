<fieldset>
<legend>新增問卷</legend>
<form action="">
<div style="display: flex;">
    <div>問卷名稱</div>
    <div>
        <input type="text" name="subject" id="">
    </div>
</div>

<div>
    <div id="opt">選項

    <input type="text" name="option" id="">
    <input type="button" value="更多" onclick="more()">
    </div>
</div>
<div class="ct">
    <input type="submit" value="送出">
    <input type="reset" value="清空">
</div>
</form>
</fieldset>

<script>

function more(){

    let opt=`<div id="opt">選項
    <input type="text" name="optiom">
    </div>`
    $("#opt").before(opt);
}

</script>