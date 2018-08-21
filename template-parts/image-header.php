<style>
	.hero--sub {
		background-image: url('<?php
    if ( has_post_thumbnail() ) {
      the_post_thumbnail_url('full');
    } ?>');
	}
</style>
<section class="hero hero--sub" id="hero">
	<div class="container">
		<?php the_title( '<h1>', '</h1>' ); ?>
		<?php if ($lead = get_post_meta(get_the_ID(), 'lead', true)): ?>
			<div class="lead"><h2><?php echo esc_html($lead); ?></h2></div>
		<?php endif; ?>
	</div>
	<div class="color-overlay"></div>
</section>