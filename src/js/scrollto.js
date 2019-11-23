jQuery(document).ready(function($) {

  /*
   * back to top button
   */
  $('.back-to-top').click(function () {
    window.scroll({
      top: 0,
      left: 0,
      behavior: 'smooth'
    });
  });

  /*
   * in-page scrolling, anchor links
   * https://css-tricks.com/snippets/jquery/smooth-scrolling/
   */
  // Select all links with hashes
  $('a[href*="#"]')
      // Remove links that don't actually link to anything
      // exclude back to top link, site footer
      .not('[href="#"]')
      .not('[href="#0"]')
      .not('.back-to-top')
      .click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();

            // offset by 100px for fixed header component
            $('html, body').animate({
              scrollTop: ( target.offset().top - 100 )
            }, 500, function() {
              // Callback after animation
              // Add this for full accessibility
              // Must change focus!
              /*
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) { // Checking if the target was focused
                return false;
              } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              };
              */
            });
          }
        }
      });
});
