if ($('.flash-message-container').length > 0) {
    $(".flash-message-container").children().each(function(index){
        var $alertDiv = $(this);
        setTimeout(function() {
            $alertDiv.alert('close');
        }, (index * 4000) + 4000);
    });
}

$('.collapse-link').on('click', function () {
    var panel = $(this).closest('.panel'),
        icon = $(this).find('i'),
        content = panel.find('.panel-body');
    content.slideToggle(200);
    content.css('height', 'auto');
    icon.toggleClass('fa-angle-up fa-angle-down');
});
