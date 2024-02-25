
<style>
    fieldset{
        width:60%;
        padding:20px;
        margin:auto;
    }
    table{
        margin:auto;
    }
</style>
<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td style="width:50%;">帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="登入" id="login"><input type="reset" value="清除">
            </td>
            <td style="text-align:end;">
                <a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    $('#login').on('click',function(){
        let chk={
            acc:$('#acc').val(),
            pw:$('#pw').val()
        }
        $.post('./api/user_chk.php',chk,function(res){
            console.log(res);
            switch(res){
                case "查無帳號":
                    $("#acc").val("");
                    $("#pw").val("");
                    alert(res);
                    break;
                case "密碼錯誤":
                    alert(res);
                    break;
                case "1":
                    location.href="?do=main";
                    break;
                case "2":
                    location.href="back.php";
                    break;                    
            }
        })
    })
</script>