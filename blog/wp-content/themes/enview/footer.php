	</main>
	<footer class="footer">
		<div class="container">
			<a href="http://www.enview.com/">
				<?php
				    $attachment_id = get_field('brand','option');
				    $size = "brand";
				    $image = wp_get_attachment_image_src( $attachment_id, $size );
				?>
				<img src= "<?php echo $image[0]; ?>" alt="<?php the_field('alt_brand_image','option') ?>" class="responsive-image brand-footer"/>
			</a>

			<small> &copy; <?=date('Y'); ?> <?php the_field('copy','option') ?></small><a href="<?php the_field('link','option') ?>" class="legal"><?php the_field('text_link','option') ?></a>
		</div>
	</footer>
	<a href="#" class="scrollToTop"><i class="fa fa-chevron-up"></i></a>
	<!--JQUERY -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.nice-select.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
	<?php wp_footer(); ?>
</body>
</html>