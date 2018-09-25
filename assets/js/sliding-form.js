$().ready(function() {
    $(document).on('click', 'a.ajaxcreate, .ajaxupdate, .ajaxview', function(event) {
        event.preventDefault();
        showLoading();
        $('div.sliding-form-wrapper').slideUp(300);
        $.ajax({
            url: $(this).attr('href'),
            type: 'post',
            dataType: 'json',
            success: function(data) {
                hideLoading();
                $('div.sliding-form-wrapper').html(data.content).slideDown(500);
            }
        });
    });

    $(document).on('click', 'a.close-sliding-form-button', function(event) {
        event.preventDefault();
        $('div.sliding-form-wrapper').slideUp(500);
    });

    $(document).on('submit', 'form.sliding-form', function(event) {
        event.preventDefault();
        showLoading();
        $('.sliding-form-wrapper button.submit').attr('disabled', 'disabled');
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: false
        }).done(function(data) {
            hideLoading();
            if (data.status == 'success' || data.status == 'danger') {
                $('div.sliding-form-wrapper').slideUp(500);
                showAlert(data.message, data.status);
                refreshGrid();
            } else {
                $('div.sliding-form-wrapper').html(data.content);
                $('.sliding-form-wrapper button.submit').removeAttr('disabled');
            }
        });
    });

    $(document).on('click', 'a.ajaxdelete', function(event) {
        event.preventDefault();
        showLoading();
        if (confirm($(this).attr('data-confirmmsg'))) {
            $('div.sliding-form-wrapper').slideUp(500);
            $.ajax({
                url: $(this).attr('href'),
                type: 'post',
                dataType: 'json'
            }).done(function(data) {
                hideLoading();
                showAlert(data.message, data.status);
                refreshGrid();
            });
        } else {
            hideLoading();
        };
    });

    $(document).on('click', 'a.ajaxrequest', function(event) {
        event.preventDefault();
        showLoading();
        $('div.sliding-form-wrapper').slideUp(500);
        $.ajax({
            url: $(this).attr('href'),
            type: 'post',
            dataType: 'json'
        }).done(function(data) {
            hideLoading();
            showAlert(data.message, data.status);
            refreshGrid();
        });
    });

    function showLoading() {
        loadingDiv = $('<div class="loading-gif"><i class="fa fa-spinner fa-pulse fa-3x"></i></div>');
        $('body').prepend(loadingDiv);
    }

    function hideLoading() {
        $('.loading-gif').css('display', 'none');
    }

    function refreshGrid() {
        idOfPjax = $('a.ajaxcreate').attr('data-gridpjaxid');
        $.pjax.defaults.timeout = false;
        $.pjax.reload({container:'#'+idOfPjax});
    }

    function showAlert(message, status) {
        status = status || 'success';
        if (!Array.isArray(message)) {
            message = [message];
        }
        message.forEach(function(message) {
            alertDiv = $('<div class="alert-' + status + ' alert fade in"></div>');
            alertDiv.html(message);
            $(".flash-message-container").append(alertDiv);
        });
        $(".flash-message-container").children().each(function(index) {
            var $alertDiv = $(this);
            setTimeout(function() {
                $alertDiv.alert('close');
            }, (index * 4000) + 4000);
        });
    }
});
