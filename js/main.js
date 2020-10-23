jQuery(document).ready(function($) {
    $(".main-navigation").removeClass("hidden");
    $(".mobile-navigation").removeClass("hidden");
    function setupMobileMenu() {
        $(".mobile-navigation").hide();
        $(".mobile-navigation .sub-menu").hide();
        $(".mobile-navigation .menu-item-has-children > a").click(function(e) {
            e.preventDefault();
            $(this).attr("aria-expanded", $(this).attr("aria-expanded") === "true" ? "false" : "true");
            $(this).next(".sub-menu").slideToggle("fast");
        });
    }
    $(".nav-toggle").click(function() {
        $(".mobile-navigation").slideToggle("fast");
        $(".site-header").toggleClass("toggled");
    });
    setupMobileMenu();
    $(window).resize(function() {
        $(".site-header").removeClass("toggled");
        $(".mobile-navigation").hide();
        $(".mobile-navigation .sub-menu").hide();
    });
    $(window).scroll(function() {
        if ($(document).scrollTop() > 75) {
            $(".site-header").addClass("scrolled");
        } else {
            $(".site-header").removeClass("scrolled");
        }
    });
    $(".main-navigation > ul").superfish({
        speed: "fast",
        autoArrows: false,
        cssArrows: false
    });
});

jQuery(document).ready(function($) {
    $(".back-to-top").click(function() {
        window.scroll({
            top: 0,
            left: 0,
            behavior: "smooth"
        });
    });
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').not(".back-to-top").click(function(event) {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                event.preventDefault();
                $("html, body").animate({
                    scrollTop: target.offset().top - 100
                }, 500, function() {});
            }
        }
    });
});