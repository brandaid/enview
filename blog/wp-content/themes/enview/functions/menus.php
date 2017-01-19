<?php 

// Menu
function register_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' )
        )
    );
}
add_action( 'init', 'register_menus' );

?>