<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- 	<title><?php wp_title(); ?> | <?php bloginfo('title' ); ?></title> -->

	<meta name="revisit-after" content="30 days">
	<meta name="robots" content="index,follow">
	<meta name="distribution" content="global">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="<?php bloginfo('template_directory'); ?>/js/respond.min.js"></script>
	  <script src="<?php bloginfo('template_directory'); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="header">
		<div class="col-brand">
			<a href="<?php bloginfo('url'); ?>">
				<?php
				    $attachment_id = get_field('brand','option');
				    $size = "brand";
				    $image = wp_get_attachment_image_src( $attachment_id, $size );
				?>
				<img src= "<?php echo $image[0]; ?>" alt="<?php the_field('alt_brand_image','option') ?>"/>
			</a>
		</div>
		<div class="col-nav">
			<div class="box-title-category">
				<span>POWERLINE</span>
				<button id="toggle" class="fa fa-bars"></button>
			</div>
			<a href="<?php the_field('cta_link','option') ?>" class="btn"><?php the_field('cta_text','option') ?></a>
			<nav id="navbar" class="navbar">
				<?php wp_nav_menu(
				    array(
				        'theme_location' => 'main-menu',
				        'container' => '',
				        'menu_class' => '',
				        'menu_id' => false
				    )
				); ?>
				<a href="<?php the_field('cta_link','option') ?>" class="btn"><?php the_field('cta_text','option') ?></a>
			</nav>
		</div>
	</header>
	<main>