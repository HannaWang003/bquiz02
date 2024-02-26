<style>
    fieldset {
        padding: 10px;
    }
    </style>
    <form action="./api/add_que.php" method="post">
    <fieldset>
        <legend>新增問卷</legend>
        <div>問卷名稱 <input type="text" name="subject"></div>
        <div id="opt">選項<input type="text" name="opt[]"><input type="button" value="更多" onclick="more()"></div>
    </fieldset>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="清空">
    </div>
    </form>
    
    <script>
        function more(){
            let html=`
            <div>選項<input type="text" name="opt[]"></div>
            `
            $('#opt').before(html);
        }
    </script>