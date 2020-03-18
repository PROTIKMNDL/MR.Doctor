<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogshop
 */
$getalignment = get_theme_mod( 'article_alignment', 'center' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blogshop-standard-post' ); ?>>
	<div class="blogshop-standard-post__entry-content text-<?php echo esc_attr( $getalignment );?>">

		<div class="blogshop-standard-post__categories">
			<?php blogshop_categories(); ?>
		</div>
		<?php
		get_template_part( 'template-parts/content/post-header/header', 'standard' );
		?>
		
		<div class="blogshop-standard-post__blog-meta align-<?php echo esc_attr( $getalignment );?>">
			<?php
			blogshop_posted_by();
			blogshop_comment_popuplink();
			?>
		</div>
		<div class="blogshop-standard-post__full-summery text-left">
			<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogshop' ),
						'after'  => '</div>',
					)
				); 
			?>
		</div>
		<div class="d-flex justify-content-between blogshop-standard-post__share-wrapper">
			<div class="blogshop-standard-post__tags align-self-center">
				<?php blogshop_post_tag(); ?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
