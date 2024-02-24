<style>
    table{
        width:50%;
        margin:auto;
        text-align:center;
    }
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
    <legend>帳號管理</legend>
    <form action="./api/del_admin.php" method="post">
    <table class="all">
        <tr>
            <th class="ct">帳號</th>
            <th class="ct">密碼</th>
            <th class="ct">刪除</th>
        </tr>
        <?php
$users = $User->all();
foreach($users as $user){
    if($user['acc']!='admin'){
        ?>
<tr>
            <td class="ct"><?=$user['acc']?></td>
            <td class="ct"><?=str_repeat("*",mb_strlen($user['pw']))?></td>
            <td class="ct"><input type="checkbox" name="del[]" value=<?=$user['id']?> ></td>
        </tr>

<?php
    }
}
        ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
        </div>
        </form>
        <br>
<h1>新增會員</h1>
<br>
<span style="color:red;width:100%;">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <div><span>step1:登入帳號</span><span><input type="text" name="acc" id="acc"></span></div>
    <div><span>step2:登入密碼</span><span><input type="password" name="pw" id="pw" maxlength="12"></span></div>
    <div><span>step3:再次確認密碼</span><span><input type="password" name="pw" id="pw2" maxlength="12"></span></div>
    <div><span>step4:信箱(忘記密碼時使用)</span><span><input type="text" name="email" id="email"></span></div>
    <div>
        <span>
            <input type="button" value="新增" id="reg"><input type="button" value="清除" id="reset">
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
                   location.reload();
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
