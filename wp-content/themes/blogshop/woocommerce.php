<?php get_header(); ?>
<section class="shop-page-main-block section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php dynamic_sidebar('woocommerce-sidebar'); ?>
			</div>
			<div class="col-md-8">
				<?php woocommerce_content(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
