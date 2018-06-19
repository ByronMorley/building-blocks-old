$(document).ready(function () {
    $('.tab-block').each(function () {
        checkNavTabs($(this));
    });

    $('.nav-link').on('click', function(){
        localStorage.setItem('tabs', $(this).parent().index());
    });
});

function checkNavTabs($block) {

    var $tabs = $block.find('.nav-link');
    var $panes = $block.find('.tab-pane');

    if (localStorage.getItem('tabs') === null) {
        $tabs.first().addClass('show active');
        $panes.first().addClass('show active');
        localStorage.setItem('tabs', $tabs.first().attr('id'));

    } else {
        var index = localStorage.getItem('tabs');
        var $tab = $tabs.eq(index);
        $tab.addClass('show active');
        $($tab.attr('href')).addClass('show active');
    }
    localStorage.clear();
}

