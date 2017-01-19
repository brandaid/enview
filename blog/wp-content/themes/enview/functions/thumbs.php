<?php 

add_theme_support('post-thumbnails');

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'brand', 600, 600, false );
    add_image_size( 'featured', 1500, 500, true );
    add_image_size( 'inner-post', 730, 300, true );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
		'brand' => __('Brand Logo'),
	    'featured' => __('Featured'),
	    'inner-post' => __('Inner Post'),
	) );
}


// img unautop
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<div class="figure">$1</div>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );

?>