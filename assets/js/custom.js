if ($(".flash-message-container").length > 0) {
    $(".flash-message-container")
        .children()
        .each(function(index) {
            let $alertDiv = $(this);
            setTimeout(function() {
                $alertDiv.alert("close");
                $(".flash-message-container").hide();
            }, index * 1000 + 1000);
        });
}

// Sticky elements
$("document").ready(function() {

    // horizontal nav menu
    let navMenuClass = ".nav_menu";
    let navMenuElement = $(navMenuClass);
    let navMenuHeight = navMenuElement.height();
    let navMenuExtraHeight = 0;
    let navMenuExtraMargin = -5;

    // action buttons (except for form submit button)
    let actionBtnClass = ".action-button";
    if($(actionBtnClass).length > 0){
        let actionBtnContainer = $(actionBtnClass).parent();
        let clonedActionBtnContainer = actionBtnContainer.clone();
        let actionBtnTop = $(actionBtnClass).offset().top;
        let actionBtnContainerHeight = actionBtnContainer.height();

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
            clonedActionBtnContainer.find("button[type=submit]").replaceWith(clonedSubmitBtn);
        }

        $(window).scroll(function(){
            if($(this).scrollTop() <= actionBtnTop - actionBtnContainerHeight / 2){
                navMenuElement.css({"box-shadow": "none"});
                navMenuElement.css({"-moz-box-shadow": "none"});
                navMenuElement.css({"-webkit-box-shadow": "none"});
                if( navMenuElement.find(actionBtnClass).length > 0){ // exists
                    navMenuElement.height(navMenuHeight - navMenuExtraHeight - navMenuExtraMargin);
                    navMenuElement.find(actionBtnClass).parent().remove()
                }
            }else if($(this).scrollTop() > (navMenuElement.offset().top - actionBtnContainerHeight / 2)){
                if( navMenuElement.find(actionBtnClass).length == 0){ // not exists
                    // close all opened drop-downs before scrolling
                    actionBtnContainer.find(".btn.btn-group").removeClass('open');
                    clonedActionBtnContainer.find(".btn.btn-group").removeClass('open');

                    navMenuElement.append(clonedActionBtnContainer);
                    navMenuExtraHeight = navMenuElement.find(actionBtnClass).parent().height();
                    navMenuElement.height(navMenuHeight + navMenuExtraHeight + navMenuExtraMargin);
                }
                navMenuElement.css({
                    "border-bottom": "1px solid #DDDDDD",
                    "box-shadow": "0 7px 7px -6px #888888",
                    "-moz-box-shadow": "0 7px 7px -6px #888888",
                    "-webkit-box-shadow": "0 7px 7px -6px #888888"
                });
            }
        });
    }

    //-------------------------------------------------------------------

    if($(".grid-view table").length > 0){
	    let theadTop = $(".grid-view table thead").offset().top;
		let theadWidth = $(".grid-view table thead").width();
		$(window).scroll(function(){
            let element=$(".grid-view table thead");

            if($(this).scrollTop() <= theadTop-43){
                element.css({"box-shadow": "none"});
                element.css({"-moz-box-shadow": "none"});
                element.css({"-webkit-box-shadow": "none"});
                element.css({"background-color": "inherit"});
                element.removeClass("thead-fixed-top");
                element.css({"position":"static","top":theadTop});
            } else if($(this).scrollTop() > (element.offset().top) && element.css("position") == "static" && element.parent().find("tr").length > 10){
                let thWidths = [];
                element.find("th").each(function(){
                    thWidths.push($(this).width());
                });

                let navMenuHeight2 = navMenuElement.height();
                element.css({
                    "position": "fixed",
                    "top": navMenuHeight2,
                    "width": theadWidth,
                    "background-color": "#FFFFFF",
                    "border-bottom": "1px solid #DDDDDD",
                    "box-shadow": "0 7px 7px -6px #888888",
                    "-moz-box-shadow": "0 7px 7px -6px #888888",
                    "-webkit-box-shadow": "0 7px 7px -6px #888888",
                    "z-index": "3"
                });
                let i = 0;
                element.find("th").each(function(){
                    $(this).width(thWidths[i]);
                    ++i;
                });
                element.addClass("thead-fixed-top");
                i = 0;
                element.parent().find("tbody tr:first td").each(function(){
                    $(this).css({
                        "min-width":thWidths[i] ,
                        "max-width":thWidths[i] ,
                        "width":thWidths[i]
                    });
                    ++i;
                });
            }
	  });
	}
});

// ----------------------------------------------------------------

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


function getUrlVars()
{
    let vars = [], hash;
    let hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(let i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
