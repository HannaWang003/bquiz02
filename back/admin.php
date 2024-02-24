<fieldset>
    <legend>帳號管理</legend>
    <section>
        <form action="./api/edit_user.php" method="post">
            <table class='ct' style="width:80%" id="showAcc">
                <tr style="background:#ccc">
                    <td>帳號</td>
                    <td>密碼</td>
                    <td>刪除</td>
                </tr>
                <?php
                $rows = $User->all();
                foreach ($rows as $row) {
                    if ($row['acc'] != 'admin') {
                ?>
                <tr>
                    <td><?= $row['acc'] ?></td>
                    <td><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
                    <td><input type="checkbox" name="del[]" value=<?= $row['id'] ?>></td>
                </tr>

                <?php
                    }
                }
                ?>
            </table>
            <div class='ct'>
                <input type="submit" value="確定刪除">
                <input type="reset" value="清空選取">
            </div>
        </form>
    </section>




    <h2>新增會員</h2>
    <span style="color:red">*請設定您要註冊的帳號及密碼 ( 最長12個字元 )</span>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="註冊" onclick="reg()">
                <input type="reset" value="清除">
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>
<script>
// $.get("./api/member.php",
//     function(result) {
//         // let arrays = JSON.parse(result);
//         result.forEach((val, idx) => {
//             console.log(val.acc);
//         })
//     }
// );


function reg() {
    let user = {
        acc: $("#acc").val(),
        pw: $("#pw").val(),
        pw2: $("#pw2").val(),
        email: $("#email").val()
    };
    // console.log(user);
    if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
        if (user.pw == user.pw2) {
            $.post("./api/chk_acc.php", {
                acc: user.acc
            }, (res) => {
                //測試有沒有得到正確的1或0 
                console.log(res);
                if (parseInt(res) == 1) {
                    alert("帳號重覆")
                } else {
                    $.post('./api/reg.php', user, (res) => {
                        location.reload();
                        //下述用ajax顯示新增的內容
                        //             console.log(res);
                        //             $('#showAcc').append(`
                        //             <tr>
                        //     <td>${res.acc}</td>
                        //     <td>${res.pw}</td>
                        //     <td><input type="checkbox" name="del[]" value=${res.id}></td>
                        // </tr>
                        //             `)

                    })
                }
            })

        } else {
            alert("密碼不一致");
            return false;
        }
    } else {
        alert("不可空白");
    }
}
</script>