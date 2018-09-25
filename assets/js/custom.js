if ($('.flash-message-container').length > 0) {
    $(".flash-message-container").children().each(function(index){
        var $alertDiv = $(this);
        setTimeout(function() {
            $alertDiv.alert('close');
        }, (index * 4000) + 4000);
    });
}
