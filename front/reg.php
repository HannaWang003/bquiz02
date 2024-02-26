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
    <legend>會員註冊</legend>
    <span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table style="width:100%">
        <tr>
            <td style="width:50%;">setp1:登入帳號</td>
            <td><input type="text" name="acc" id="acc" maxlength=12></td>
        </tr>
        <tr>
            <td style="width:50%;">setp2:登入密碼</td>
            <td><input type="text" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td style="width:50%;">setp3:再次確認密碼</td>
            <td><input type="text" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td style="width:50%;">setp4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
       
        <tr>
            <td>
                <input type="button" value="新增" id="addBtn"><input type="reset" value="清除" id="clearBtn">
            </td>
            <td style="text-align:end;">
            </td>
        </tr>
    </table>
</fieldset>
<script>
$('#addBtn').on('click',function(){
    if($('#acc').val()!="" && $('#pw').val()!="" && $("#email").val()!="" && $('#pw2').val()!=""){

        let addData={
            acc:$('#acc').val(),
            pw:$('#pw').val(),
            email:$("#email").val(),
            pw2:$('#pw2').val()
        }
        if($("#pw").val()!=$('#pw2').val()){
            alert("密碼錯誤");
        }else{
    $.post('./api/reg.php',addData,function(res){
        if(res!=0){
            alert("帳號重覆")
        }else{
            alert("註冊成功!請登入")
            location.href="?do=login";
        }
    })
        }
    }
    else{
        alert("不可空白");
    }
})
$('#clearBtn').on('click',function(){
    $('#acc').val("")
 $('#pw').val("")
 $("#email").val("")
 $('#pw2').val("")
})
</script>