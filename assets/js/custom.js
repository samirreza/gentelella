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

function openFullscreen() {
    var elem = document.documentElement;
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
}
