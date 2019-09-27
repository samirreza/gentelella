if ($(".flash-message-container").length > 0) {
    $(".flash-message-container")
        .children()
        .each(function(index) {
            let $alertDiv = $(this);
            setTimeout(function() {
                $alertDiv.alert("close");
                $(".flash-message-container").hide();
            }, index * 4000 + 4000);
        });
}

$("document").ready(function() {
    // action buttons (except for form submit button)
    let actionBtnClass = ".action-button";
    let actionBtnContainer = $(actionBtnClass).parent().clone();
    let actionBtnTop = $(actionBtnClass).offset().top;
    let actionBtnContainerHeight = $(actionBtnClass).parent().height();

    // horizontal nav menu
    let navMenuClass = ".nav_menu";
    let navMenuElement = $(navMenuClass);
    let navMenuHeight = navMenuElement.height();

    // form submit button
    let submitBtn = $("form button" + actionBtnClass + "[type=submit]");
    if(submitBtn.length > 0){ // if submit button exists
        let clonedSubmitBtn = submitBtn.clone(false); // false ignores all event handlers
        let idOfClonedSubmitBtn = "clonedSubmitBtn";
        clonedSubmitBtn.attr("id", idOfClonedSubmitBtn);
        $(document).on("click", "#" + idOfClonedSubmitBtn, function(event){
            event.preventDefault(); // just to make sure
            submitBtn.click();
        });
        actionBtnContainer.find("button[type=submit]").replaceWith(clonedSubmitBtn);
    }

    let extraMargin = -5;

    $(window).scroll(function(){
        if($(this).scrollTop() <= actionBtnTop - actionBtnContainerHeight){
            navMenuElement.css({"box-shadow": "none"});
            navMenuElement.css({"-moz-box-shadow": "none"});
            navMenuElement.css({"-webkit-box-shadow": "none"});
            if( navMenuElement.find(actionBtnClass).length > 0){ // exists
                navMenuElement.height(navMenuHeight - actionBtnContainerHeight - extraMargin);
                navMenuElement.find(actionBtnClass).parent().remove()
            }
          }else if($(this).scrollTop() > (navMenuElement.offset().top - actionBtnContainerHeight)){
            if( navMenuElement.find(actionBtnClass).length == 0){ // not exists
                // close all opened drop-downs before scrolling
                $(actionBtnClass).parent().find(".btn.btn-group").removeClass('open');
                actionBtnContainer.find(".btn.btn-group").removeClass('open');

                navMenuElement.height(navMenuHeight + actionBtnContainerHeight + extraMargin);
                navMenuElement.append(actionBtnContainer);
            }
            navMenuElement.css({
                "border-bottom": "1px solid #DDDDDD",
                "box-shadow": "0 7px 7px -6px #888888",
                "-moz-box-shadow": "0 7px 7px -6px #888888",
                "-webkit-box-shadow": "0 7px 7px -6px #888888"
            });
          }
    });
});

$(".collapse-link").on("click", function() {
    let panel = $(this).closest(".panel"),
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
    let isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
        (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
        (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
        (document.msFullscreenElement && document.msFullscreenElement !== null);

    let elem = document.documentElement;
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
