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
<form id="forget">
<fieldset>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id=""></div>
    <div id="res"></div>
    <div>
        <span>
            <input type="submit" value="尋找">
        </span>
    </div>
</fieldset>
</form>
<script>
    let Forget=$('#forget');
    let Res = $('#res');
Forget.submit(function(event){
    event.preventDefault();
    let formData=new FormData(this);
    $.ajax({
type:"post",
url:"./api/forget.php",
contentType:false,
processData:false,
data:formData,
dataType:"json",
success:function(res){
    // console.log(res)
    if(res){
Res.html(`您的密碼為:${res.pw}`);
    }
    else{

        Res.html("查無此資料")
    }
    }
    })
})
</script>