<style>
    .type-item {
        display: block;
    }

    .types,
    .new-items {
        display: inline-block;
        vertical-align: top;
    }

    .new-items {
        width: 600px;
    }
</style>
<div class="nav">目前位置: 首頁 > 分類網誌 > <span class="type">健康新知</span></div>
<fieldset class="types">
    <legend>分類網誌</legend>
    <a class='type-item' data-id="1">健康新知</a>
    <a class='type-item' data-id="2">菸害防治</a>
    <a class='type-item' data-id="3">病防治</a>
    <a class='type-item' data-id="4">慢性病防治</a>
</fieldset>
<fieldset class="new-items">
    <legend>文章列表</legend>
    <div class="list-items" style="display:none"></div>
    <div class="article"></div>
</fieldset>

<script>
    getList(1);
    $(".type-item").on('click', function() {
        $('.type').text($(this).text());
        let type = $(this).data('id');
        getList(type);
    })

    function getList(type) {
        $.get("./api/get_list.php", {
            type
        }, (list) => {

            $(".list-items").html(list);
            // $(".article,.list-items").toggle();
            $(".list-items").show();
            $(".article").hide();
        })
    }

    function getNews(id) {
        $.get("./api/get_news.php", {
            id
        }, (news) => {
            $(".article").html(news);
            // $(".article,.list-items").toggle();
            $(".list-items").hide();
            $(".article").show();
        })
    }
</script>