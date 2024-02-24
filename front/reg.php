<style>
    span{
        display:inline-block;
        width:45%;
    }
    fieldset{
        width:80%;
        margin:auto;
        padding:2vw;
    }
    input[type="text"],input[type="password"]{
        width:100%;
    }
</style>
<fieldset>
    <legend>
        會員註冊
    </legend>
    <span style="color:red;width:100%;">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <div><span>step1:登入帳號</span><span><input type="text" name="acc" id="acc"></span></div>
    <div><span>step2:登入密碼</span><span><input type="password" name="pw" id="pw" maxlength="12"></span></div>
    <div><span>step3:再次確認密碼</span><span><input type="password" name="pw" id="pw2" maxlength="12"></span></div>
    <div><span>step4:信箱(忘記密碼時使用)</span><span><input type="text" name="email" id="email"></span></div>
    <div>
        <span>
            <input type="button" value="註冊" id="reg"><input type="button" value="清除" id="reset">
        </span>
    </div>
</fieldset>
<script>
    let Reg=$('#reg');
    let Reset=$('#reset');
Reg.on('click',function(){
    let user={
        acc:$('#acc').val(),
        pw:$('#pw').val(),
        pw2:$('#pw2').val(),
        email:$('#email').val()
    }
     if(user.acc!=''&&user.pw!=''&&user.pw2!=''&&user.email!=''){
        if(user.pw==user.pw2){
            $.post("./api/reg.php",user,function(res){
                if(res==0){
                    alert('註冊完成，歡迎加入')
                    location.href="?do=login";
                }
                else{
                    alert('帳號重覆')
                }
            })
        }
        else{
            alert('密碼錯誤');
        }
    }
    else{
        alert('不可空白');
    }
})
Reset.on('click',function(){
    $('#acc').val('')
    $('#pw').val('')
    $('#pw2').val('')
    $('#email').val('')
})
   
</script>