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
    input[type="text"]{
        width:100%;
    }
</style>
<form action="">
<fieldset>
    <legend>
        會員註冊
    </legend>
    <span style="color:red;width:100%;">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <div><span>step1:登入帳號</span><span><input type="text" name="acc" id=""></span></div>
    <div><span>step2:登入密碼</span><span><input type="password" name="pw" id="" maxlength="12"></span></div>
    <div><span>step3:再次確認密碼</span><span><input type="text" name="pw" id=""></span></div>
    <div><span>step4:信箱(忘記密碼時使用)</span><span><input type="text" name="pw" id=""></span></div>
    <div>
        <span>
            <input type="submit" value="註冊"><input type="reset" value="清除">
        </span>
    </div>
</fieldset>
</form>