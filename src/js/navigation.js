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

  // mobile
  // if (window.innerWidth < 768) {}

  /**
   * browser resize, collapse mobile menu
   */
  /*
  $(window).resize(function() {
    // toggled class needed for pages with image header on mobile
    $('.site-header').removeClass('toggled');

    // desktop
    if (window.innerWidth > 767) {
      // $('.main-navigation').show();
      // undo the slideToggle stuff, mobile menu
      // $('.sub-menu').attr('style', '');
    }
    // mobile
    else if (window.innerWidth < 768) {
      // hide nav if it's open
      $('.mobile-navigation').hide();
      $('.mobile-navigation .sub-menu').hide();
    }
  });
  */

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

  /*
  menu keyboard focus needs work
  // add sub-menu focus class
  $('.menu-item-has-children > a').focus(function() {
    // console.log('.menu-item-has-children > a focus');
    $(this).next().addClass('open');
  });

  // target last menu item
  $('.sub-menu > li:last-of-type > a').blur(function() {
    // console.log($(this).parent().hasClass('menu-item-has-children'));

    // if last item does not have a sub menu, remove open menu class
    if ( ! $(this).parent().hasClass('menu-item-has-children') ) {
      console.log('last');
      $(this).parent().parent().removeClass('open');
    }
  });
  */

});
