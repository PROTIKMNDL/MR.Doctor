<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Moral
 */

if ( ! function_exists( 'magic_blog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function magic_blog_posted_on( $echo = true ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = $time_string ;

		if ( is_single() ) {
			$svg = magic_blog_get_svg( array( 'icon' => 'bookmark' ) );
		} else {
			$svg = '';
		}



		if ( $echo ) {
			echo $svg . $posted_on ; // WPCS: XSS OK.
		} else {
			return  $svg . $posted_on ; // WPCS: XSS OK.
		}

	}
endif;

if ( ! function_exists( 'magic_blog_tags' ) ) :
	function magic_blog_tags() {
		if ( 'post' === get_post_type() ) {
			$archive_tag_enable = get_theme_mod( 'magic_blog_enable_archive_tag', true );
			$single_tag_enable = get_theme_mod( 'magic_blog_enable_single_tag', true );
			if ( ( is_single() && $single_tag_enable ) || ( magic_blog_is_page_displays_posts() && $archive_tag_enable ) ) {
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ' ,', 'list item separator', 'magic-blog' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( ' Tags: %1$s', 'magic-blog' ) . '</span>', $tags_list ); // WPCS: XSS OK.
				}
			}
		}
	}
endif;

if ( ! function_exists( 'magic_blog_cats' ) ) :
	function magic_blog_cats() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$archive_cat_enable = get_theme_mod( 'magic_blog_enable_archive_cat', true );
			$single_cat_enable = get_theme_mod( 'magic_blog_enable_single_cat', true );
			if ( ( is_single() && $single_cat_enable ) || ( magic_blog_is_page_displays_posts() && $archive_cat_enable ) ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'magic-blog' ) );
				if ( $categories_list ) {
					$svg = '';
					if ( is_single() ) {
						$svg = magic_blog_get_svg( array( 'icon' => 'cats' ) );
					}
					echo '<span class="cat-links">' . $svg . $categories_list . '</span> '; // WPCS: XSS OK.
				}
			}
		}

	}
endif;

if ( ! function_exists( 'magic_blog_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function magic_blog_entry_footer() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			
			$archive_comment_enable = get_theme_mod( 'magic_blog_enable_archive_comment', true );
			if ( magic_blog_is_page_displays_posts() && $archive_comment_enable ) {

				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( ' Leave a Comment<span class="screen-reader-text"> on %s</span>', 'magic-blog' ),
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

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( ' Edit <span class="screen-reader-text">%s</span>', 'magic-blog' ),
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

if ( ! function_exists( 'magic_blog_post_author' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function magic_blog_post_author() {
	$svg = '';
	$by = '';
	if ( is_singular() ) {
		$svg = magic_blog_get_svg( array( 'icon' => 'author' ) );
	} else {
		$by = esc_html__( 'By : ', 'magic-blog' );
	}
	
	$author_html = '<span class="byline">' . $by . '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . $svg . esc_html(         get_the_author() ) . '</a></span></span>';
	echo $author_html;

}
endif;
