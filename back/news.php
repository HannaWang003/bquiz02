<style>
fieldset {
    padding: 20
}
</style>
<fieldset id="news" style="display:none">
    <legend>新增文章</legend>
<table style="width:80%">
    <tr>
        <th>文章標題</th>
        <td><input type="text" name="title" id="addtitle"></td>
    </tr>
    <tr>
        <th>文章分類</th>
        <td><select name="type" id="addtype">
            <option value="1">健康新知</option>
            <option value="2">菸害防治</option>
            <option value="3">癌症防治</option>
            <option value="4">慢性病防治</option>
        </select></td>
    </tr>
    <tr>
        <th>文章內容</th>
        <td><textarea name="news" id="addnews" style="width:100%;height:100px"></textarea></td>
    </tr>
</table>
    <div class="ct">
        <input type="button" value="新增" id="addBtn">
        <input type="button" value="重置" onclick="reset()">
    </div>

</fieldset>
<fieldset>
    <input type="button" value="新增文章" id="newsBtn">
<legend>最新文章管理</legend>
<form id="editNews">
<table>
    <tr>
        <th>編號</th>
        <th>標題</th>
        <th>顯示</th>
        <th>刪除</th>
    </tr>
    <?php
$allnews = $News->all();
foreach($allnews as $key=>$news){
?>
    <tr>
        <td>
            <?=$key+1?>
            <input type="hidden" name="id[]" value='<?=$news['id']?>'>
    </td>
        <td><?=$news['title']?></td>
        <td><input type="checkbox" name="sh[]" value='<?=$news['id']?>' <?=($news['sh']==1)?"checked":""?> ></td>
        <td><input type="checkbox" name="del[]" value='<?=$news['id']?>'></td>
    </tr>
    <?php
}
    ?>
</table>
<div class="ct">
    <input type="submit" value="確定修改">
</div>
</form>
</fieldset>

<script>
$('#newsBtn').on('click', function() {
    $("#news").show();
})
$("#addBtn").on('click', function() {
    $(this).closest('fieldset').hide();
    let addData={
        title:$('#addtitle').val(),
        type:$('#addtype').val(),
        news:$('#addnews').val()
    }
    $.post('./api/edit_news.php',addData,function(){
        $('body').load("?do=news");
    })
})
$('#editNews').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        type:'post',
        data:formData,
        processData:false,
        contentType:false,
        dataType:'json',
        url:'./api/edit_news.php',
        success:function(res){
            console.log(res)
        }

    })
})
</script>