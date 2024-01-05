<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td class='clo'>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class='clo'>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="登入" onclick="login()">
                <input type="reset" value="清險">
            </td>
            <td>
                <a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function login() {
        // 透過POST的方式將資料傳給./api/chk_acc.php
        // 傳的內容是{acc:$("#acc").val()
        // 預計得到(res)=>{}回傳值

        // $("#acc")：這是使用 jQuery 選擇器來選擇具有 id 為 "acc" 的 HTML 元素。
        //$ 是 jQuery 的縮寫，它是一個 JavaScript 函數庫，用於簡化 DOM 操作。

        // .val()：這是 jQuery 方法，用於獲取選中元素的值。
        // 在這裡，它被調用以獲取 id 為 "acc" 的元素（通常是一個輸入框）的值。

        // {acc: $("#acc").val()}：這是一個 JavaScript 物件字面量。
        // 這個物件有一個屬性 "acc"，其值是 $("#acc").val() 返回的輸入框的值。
        $.post('./api/chk_acc.php', {
            acc: $("#acc").val()
        }, (res) => {

            //parseInt 將字符串轉換為整數（整數解析）
            //let str1 = "123";
            // let str2 = "ABC";
            // let str3 = "10px";

            // let num1 = parseInt(str1); // 123
            // let num2 = parseInt(str2); // NaN，因為開頭不是有效數字字符
            // let num3 = parseInt(str3); // 10，解析 "10"，忽略非數字部分

            if (parseInt(res) == 0) {
                alert("查無帳號")
            } else {
                $.post('./api/chk_pw.php', {
                        acc: $("#acc").val(),
                        pw: $("#pw").val()
                    },
                    (res) => {
                        if (parseInt(res) == 1) {
                            if ($("#acc").val() == 'admin') {
                                location.href = 'back.php'
                            } else {
                                location.href = 'index.php'
                            }
                        } else {
                            alert("密碼錯誤")
                        }
                    })
            }
        })
    }
</script>