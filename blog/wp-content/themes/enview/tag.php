<?php get_header(); ?>

		<section class="box-forms">
			<div class="container">

				<?php get_sidebar('forms'); ?>

			</div>
		</section>
		<section>
	    	<div class="container">
	           <div class="box-details">
	               <h3>Results for tag: <b><?php single_tag_title(); ?></b></h3>
	           </div>
            </div>
		</section>
        <?php if ( have_posts() ) : ?>       
        <?php while ( have_posts() ) : the_post(); ?>

		<article class="table-post">
			<div class="container">
				<div class="col-post-info">
					<small class="info-category"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></small>
					<h2 class="info-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php
						if(get_the_tag_list()) {
						    echo get_the_tag_list('<ul class="info-tags"><li>','</li><li>','</li></ul>');
						}
					?>
					<p><?php echo get_excerpt(280); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn-read-more">Read More</a>
					<div class="widget-social">
						<?php echo do_shortcode('[ssba url="'.get_permalink().'"]'); ?>
					</div>
				</div>
				<div class="col-post-image">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'class' => 'responsive-image' ) ); ?></a>
				</div>
			</div>
		</article>


       <?php endwhile; ?>
	    <?php else : ?>
	    	<div class="container">
	           <div class="box-no-results">
	               No results found...
	           </div>
           </div>
       <?php endif; ?>
		
		<section>
			<div class="container">
				<!-- start PAGINATION -->
				<?php wpbeginner_numeric_posts_nav(); ?>
				<!-- end PAGINATION -->
			</div>
		</section>

<?php get_footer(); ?>