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
</style>
<div>目前位置:首頁 > 最新文章區</div>
<br>
<table style="width:98%">
    <tr>
        <th class="ct" style="width:30%">標題</th>
        <th class="ct" style="width:60%">內容</th>
        <th style="width:10%"></th>
    </tr>
    <?php
$total=$News->count(['sh'=>1]);
$div=5;
$now = ($_GET['p'])??'1';
$pages=ceil($total/$div);
$start=($now-1)*$div;
$rows = $News->all(['sh'=>1],"limit $start,$div");
foreach($rows as $row){
    ?>
    <tr>
        <td><?=$row['title']?></td>
        <td>
            <div class="min"><?=mb_substr($row['news'],0,20)?>...</div>
            <div class="max hide"><?=$row['news']?></div>
        </td>
        <td style="text-align:center">
            <?php
if(isset($_SESSION['acc'])){
    if(($Good->count(['news_id'=>$row['id'],'acc'=>$_SESSION['acc']])>0)){
        echo "<a onclick='good({$row['id']})'>收回讚</a>";
    }else{
        echo "<a onclick='good({$row['id']})'>讚</a>";
    }
}

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
        echo "<a href='?do=news&p=$prev'> < </a>";
    }
for($i=1;$i<=$pages;$i++){
      $style = ($i==$now)?"style='font-size:20px;'":" ";
    echo "<a href='?do=news&p=$i' $style>$i</a>";
}
if(($now+1)<=$pages){ 
    $next = $now+1;      
    echo "<a href='?do=news&p=$next'> > </a>";
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
    $('.min').on('click',function(){
        $('.max').addClass('hide');
        $('.min').removeClass('hide');
        $(this).addClass('hide');
        $(this).siblings('.max').removeClass('hide');
    })
    $('.max').on('click',function(){
        $(this).addClass('hide');
        $(this).siblings('.min').removeClass('hide');
    })

</script>