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


    //TAGS IN SELECT


    function dropdown_tag_cloud( $args = '' ) {
        $defaults = array(
            'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
            'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC',
            'exclude' => '', 'include' => ''
        );
        $args = wp_parse_args( $args, $defaults );

        $tags = get_tags( array_merge($args, array('orderby' => 'count', 'order' => 'DESC')) ); // Always query top tags

        if ( empty($tags) )
            return;

        $return = dropdown_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args
        if ( is_wp_error( $return ) )
            return false;
        else
            echo apply_filters( 'dropdown_tag_cloud', $return, $args );
    }

    function dropdown_generate_tag_cloud( $tags, $args = '' ) {
        global $wp_rewrite;
        $defaults = array(
            'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
            'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC'
        );
        $args = wp_parse_args( $args, $defaults );
        extract($args);

        if ( !$tags )
            return;
        $counts = $tag_links = array();
        foreach ( (array) $tags as $tag ) {
            $counts[$tag->name] = $tag->count;
            $tag_links[$tag->name] = get_tag_link( $tag->term_id );
            if ( is_wp_error( $tag_links[$tag->name] ) )
                return $tag_links[$tag->name];
            $tag_ids[$tag->name] = $tag->term_id;
        }

        $min_count = min($counts);
        $spread = max($counts) - $min_count;
        if ( $spread <= 0 )
            $spread = 1;
        $font_spread = $largest - $smallest;
        if ( $font_spread <= 0 )
            $font_spread = 1;
        $font_step = $font_spread / $spread;

        // SQL cannot save you; this is a second (potentially different) sort on a subset of data.
        if ( 'name' == $orderby )
            uksort($counts, 'strnatcasecmp');
        else
            asort($counts);

        if ( 'DESC' == $order )
            $counts = array_reverse( $counts, true );

        $a = array();

        $rel = ( is_object($wp_rewrite) && $wp_rewrite->using_permalinks() ) ? ' rel="tag"' : '';

        foreach ( $counts as $tag => $count ) {
            $tag_id = $tag_ids[$tag];
            $tag_link = clean_url($tag_links[$tag]);
            $tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));
            $a[] = "t<option value='$tag_link'>$tag ($count)</option>";
        }

        switch ( $format ) :
        case 'array' :
            $return =& $a;
            break;
        case 'list' :
            $return = "<ul class='wp-tag-cloud'>nt<li>";
            $return .= join("</li>nt<li>", $a);
            $return .= "</li>n</ul>n";
            break;
        default :
            $return = join("n", $a);
            break;
        endswitch;

        return apply_filters( 'dropdown_generate_tag_cloud', $return, $tags, $args );
    }

  ?>