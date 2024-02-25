<style>
    table{
        margin:auto;
    }
</style>
<div style="text-align:end">
  <button onclick="location.href='?do=add_news'">新增文章</button>  
</div>

<form action="./api/edit_news.php" method="post">
<table class="all">
    <tr>
        <th class="ct">編號</th>
        <th class="ct">標題</th>
        <th class="ct">顯示</th>
        <th class="ct">刪除</th>
    </tr>
    <?php 
$total = $News->count();
$div=3;
$pages=ceil($total/$div);
$nowpage = ($_GET['p'])??"1";
$start = ($nowpage-1)*3;   
$news = $News->all("limit $start,$div");
foreach($news as $key=>$new){
?>
    <tr>
        <td class="ct"><?=$key+1?></td>
        <td class="ct"><?=$new['title']?></td>
        <td class="ct"><input type="checkbox" name="sh[]" value=<?=$new['id']?> <?=($new['sh']==1)?"checked":"" ?> ></td>
        <td class="ct"><input type="checkbox" name="del[]" value=<?=$new['id']?>></td>
        <input type="hidden" name="id[]" value=<?=$new['id']?> >
    </tr>
    <?php
}
    ?>
</table>
<div class="ct">
    <?php
    if(($nowpage-1)>0){
        $prev=$nowpage-1;        
        echo "<a href='?do=news&p=$prev'> < </a>";
    }
for($i=1;$i<=$pages;$i++){
      $style = ($i==$nowpage)?"style='font-size:20px;'":" ";
    echo "<a href='?do=news&p=$i' $style>$i</a>";
}
if(($nowpage+1)<=$pages){ 
    $next = $nowpage+1;      
    echo "<a href='?do=news&p=$next'> > </a>";
}
    ?>
</div>
<div class="ct">
    
    <input type="submit" value="確定修改">
</div>
</form>