/*
 Main Navigation
 */

jQuery(document).ready(function($) {

  // hidden class added in HTML for better loading at mobile (expanded menu is not shown as it loads)
  // remove it after page loads
  $('.main-navigation').removeClass('hidden');
  $('.mobile-navigation').removeClass('hidden');

  /**
   * set up the mobile menu
   */
  function setupMobileMenu() {
    // hide the menu initially
    $('.mobile-navigation').hide();
    $('.mobile-navigation .sub-menu').hide();

    // display sub menu on click
    $('.mobile-navigation .menu-item-has-children > a').click(function(e) {
      e.preventDefault();

      // set aria expanded attribute
      $(this).attr('aria-expanded', ($(this).attr('aria-expanded') === 'true') ? 'false' : 'true');

      $(this).next('.sub-menu').slideToggle('fast');
    });
  }

  /**
   * main menu toggle button (mobile)
   */
  $('.nav-toggle').click(function() {
    $('.mobile-navigation').slideToggle('fast');
    // toggled class needed for pages with image header
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
    // toggled class needed for pages with image header on mobile
    $('.site-header').removeClass('toggled');

    // desktop
    // if (window.innerWidth > 991) {}
    // mobile
    if (window.innerWidth < 992) {
      // hide nav if it's open
      $('.mobile-navigation').hide();
      $('.mobile-navigation .sub-menu').hide();
    }
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

  // TODO keyboard focus handling in progress. Using :focus-within pseudo class for now.
  // add .open class to .sub-menu on keyboard focus to keep menu open
  // menu item has a .sub-menu
  // $('.menu-item-has-children > a').focus(function() {
  //   $(this).next().addClass('open');
  // });

  // TODO menu keyboard focus/blur logic needs work
  // remove .open class when tabbing out of the .sub-menu
  // $('.sub-menu > li:last-of-type > a').blur(function() {

    // removing the class works, except in case of last item having a sub menu

    // IN PROGRESS: if last menu item contains another .sub-menu, account for that and don't hide the menu immediately
    // if ($(this).parent().hasClass('menu-item-has-children') ) {
      // console.log('last menu item, .menu-item-has-children');
      // keep the nested .sub-menu open
      // $(this).next().addClass('open');

      // $('.sub-menu li:last-of-type a').blur(function() {
      //   $(this).parent().parent().removeClass('open');
      // });

    // }
    // else {
    //   $(this).parent().parent().removeClass('open');
    // }
  // });

  // need to handle tabbing backwards through menu

});
