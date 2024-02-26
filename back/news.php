<style>
fieldset {
    padding: 20
}
</style>
<fieldset id="news" style="display:none">
    <legend>新增文章</legend>

    <div class="ct">
        <input type="button" value="新增" id="in_news">
        <input type="button" value="重置" onclick="reset()">
    </div>

</fieldset>

<fieldset>
    <legend>最新文章管理</legend>
    <input type="button" value="新增文章" id="add_news">
</fieldset>
<script>
$('#add_news').on('click', function() {
    $("#news").show();
})
$("#in_news").on('click', function() {
    $(this).closest('fieldset').hide();
})
</script>