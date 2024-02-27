<style>
    fieldset {
        padding: 10px;
    }
    </style>
    <form action="./api/add_que.php" method="post">
    <fieldset>
        <legend>新增問卷</legend>
        <div>問卷名稱 <input type="text" name="subject"></div>
        <div id="opt">選項<input type="text" name="opts[]"><input type="button" value="更多" onclick="more()"></div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </fieldset>
    </form>

    <fieldset>
        <legend>問卷列表</legend>
        <table>
            <tr>
                <th>問卷名稱</th>
                <th>投票數</th>
                <th>開放</th>
            </tr>
            <?php
$subjects=$Que->all(['subject_id'=>0]);
    foreach($subjects as $subject){
            ?>
            <tr>
                <td><?=$subject['text']?></td>
                <td><?=$subject['vote']?></td>
                <td><input type="button" value="<?=($subject['sh']==1)?"開放":"關閉"?>" class="switch" data-id="<?=$subject['id']?>" data-sh="<?=$subject['sh']?>"></td>
            </tr>
            <?php
    }
            ?>
        </table>
    </fieldset>
    
    <script>
        function more(){
            let html=`
            <div>選項<input type="text" name="opts[]"></div>
            `
            $('#opt').before(html);
        }
        $('.switch').on('click',function(){
            let btn = $(this);
            id=$(this).data('id');
            sh=$(this).data('sh');
            $.post("./api/switch.php",{id,sh},function(res){
                if(res==1){
                    btn.val("開放");
                }else{
                    btn.val("關閉");
                }
            })
        })
    </script>