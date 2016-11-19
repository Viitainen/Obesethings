$(document).ready(function() {

    //$('.scrollbar').perfectScrollbar();

    new Clipboard('.share-btn');

    $.fn.qtip.defaults.style.classes = 'qtip-dark qtip-custom';
    $.fn.qtip.defaults.position.my = 'bottom center';
    $.fn.qtip.defaults.position.at = 'top center';

    $('[title]').qtip({
    });

    $('.share-btn').click(function() {
        $(this).qtip({
            content: 'Copied to clipboard.',
            show: true
        });
    });
});
