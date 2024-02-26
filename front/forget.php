<style>
    fieldset {
        padding: 10px;
    }
</style>
<fieldset>
    <legend>忘記密碼</legend>
    <h4>請輪入信箱以查詢密碼</h4>
    <input type="text" name="email" id="email" style="width:60%">
    <div id="result"></div>
    <button onclick="search()">尋找</button>
</fieldset>
<script>
    function search() {
        let email = $('#email').val();
        $.post('./api/chk_email.php', {
            email
        }, function(res) {
            $('#result').text(res);
        })
    }
</script>