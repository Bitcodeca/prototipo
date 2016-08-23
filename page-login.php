<?php get_header(); 
	if ( is_user_logged_in() ) {
		header("Location: http://prototipo.bitcodeweb.com/escritorio/");
		exit(); 
	} else {  ?>
		<div class="container">
			<div class="card-panel  hoverable">
				<?php echo do_shortcode( '[ultimatemember form_id=5]' ); ?>
			</div>
		</div>
	<?php }
get_footer(); ?>