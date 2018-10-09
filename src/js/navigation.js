/*
 Main Navigation
 */

jQuery(document).ready(function($) {

  // hidden class added for better loading at mobile (expanded menu is not shown as it loads)
  $('.main-navigation').removeClass('hidden');

  // 1st page load
  if (window.innerWidth < 768) {
    $('.main-navigation').hide();
  }

  // toggle button
  $('.nav-toggle').click(function(){
    $('.main-navigation').slideToggle('fast');
    $('.site-header').toggleClass('toggled');
  });

  // browser resize, collapse mobile menu
  $(window).resize(function() {
    $('.site-header').removeClass('toggled');
    if (window.innerWidth > 767) {
      $('.main-navigation').show();
    }
    else if (window.innerWidth < 768) {
      $('.main-navigation').hide();
    }
  });

  // add class when scrolling, for pages with transparent header
  $(window).scroll(function() {
    if ($(document).scrollTop() > 75) {
      $('.site-header').addClass('scrolled');
    }
    else {
      $('.site-header').removeClass('scrolled');
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
