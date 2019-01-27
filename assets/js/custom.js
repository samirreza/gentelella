if ($(".fixed-action-buttons")[0]){
    $(".top_nav_fixed").css("height", "140px");
    $(".right_col").addClass("right_col_with_top_buttons");
}

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
        $(".go-top").fadeIn(600);
    } else {
        $(".go-top").fadeOut(600);
    }
});

$(".go-top").click(function(event) {
    event.preventDefault();

    $("html, body").animate({ scrollTop: 0 }, 300);
});

$('.closed-panel').each(function() {
    var panel = $(this).closest('.panel'),
        icon = $(this).find('i'),
        content = panel.find('.panel-body');
    content.slideToggle(200);
    content.css('height', 'auto');
    icon.toggleClass('fa-angle-up fa-angle-down');
});

$("#menu_toggle").click(function() {
    if ($("div.title").css("margin-left") == "270px") {
        $("div.title").css("margin-left", "0px");
    } else {
        $("div.title").css("margin-left", "270px");
    }
});
