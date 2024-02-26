<style>
    fieldset {
        padding: 10px;
    }

    table {
        width: 80%;
        margin: auto;
    }

    th {
        background: #eee;
    }
</style>
<form action="./api/del.php" method="post">
    <table style="text-align:center">
        <tr>
            <th>帳號</th>
            <th>密碼</th>
            <th>刪除</th>
        </tr>
        <?php
        $users = $User->all();
        foreach ($users as $user) {
            if ($user['acc'] != 'admin') {
        ?>
                <tr>
                    <td><?= $user['acc'] ?></td>
                    <td><?= str_repeat("*", mb_strlen($user['pw'])) ?></td>
                    <td><input type="checkbox" name="del[]" value=<?= $user['id'] ?>></td>
                </tr>


        <?php
            }
        }

        ?>
    </table>
    <br>
    <div class="ct">
        <input type="submit" value="確定刪除">
        <input type="reset" value="清空選取">
    </div>
</form>
<br>
<fieldset>
    <legend>
        <h2>新增會員</h2>
    </legend>
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
                        location.href = '?do=user';
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