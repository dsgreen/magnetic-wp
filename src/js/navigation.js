/*
 Main Navigation
 */

jQuery(document).ready(function($) {

  // .hidden class is added in HTML for better loading at mobile, so that expanded menus are not shown during page load
  // remove .hidden class on menus after everything loads and page is ready
  $('.main-navigation').removeClass('hidden');
  $('.mobile-navigation').removeClass('hidden');

  /**
   * set up the mobile menu
   */
  function setupMobileMenu() {
    // hide the menu initially
    $('.mobile-navigation').hide();
    $('.mobile-navigation .sub-menu').hide();
    $('.mobile-navigation .children').hide();

    // display sub menu on click
    $('.mobile-navigation .menu-item-has-children > a').click(function(e) {
      e.preventDefault();

      // set aria expanded attribute
      $(this).attr('aria-expanded', ($(this).attr('aria-expanded') === 'true') ? 'false' : 'true');

      $(this).next('.sub-menu').slideToggle('fast');
    });

    // default page menu
    $('.mobile-navigation .page_item_has_children > a').click(function(e) {
      e.preventDefault();

      // set aria expanded attribute
      $(this).attr('aria-expanded', ($(this).attr('aria-expanded') === 'true') ? 'false' : 'true');

      $(this).next('.children').slideToggle('fast');
    });

    // mobile nav close button
    $('.mobile-nav-close').click(function(e) {
      e.preventDefault();

      // hide open menus
      $('.mobile-navigation').hide();
      $('.mobile-navigation .sub-menu').hide();
      $('.mobile-navigation .children').hide();

      // .toggled class is needed for pages with an image header for mobile menu styling
      $('.site-header').toggleClass('toggled');
    });
  }

  /**
   * main menu toggle button (mobile)
   */
  $('.nav-toggle').click(function() {
    $('.mobile-navigation').slideToggle('fast');
    // .toggled class is needed for pages with an image header for mobile menu styling
    $('.site-header').toggleClass('toggled');
  });

  /**
   * 1st page load
   */
  setupMobileMenu();

  /**
   * browser resize, collapse mobile menu
   */
  $(window).resize(function() {
    // .toggled class is needed for pages with an image header for mobile menu styling
    $('.site-header').removeClass('toggled');

    // desktop
    // if (window.innerWidth > 991) {}
    // mobile
    // if (window.innerWidth < 992) {}

    // hide the mobile nav if it's open
    $('.mobile-navigation').hide();
    $('.mobile-navigation .sub-menu').hide();
    $('.mobile-navigation .children').hide();
  });

  // add class when scrolling, for pages with transparent header
  $(window).scroll(function() {
    if ($(document).scrollTop() > 75) {
      $('.site-header').addClass('scrolled');
      // logo swap
      // $('.custom-logo').attr('src','/PATH/YOUR_SCROLLED_LOGO');
    }
    else {
      $('.site-header').removeClass('scrolled');
      // logo swap
      // $('.custom-logo').attr('src','/PATH/YOUR_REGULAR_LOGO');
    }
  });

  // menu keyboard accessibility and touch controls handled with superfish library
  // also using :focus-within pseudo class in CSS
  $('.main-navigation > ul').superfish({
    speed: 'fast',
    autoArrows: false,
    cssArrows: false
  });
});
