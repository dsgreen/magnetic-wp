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
        if (window.innerWidth < 992) {
            $(".mobile-navigation").hide();
            $(".mobile-navigation .sub-menu").hide();
        }
    });
    $(window).scroll(function() {
        if ($(document).scrollTop() > 75) {
            $(".site-header").addClass("scrolled");
        } else {
            $(".site-header").removeClass("scrolled");
        }
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
});

if (!Modernizr.svg) {
    $('img[src$=".svg"]').each(function() {
        $(this).attr("src", $(this).attr("src").replace(".svg", ".png"));
    });
}