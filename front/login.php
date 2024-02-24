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
<form id="login">
<fieldset>
    <legend>
        會員登入
    </legend>
    <div><span>帳號</span><span><input type="text" name="acc" id="acc"></span></div>
    <div><span>密碼</span><span><input type="password" name="pw" id="pw"></span></div>
    <div>
        <span>
            <input type="submit" value="登入"><input type="reset" value="清除">
        </span>
        <span style="text-align:end"><a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></span>
    </div>
</fieldset>
</form>
<script>
    $('#login').submit(function(event){
        let acc=$('#acc').val();
event.preventDefault();
let formData = new FormData(this);
$.ajax({
    type:"post",
    data:formData,
    // dataType:'json',
    contentType:false,
    processData:false,
    url:'./api/login.php',
    success:function(res){ 
        if(res=="1"){
            switch(acc){
                case "admin":
                    location.href="back.php";
                    break;
                default:
                    location.href="index.php";
            }
        }
        else{
            alert(res);
        }

}
    })
    
    })
</script>