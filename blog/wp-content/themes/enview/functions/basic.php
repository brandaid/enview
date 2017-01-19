<?php 

	
	// CUSTOM ADMIN DASHBOARD HEADER LOGO  
  
	function custom_admin_logo() {  
	    echo '<style type="text/css">#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; }</style>';  
	}  
	add_action('admin_head', 'custom_admin_logo'); 
	
	// Admin footer modification  
      
    function remove_footer_admin ()  
    {  
        echo '<span id="footer-thankyou">Developed by <a href="http://www.brandaiddesignco.com/" target="_blank">Brand Aid Design Co.</a></span>';  
    }  
    add_filter('admin_footer_text', 'remove_footer_admin');  


	// REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS  
      
    function example_remove_dashboard_widgets() {   // Globalize the metaboxes array, this holds all the widgets for wp-admin   global $wp_meta_boxes;    
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    }
    add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );

    function custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/custom-login.css" />';
    }
    add_action('login_head', 'custom_login');
    function the_url( $url ) {
        return get_bloginfo( 'siteurl' );
    }
    add_filter( 'login_headerurl', 'the_url' );


    // WordPress Titles
    add_theme_support( 'title-tag' );

    //Hide Bar Admin On Site
    show_admin_bar(false);

  ?>