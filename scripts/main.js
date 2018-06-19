$(document).ready(function () {
    $('.tab-block').each(function () {
        checkNavTabs($(this));
    });

    $('.nav-link').on('click', function(){
        localStorage.setItem('tabs', $(this).attr('id'));
    });
});

function checkNavTabs($block) {

    var $tabs = $block.find('.nav-link');
    var $panes = $block.find('.tab-pane');

    if (localStorage.getItem('tabs') == "") {
        $tabs.first().addClass('show active');
        $panes.first().addClass('show active');
        localStorage.setItem('tabs', $tabs.first().attr('id'));

    } else {
        var tabID = localStorage.getItem('tabs');
        console.log(tabID);
        var $tab = $('#'+tabID);
        $tab.addClass('show active');
        $($tab.attr('href')).addClass('show active');
    }
}

