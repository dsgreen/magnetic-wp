<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package magnetic
 */

if ( ! function_exists( 'magnetic_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function magnetic_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'DATE_W3C' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'DATE_W3C' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'magnetic' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'magnetic_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function magnetic_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'magnetic' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'magnetic_comments_link' ) ) :
	/**
	 * Prints HTML with a link to the comments for a post.
	 */
	function magnetic_comments_link() {
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link">';
      comments_popup_link(
        sprintf(
          wp_kses(
          /* translators: %s: post title */
            __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'magnetic' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        )
      );
      echo '</span>';
    }
  }
endif;

if ( ! function_exists( 'magnetic_print_categories' ) ) :
	/**
	 * Prints HTML with a list of categories for the post.
   *
   * @param Boolean $list_label
   * Set $list_label parameter to true to output the text label pre-pended to the list.
	 */
  function magnetic_print_categories($list_label = false) {
	  // Hide category and tag text for pages.
	  if ( 'post' === get_post_type() ) {
		  /* translators: used between list items, there is a space after the comma */
		  $categories_list = get_the_category_list(esc_html__(' ', 'magnetic'));
		  if ($categories_list) {
			  /* translators: 1: list of categories. */
			  printf('<span class="cat-links">' . esc_html__(
			      $list_title = ($list_label ? 'Categories: ' : '') . '%1$s', 'magnetic') . '</span>', $categories_list); // WPCS: XSS OK.
		  }
	  }
  }
endif;
if ( ! function_exists( 'magnetic_print_tags' ) ) :
	/**
	 * Prints HTML with a list of tags for the post.
   *
	 * @param Boolean $list_label
	 * Set $list_label parameter to true to output the text label pre-pended to the list.
	 */
	function magnetic_print_tags($list_label = false) {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(' ', 'list item separator', 'magnetic'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__(
						$list_title = ($list_label ? 'Tags: ' : '') . '%1$s', 'magnetic') . '</span>', $tags_list); // WPCS: XSS OK.
			}
		}
  }
endif;

if ( ! function_exists( 'magnetic_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories and tags, and post edit link.
	 */
	function magnetic_entry_footer() {
    magnetic_print_categories(true);
    magnetic_print_tags(true);

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'magnetic' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'magnetic_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function magnetic_post_thumbnail($img_size = 'post-thumbnail') {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail($img_size); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( $img_size, array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
		?>
	</a>

	<?php endif; // End is_singular().
}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Shim for sites older than 5.2.
     *
     * @link https://core.trac.wordpress.org/ticket/12563
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
endif;

/**
 * Displays post pagination links
 *
 * Source code borrowed from Atomic by Array Themes: https://arraythemes.com/
 * See reference: https://codex.wordpress.org/Function_Reference/paginate_links
 *
 */
if ( ! function_exists( 'numeric_posts_navigation' ) ) :
	function numeric_posts_navigation() {

		global $wp_query;

		// Return early if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
    <div class="navigation">
			<?php
			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var('paged') ),
				'total'     => $wp_query->max_num_pages,
				'next_text' => esc_html__( 'Next', 'magnetic' ),
				'prev_text' => esc_html__( 'Prev', 'magnetic' )
			) );
			?>
    </div>
		<?php
	}
endif;