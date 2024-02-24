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
        會員登入
    </legend>
    <div><span>帳號</span><span><input type="text" name="acc" id=""></span></div>
    <div><span>密碼</span><span><input type="text" name="pw" id=""></span></div>
    <div>
        <span>
            <input type="submit" value="登入"><input type="reset" value="清除">
        </span>
        <span style="text-align:end"><a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></span>
    </div>
</fieldset>
</form>