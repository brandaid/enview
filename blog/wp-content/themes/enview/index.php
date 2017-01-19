<?php 
/** 
 * @package WordPress 
 * @subpackage ENVIEW BLOG
  
 Template Name: Template Home
  
 */ 
?>
<?php get_header(); ?>

		<!-- FEATURED POST -->
		<?php $loop = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC', 'posts_per_page' => 1,'post__in'  => get_option( 'sticky_posts' ),'ignore_sticky_posts' => 1 ) ); ?>
  		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>	
		
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
		

		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') :  1;

		$args = array(
		   'paged' => $paged,
		   'post_type' => 'post',
		   'post__not_in' => get_option( 'sticky_posts')
		); ?>

       	<?php
       	$the_query = new WP_Query($args);
       	if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
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
					<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'responsive-image' ) ); ?>
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
           <div class="box-no-results">
               No results found...
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