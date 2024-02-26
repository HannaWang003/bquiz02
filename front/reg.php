<style>
fieldset {
    padding: 10px;
}
</style>
<fieldset>
    <legend>會員註冊</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc" maxlength=12></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>信箱</td>
            <td><input type="password" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="reset()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>
<script>
function reg() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let pw2 = $('#pw2').val();
    let email = $('#email').val();
    if (acc != "" && pw != "" && pw2 != "" && email != "") {
        if (pw == pw2) {
            $.post('./api/reg.php', {
                acc,
                pw,
                email
            }, function(res) {
                if (res == "帳號重覆") {
                    alert(res)
                    reset();
                } else {
                    alert(res);
                    location.href = "?do=login";
                }
            })
        } else {
            alert('密碼不一致')
        }

    } else {
        alert('不可空白');
    }
}

function reset() {
    $("#acc").val("");
    $("#pw").val("");
    $('#pw2').val("");
    $('#email').val("");
}
</script>