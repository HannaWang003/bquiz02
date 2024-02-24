<style>
    form{
        width:80%;
        margin:auto;
        padding:20px;
    }
    input[type='text'],textarea{
        width:100%;
    }
    textarea{
        height:200px;
    }
</style>
<form action="./api/edit_news.php" method="post">
<br>
<h1>新增最新文章</h1>
<br>
    <div><span class="title">標題</span><input type="text" name="title"></div>
    <div><span>內容</span><textarea name="news"></textarea></div>
    <div><span>類別</span>
    <span>
       <select name="type" id="">
        <option value="1">健康新知</option>
        <option value="2">菸害防治</option>
        <option value="3">癌症防治</option>
        <option value="4">慢性病防治</option>
       </select> 
    </span>
    </div>
    <div style="text-align:end">
            <input type="submit" value="新增">
            <input type="button" value="清除" id="reset">
    </div>
</form>