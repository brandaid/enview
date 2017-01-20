<?php get_header(); ?>
<?php the_post(); ?>
		
		<?php
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id,'featured', true);
		?>
		<article class="post-featured" style="background: url('<?php echo $thumb_url[0]; ?>') center 0 / cover no-repeat;">
			<div class="content-post">
				<small><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></small>
				<h1><?php the_title(); ?></h1>
				<ul class="box-author">
					<li><?php echo get_avatar( get_the_author_meta( 'ID' ) , 250 ); ?><span>by <b><?php the_author(); ?></b></span></li>
				</ul>
			</div>
		</article>

		<section class="box-breadcrumbs">
			<div class="container">
				<a href="<?php bloginfo('url'); ?>" class="breadcrumb">Back To Articles</a>
			</div>
		</section>

		<div class="container">
			<div class="table-layout">
				<div class="col-left-layout">
					<article class="article">
						<div class="container">
							<?php the_content(); ?>
							<div class="box-back">
								<a href="<?php bloginfo('url'); ?>" class="btn-back">Back to articles</a>
							</div>
						</div>
					</article>
				</div>
				<div class="col-right-layout">
					<div class="container">
						<?php get_sidebar('forms'); ?>
					</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>