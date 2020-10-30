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
        $(".mobile-nav-close").click(function(e) {
            e.preventDefault();
            $(".mobile-navigation").hide();
            $(".mobile-navigation .sub-menu").hide();
            $(".site-header").toggleClass("toggled");
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