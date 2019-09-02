if ($(".flash-message-container").length > 0) {
    $(".flash-message-container")
        .children()
        .each(function(index) {
            var $alertDiv = $(this);
            setTimeout(function() {
                $alertDiv.alert("close");
            }, index * 4000 + 4000);
        });
}

$("document").ready(function() {
    $(".action-button").parent().css('position', 'fixed');
    $(".action-button").parent().css('z-index', '9');
    $(".action-button").parent().css('margin-top', '-40px');
});

$(".collapse-link").on("click", function() {
    var panel = $(this).closest(".panel"),
        icon = $(this).find("i"),
        content = panel.find(".panel-body");
    content.slideToggle(200);
    content.css("height", "auto");
    icon.toggleClass("fa-angle-up fa-angle-down");
});

$(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
        $(".go-top").fadeIn(100);
    } else {
        $(".go-top").fadeOut(100);
    }
});

$(".go-top").click(function(event) {
    event.preventDefault();

    $("html, body").animate({ scrollTop: 0 }, 300);
});

function toggleFullscreen() {
    var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
        (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
        (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
        (document.msFullscreenElement && document.msFullscreenElement !== null);

    var elem = document.documentElement;
    if (!isInFullScreen) {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE/Edge */
            elem.msRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}
