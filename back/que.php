<style>
fieldset{
    padding:20px;
}
input[type='text']{
    width:80%;
}
</style>
<form action="./api/add_que.php" method="post">
<fieldset>
    <legend>新增問卷</legend>
    <div style="display:flex">
        問卷名稱<input type="text" name="subject" id="" style="width:50%">
    </div>
    <div>
        <div id="opt">選項<input type="text" name="option[]" id=""><input type="button"  value="更多" onclick="more()"></div>
    </div>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="清空"></div>
</fieldset>
</form>
<script>
    function more(){
        let html=`
        <div>選項<input type="text" name="option[]"></div>
        `
        $("#opt").before(html);
    }
</script>