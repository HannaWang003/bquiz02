<?php
include_once "./api/db.php";
$_SESSION['acc']="admin";
$type=[1=>"健康新知",
       2=>"菸害防治",
       3=>"癌症防治",
       4=>"慢性病防治"
];
for($i=1;$i<=4;$i++){{
    echo "<a onclick='on(this,$i)'>$type[$i]</a></br>";
}}
?>
<h1>分類網誌</h1>
<script src="./jquery-1.9.1.min.js"></script>
<h2>目前位置:首頁>分類網誌><span id="mynewstitle"></span></h2>
<div id="title"></div>
<script>
    function on(dom,type){
        $('#mynewstitle').text($(dom).text())
        $.post('./api/get_title.php',{type},function(res){
            // console.log(res);
$('#title').html(res);
        })
    }
    $('#title').on('click','.itemBtn',function(){
        let id=$(this).data('id');
        $.post('./api/get_news.php',{id},function(res){
            // console.log(res);
$('#title').html(res);
        })
    })
</script>
<h1>最新文章</h1>
<h2>目前位置:首頁>最新文章區><span id="mynewtitle"></span></h2>
<table>
    <tr>
        <th>標題</th>
        <th>內容</th>
        <th></th>
    </tr>
<?php
$rows = $News->all(['sh'=>1]);
foreach($rows as $row){
?>
<tr>
    <td class="getnews" data-id="<?=$row['id']?>" style="vertical-align:top"><?=$row['title']?></td>
    <td width="500px">
        <div class="min"><?=mb_substr($row['news'],0,20)?></div>
        <div class="all" style="display:none"><?=$row['news']?></div>
    </td>
    <td>
<?php
if(isset($_SESSION['acc'])){
echo ($Good->count(['news_id'=>$row['id'],'acc'=>$_SESSION['acc']])>0)?"<button class='chg' data-good='0' data-news='{$row['id']}'>收回讚</button>":"<button class='chg' data-good='1' data-news='{$row['id']}'>讚</button>";
}
?>
    </td>
</tr>
<?php
}

?>
</table>
<script>
    $('.getnews').on('click',function(){
        $('.all').hide();
        $('.min').show();
       $(this).closest('tr').find('.min').hide();
       $(this).closest('tr').find('.all').show();
        })
    $('.all').on('click',function(){
        $(this).hide();
        $(this).siblings('.min').show();
    })
    $('.chg').on('click',function(){
        let chg=$(this);
        let good=$(this).data('good');
        let news_id=$(this).data('news');
        console.log(good,news_id)
        $.post('./api/chg.php',{news_id,good},function(res){
location.reload();
        })
    })
</script>
<h1>最新文章</h1>
<h2>目前位置:首頁>人氣文章區><span id="mypoptitle"></span></h2>
<table>
    <tr>
        <th>標題</th>
        <th>內容</th>
        <th></th>
    </tr>
<?php
$rows = $News->all(['sh'=>1],"order by good desc");
foreach($rows as $row){
?>
<tr>
    <td class="getnews" data-id="<?=$row['id']?>" style="vertical-align:top"><?=$row['title']?></td>
    <td width="500px" style="position:relative;">
        <div class="popmin"><?=mb_substr($row['news'],0,20)?></div>
        <div class="popall" style="display:none;background:#ff0;width:500px;height:300px;overflow:auto;position:absolute;top:2px;left:100px;z-index:1000"><?=$row['news']?></div>
    </td>
    <td>
<?php
if(isset($_SESSION['acc'])){
echo $row['good']."個人說讚|";
echo ($Good->count(['news_id'=>$row['id'],'acc'=>$_SESSION['acc']])>0)?"<button class='chg' data-good='0' data-news='{$row['id']}'>收回讚</button>":"<button class='chg' data-good='1' data-news='{$row['id']}'>讚</button>";

}
?>
    </td>
</tr>
<?php
}

?>
</table>
<script>
        $('.popmin').hover(function(){
        $('.popall').hide();
       $(this).siblings('.popall').show();
        },
        function(){
            $(this).siblings('.popall').hide();
        }
        )
        $('.popall').hover(function(){
            $(this).show();
        },     function(){
            $(this).hide();
        })
        $('.chg').on('click',function(){
        let chg=$(this);
        let good=$(this).data('good');
        let news_id=$(this).data('news');
        console.log(good,news_id)
        $.post('./api/chg.php',{news_id,good},function(res){
location.reload();
        })
    })
</script>
<form action="./api/add_que.php" method="post">
<fieldset>
    <legend>新增問卷</legend>
<div>問卷名稱: <input type="text" name="big" id=""></div>
<div id="subque">選項: <input type="text" name="sub[]"><input type="button" class="addmore" value="更多"></div>
<div><input type="submit" value="新增"><input type="reset" value="清空"></div>
</fieldset>
</form>
<script>
    $('.addmore').on('click',function(){
        let html=`<div id="subque">選項: <input type="text" name="sub[]"></div>`;
        $('#subque').before(html);
    })
</script>
<fieldset>
    <legend>目前位置:首頁 > 問卷調查</legend>
    <table>
        <tr>
            <th>編號</th>
            <th>問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>
        <?php
$ques = $Que->all(['subject_id'=>0]);
// unset($_SESSION['acc']);
foreach($ques as $key => $que){

    ?>
<tr>
     <td><?=$key+1?></td>
            <td><?=$que['text']?></td>
            <td><?=$que['vote']?></td>
            <td><a href="?do=result&id=<?=$que['id']?>">結果</a></td>
            <td><?=(!isset($_SESSION['acc']))?"<a href='?do=login'>請先登入</a>":"<a href='?do=vote&id={$que['id']}'>參與投票</a>"?></td>
        </tr>
    <?php
}
        ?>
        
        
        </table>
</fieldset>
<?php
if(isset($_GET['login'])){
    echo "<h1>會員登入</h1>";
}
if(isset($_GET['do']) && $_GET['do']=="vote" && isset($_GET['id'])){
    $big=$Que->find($_GET['id'])['text'];
    ?>
    <form action="./api/vote.php" method="post">
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查 > <?=$big?></legend>
    <?php
    $subs = $Que->all(['subject_id'=>$_GET['id']]);
    foreach($subs as $sub){
echo "<input type='radio' name='sub' value='{$sub['id']}'>{$sub['text']}</br>";
    }
    ?>
<div class="ct"><button>我要投票</button></div>
</fieldset>
</form>
    <?php
}
?>
<?php
if(isset($_GET['do']) && $_GET['do']=="result" && isset($_GET['id'])){
     $big=$Que->find($_GET['id'])['text'];
    ?>
    <form action="./api/vote.php" method="post">
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查 > <?=$big?></legend>
    <h3><?=$big?></h3>
    <?php
    $subs = $Que->all(['subject_id'=>$_GET['id']]);
    $total = $Que->sum('vote',['subject_id'=>$_GET['id']]);
    foreach($subs as $key=> $sub){
        $percent = round($sub['vote']/$total,2);
        ?>
<div><?=$key+1?>. <?=$sub['text']?></div>
<div style="height:40px;width:<?=$percent*100*10?>px;background:#eee;"></div><?=$sub['vote']?>票(<?=$percent*100?>)%
<?php

    }
    ?>
<div class="ct"><button>我要投票</button></div>
</fieldset>
</form>

    <?php
}

?>




