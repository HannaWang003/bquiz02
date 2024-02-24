<fieldset>
    <legend>目前位置: 首頁 > 最新文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th width=""></th>
        </tr>
        <?php
        $nowpage = ($_GET['page']) ?? 1;
        $total = $News->count(['sh' => 1]);
        $size = 5;
        $pages = ceil($total / 5);
        $start = ($nowpage - 1) * $size;
        ?>
        <?php
        $rows = $News->all(['sh' => 1], "limit $start,$size ");
        foreach ($rows as $row) {
        ?>
        <tr>
            <td>
                <div class='title' data-id="<?= $row['id']; ?>" style="cursor:pointer;">
                    <?= $row['title'] ?></div>
            </td>
            <td>
                <div id="s<?= $row['id'] ?>"><?= mb_substr($row['news'], 0, 25) ?>...</div>
                <div id="a<?= $row['id'] ?>" style="display:none"><?= $row['news'] ?></div>
            </td>
            <td>
                <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) {
                            echo "<a id='n{$row['id']}' href='Javascript:good({$row['id']})'>收回讚</a>";
                        } else {
                            echo "<a id='n{$row['id']}' href='Javascript:good({$row['id']})'>讚</a>";
                        }
                    }
                    ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
    if ($nowpage - 1 > 0) {
        $prev = $nowpage - 1;
        echo "<a href='?do=news&page=$prev'> < </a>";
    }
    for ($i = 1; $i <= $pages; $i++) {
        $fontSize = ($i == $nowpage) ? 'font-size:24px' : '';
        echo "<a href='?do=news&page=$i' style='$fontSize'>$i</a>";
    }
    if ($nowpage + 1 <= $pages) {
        $next = $nowpage + 1;
        echo "<a href='?do=news&page=$next'> > </a>";
    }
    ?>
</fieldset>
<script>
$(".title").on('click', (e) => {
    let id = $(e.target).data('id')
    $(`#s${id},#a${id}`).toggle()

})
</script>