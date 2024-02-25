
<style>
    table{
        margin:auto;
    }
    td,th{
        padding:10px;
    }
    td:nth-child(1){
        background:#eee;
    }
    .hide{
        display:none;
    }
    a:hover{
        text-decoration: none;
    }
    .max{
        background:rgba(0,0,0,0.8);
        color:#eee;
        width:110%;
        padding:10px;
    }
</style>
<div>目前位置:首頁 > 人氣文章區</div>
<br>
<table style="width:98%">
    <tr>
        <th class="ct" style="width:30%">標題</th>
        <th class="ct" style="width:50%">內容</th>
        <th style="width:20%">人氣</th>
    </tr>
    <?php
$total=$News->count(['sh'=>1]);
$div=5;
$now = ($_GET['p'])??'1';
$pages=ceil($total/$div);
$start=($now-1)*$div;
$rows = $News->all(['sh'=>1],"limit $start,$div");
foreach($rows as $row){
    switch($row['type']){
        case "1":
            $type="健康新知";
            break;
        case "2":
            $type="菸害防治";
            break;
        case "3":
            $type="癌症防治";
            break;
        case "4":
            $type="慢性病防治";
            break;

    }
    ?>
    <tr>
        <td><?=$row['title']?></td>
        <td style="position:relative">
            <div class="min"><?=mb_substr($row['news'],0,20)?>...</div>
            <div class="max hide" style="position:absolute;top:20px;left:20px">
            <h2 style="color:#3af"><?=$type?></h2><?=$row['news']?></div>
        </td>
        <td style="text-align:center">
<?php
echo $News->find($row['id'])['good']."個人說讚<a onclick='good({$row['id']})'><img src='./icon/02B03.jpg' style='width:15%;'></a>";
?>
        </td>
    </tr>
    <?php
}
    ?>
</table>
<div>
    <?php
    if(($now-1)>0){
        $prev=$now-1;        
        echo "<a href='?do=pop&p=$prev'> < </a>";
    }
for($i=1;$i<=$pages;$i++){
      $style = ($i==$now)?"style='font-size:20px;'":" ";
    echo "<a href='?do=pop&p=$i' $style>$i</a>";
}
if(($now+1)<=$pages){ 
    $next = $now+1;      
    echo "<a href='?do=pop&p=$next'> > </a>";
}
    ?>
</div>
<script>
    function good(news_id){
        $.post('./api/good.php',{news_id},function(res){
            location.reload();
            // console.log(res)
        })
    }
    $('.min').addBack('.min').hover(function(){
        $('.max').addClass('hide');
        $(this).siblings('.max').removeClass('hide');
    })
    $('.max').addBack('.min').mouseleave(function(){
        $(this).addClass('hide');
        $(this).siblings('.min').removeClass('hide');
    })

</script>