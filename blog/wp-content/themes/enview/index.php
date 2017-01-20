<?php get_header(); ?>

		<!-- FEATURED POST -->
		<?php $loop = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC', 'posts_per_page' => 1 ) ); ?>
  		<?php while ( $loop->have_posts() ) : $loop->the_post(); 

  		$do_not_duplicate = $post->ID; //This is the magic line

  		?>	
		
		<?php
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id,'featured', true);
		?>
		<article class="post-featured" style="background: url('<?php echo $thumb_url[0]; ?>') center 0 / cover no-repeat;">
			<div class="content-post">
				<small><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></small>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<ul class="box-author">
					<li><?php echo get_avatar( get_the_author_meta( 'ID' ) , 250 ); ?><span>by <b><?php the_author(); ?></b></span></li>
					<li><a href="<?php the_permalink(); ?>" class="btn-author">READ MORE</a></li>
				</ul>
			</div>
		</article>

		<?php endwhile; wp_reset_query(); ?>


		<section class="box-forms">
			<div class="container">

				<?php get_sidebar('forms'); ?>

			</div>
		</section>

		<?php if ( have_posts() ) : ?>       
        <?php while ( have_posts() ) : the_post(); 

        if( $post->ID == $do_not_duplicate ) continue; 

        ?>

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

		<?php $counter++;
		
		if ($counter == 2) { ?>
  			<section class="box-banner">
				<small><?php the_field('prev','option') ?></small>
				<h3><?php the_field('title','option') ?></h3>
				<a href="<?php the_field('link_cta','option') ?>" class="btn-call-to-action"><?php the_field('text_cta','option') ?></a>
			</section>

		<?php } ?>


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