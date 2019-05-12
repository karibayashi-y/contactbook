
$(function () {
    $('.ul.pagination').hide();
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<div>読み込み中...</div>',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
        });
    });