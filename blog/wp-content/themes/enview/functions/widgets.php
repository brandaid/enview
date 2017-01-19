<?php

$args = array(
    'name'           => 'Sidebar Forms',
    'description'    => 'This sidebar is for forms',
    'id'             => 'sidebar-forms',
    'before_widget'  => '',
);

register_sidebar ($args);

$args = array(
    'name'           => 'Sidebar Social Sharing',
    'description'    => 'This sidebar is placed on every page for the social sharing options',
    'id'             => 'sidebar-sharing',
    'before_widget'  => '',
);

register_sidebar ($args);

?>