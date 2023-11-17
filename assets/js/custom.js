/*
-------------------------------------------------------------------------
* Template Name    : Landik - Saas & Software Landing Page Template     * 
* Author           : ThemesBoss                                         *
* Version          : 1.0.0                                              *
* Created          : July 2021                                          *
* File Description : Main Js file of the template                       * 
*------------------------------------------------------------------------
*/


! function($) {
    "use strict";

    var Landik = function() {}; 

    Landik.prototype.initMainmenu = function() {
        $.fn.nav = function () {
            return this.each(function () {
                var getNav = $(this),
                    top = getNav.data("top") || getNav.offset().top,
                    mdTop = getNav.data("md-top") || getNav.offset().top,
                    xlTop = getNav.data("xl-top") || getNav.offset().top,
                    navigation = getNav.find(".horizontal-menu"),
                    getWindow = $(window).outerWidth(),
                    anim = getNav.data("animate-prefix") || "",
                    getIn = navigation.data("in"),
                    getOut = navigation.data("out");
                $(window).on("resize", function () {
                    getWindow = $(window).outerWidth();
                });
                getNav.find(".horizontal-menu").each(function () {
                    var $menu = $(this);
                    $menu.on("click", function (e) {
                        if ("A" == e.target.tagName) {
                            $menu.find("li.active").removeClass("active");
                            $(e.target).parent().addClass("active");
                        }
                    });
                    $menu.find("li.active").removeClass("active");
                    $menu
                        .find('a[href="' + location.href + '"]')
                        .parent("li")
                        .addClass("active");
                });
                /* -- Events -- */
                getNav.find(".horizontal-menu, .extension-nav").each(function () {
                    var menu = this;
                    $(".dropdown-toggle", menu).on("click", function (e) {
                        e.stopPropagation();
                        return false;
                    });
                    $(".dropdown-menu", menu).addClass(anim + "animated");
                    $(".dropdown", menu).on("mouseenter", function () {
                        var dropdown = this;
                        $(".dropdown-menu", dropdown).eq(0).removeClass(getOut).stop().fadeIn().addClass(getIn);
                        $(dropdown).addClass("on");
                    });
                    $(".dropdown", menu).on("mouseleave", function () {
                        var dropdown = this;
                        $(".dropdown-menu", dropdown).eq(0).removeClass(getIn).stop().fadeOut().addClass(getOut);
                        $(dropdown).removeClass("on");
                    });
                    $(".mega-menu-col", menu)
                        .children(".sub-menu")
                        .removeClass("dropdown-menu " + anim + "animated");
                });
                if (getWindow < 992) {
                    /* -- Mega Menu -- */
                    getNav.find(".menu-item-has-mega-menu").each(function () {
                        var megamenu = this,
                            $columnMenus = [];
                        $(".mega-menu-col", megamenu)
                            .children(".sub-menu")
                            .addClass("dropdown-menu " + anim + "animated");
                        $(".mega-menu-col", megamenu).each(function () {
                            var megamenuColumn = this;
                            $(".mega-menu-col-title", megamenuColumn).on("mouseenter", function () {
                                var title = this;
                                $(title).closest(".mega-menu-col").addClass("on");
                                $(title).siblings(".sub-menu").stop().fadeIn().addClass(getIn);
                            });
                            if (!$(megamenuColumn).children().is(".mega-menu-col-title")) {
                                $columnMenus.push($(megamenuColumn).children(".sub-menu"));
                            }
                        });
                        $(megamenu).on("mouseenter", function () {
                            var submenu;
                            for (submenu in $columnMenus) {
                                $columnMenus[submenu].stop().fadeIn().addClass(getIn);
                            }
                        });
                        $(megamenu).on("mouseleave", function () {
                            $(".dropdown-menu", megamenu).stop().fadeOut().removeClass(getIn);
                            $(".mega-menu-col", megamenu).removeClass("on");
                        });
                    });
                }
            });
        };
    },

    Landik.prototype.initMenuhr = function() {
        $(".horizontal-nav").nav();
    },

    Landik.prototype.initMenuactive = function() {
        $(function () {
            for (
                var a = window.location,
                    abc = $(".horizontal-menu a")
                        .filter(function () {
                            return this.href == a;
                        })
                        .addClass("active")
                        .parent()
                        .addClass("active");
                ;

            ) {
                if (!abc.is("li")) break;
                abc = abc.parent().addClass("in").parent().addClass("active");
            }
        });
    },

    Landik.prototype.initMenutoggle = function() {
        $(".navbar-toggler").on("click", function (e) {
            e.preventDefault();
            $(".navbar-toggler i").toggleClass("icon-align-right icon-x");
        });
    },

    Landik.prototype.initDropdowntoggle = function() {
        $(".dropdown-toggle").on("click", function () {
            var dropdownList = $(".dropdown-menu"),
                dropdownOffset = $(this).offset(),
                offsetLeft = dropdownOffset.left,
                dropdownWidth = dropdownList.width(),
                docWidth = $(window).width(),
                subDropdown = dropdownList.eq(1),
                subDropdownWidth = subDropdown.width(),
                isDropdownVisible = offsetLeft + dropdownWidth <= docWidth,
                isSubDropdownVisible = offsetLeft + dropdownWidth + subDropdownWidth <= docWidth;

            if (!isDropdownVisible || !isSubDropdownVisible) {
                dropdownList.addClass("pull-right");
            } else {
                dropdownList.removeClass("pull-right");
            }
        });
    },

    Landik.prototype.initOwldemo = function() {
        $("#owl-demo").owlCarousel({
            autoPlay: 15000,
            stopOnHover: true,
            navigation: false,
            paginationSpeed: 1000,
            goToFirstSpeed: 2000,
            singleItem: true,
            autoHeight: true,
        });
    },

    Landik.prototype.initOwldemotwo = function() {
        $("#landingtwo").owlCarousel({
            autoPlay: 10000,
            autoHeight: true,
            items: 2,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 1],
        });
    },

    Landik.prototype.initDownscroll = function() {
        $(".down_scroll a").on("click", function (event) {
            var $anchor = $(this);
            $("html, body")
                .stop()
                .animate(
                    {
                        scrollTop: $($anchor.attr("href")).offset().top - 0,
                    },
                    1500,
                    "easeInOutExpo"
                );
            event.preventDefault();
        });
    },

    Landik.prototype.initMfpvideo = function() {
        $('.video_pop').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    },

    Landik.prototype.init = function() {
        this.initMainmenu();
        this.initMenuhr();
        this.initMenuactive();
        this.initMenutoggle();
        this.initDropdowntoggle();
        this.initOwldemo();
        this.initOwldemotwo();
        this.initDownscroll();
        this.initMfpvideo();
    },
    //init
    $.Landik = new Landik, $.Landik.Constructor = Landik
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Landik.init();
}(window.jQuery);















