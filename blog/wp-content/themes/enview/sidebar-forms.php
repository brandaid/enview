<div id="form-search" class="box-search">
	<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
		<input type="text" placeholder="Search" class="input-search" value="<?php the_search_query(); ?>" name="s" id="s">
		<button id="searchsubmit" class="fa fa-search"></button>
	</form>
</div>

<?php if ( is_active_sidebar( 'sidebar-forms' ) ) { ?>
	<?php dynamic_sidebar( 'sidebar-forms' ); ?>
<?php } ?>
