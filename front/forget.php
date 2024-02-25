<h3>請輸入信箱以查詢密碼</h3>
<input type="text" name="email" id="email" style="width:80%">
<div id="result"></div>
<button id="chkBtn">尋找</button>
<script>
    let result=$('#result');
    $('#chkBtn').on('click',function(res){
        let email = $('#email').val();
        $.post('./api/chkemail.php',{email},function(res){
            result.text(res);
        })
    })
</script>