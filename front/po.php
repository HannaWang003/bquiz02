<style>
    .type-item {
        cursor: pointer;
        margin: 5px;
    }

    .list-items {
        text-decoration: none;
    }
</style>
<div>目前位置:首頁 > 分類網誌 > <span class="type">慢性病防治</span></div>
<div style="display:flex;justify-content:space-between;width:80%;margin:auto">
    <fieldset style="width:25%;padding:20px">
        <legend>分類網誌</legend>
        <div class="type-item" data-type='1'>健康新知</div>
        <div class="type-item" data-type='2'>菸害防治</div>
        <div class="type-item" data-type='3'>癌症防治</div>
        <div class="type-item" data-type='4'>慢性病防治</div>
    </fieldset>
    <fieldset style="width: 74%;padding:20px">
        <legend>文章列表</legend>
        <div class="list-items"></div>
        <div class="news"></div>
    </fieldset>
</div>
<script>
    getlist(4);
    $(".type-item").on('click', function() {
        $('.type').text($(this).text());
        let type = $(this).data('type');
        getlist(type);
    })

    function getlist(type) {
        $.get('./api/getlist.php', {
            type
        }, (list) => {
            let titles = JSON.parse(list);
            let html = '';
            $.each(titles, (key, title) => {
                html += `
        <a onclick='getNews(${title.id})'>${title.title}</a><br>
        `
            })
            $('.list-items').html(html);
            $('.news').hide()

        })
    }

    function getNews(id) {
        console.log(id);
        $.get('./api/getnews.php', {
            id
        }, (res) => {
            let data = JSON.parse(res);
            let html = '';
            html += `
        <pre>
            ${data.news}
        </pre>
        `
        $('.news').show();
            $('.news').html(html);
            $('.list-items').html(`<h3>${data.title}</h3>`)

        })
    }
</script>