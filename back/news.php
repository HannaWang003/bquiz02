<form action="./api/edit_news.php" method="post">
    <table>
        <tr>
            <td>編號</td>
            <td>標題</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        //分頁功能
        $nowpage = ($_GET['page']) ?? 1;
        $page_size = 3;
        $total = $News->count();
        $page = ceil($total / $page_size);
        $start = ($nowpage - 1) * $page_size;
        // echo $start;

        $rows = $News->all("limit $start,$page_size");
        // dd($rows);
        foreach ($rows as $idx => $row) {
        ?>
            <tr>
                <td><?= $idx + 1 + $start ?></td>
                <td><?= $row['title'] ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
                    <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <?php
        if ($nowpage - 1 > 0) {
            $prev = $nowpage - 1;
            echo "<a href='?do=news&page=$prev'> < </a>";
        }
        for ($i = 1; $i <= $page; $i++) {
            $size = ($i == $nowpage) ? 'font-size:22px' : 'font-size:16px';
            echo "<a href='?do=news&page=$i' style='{$size}'>$i</a>";
        }
        if ($nowpage + 1 <= $page) {
            $next = $nowpage + 1;
            echo "<a href='?do=news&page=$next'> > </a>";
        }
        ?>
        <a href=""></a>
    </div>
    <div class="ct"><input type="submit" value="確定修改"></div>
</form>