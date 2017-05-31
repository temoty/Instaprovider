<?php

// Load WP Advanced Search
require_once('wp-advanced-search/wpas.php');

// Defines
define('FL_CHILD_THEME_DIR', get_stylesheet_directory());
define('FL_CHILD_THEME_URL', get_stylesheet_directory_uri());

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action('fl_head', 'FLChildTheme::stylesheet');


// Functions
function my_search_form()
{
    $args = array();


    $args['wp_query'] = array('post_type' => 'provider',
                            'posts_per_page' => 10);
    $args['fields'][] = array('type' => 'taxonomy',
                            'taxonomy' => 'category',
			    'format' => 'select',
                'default' => 'choose-a-specialty',
			    'pre_html' => '<div class=\'col-md-3 search-form-flex\'><div class=\'form-group\'><span class=\'custom-dropdown custom-dropdown--blue\'>',   	    
                	    'class' => 'custom-dropdown__select custom-dropdown__select--blue',
			    'post_html' => '</span></div></div>');
    $args['fields'][] = array('type' => 'search',
                            'title' => 'Search',
			    'placeholder' => 'Enter City or Zip...',
			    'pre_html' => '<div class=\'col-md-6 search-form-flex\'>',
		    	    'post_html' => '</div>');
    $args['fields'][] = array('type' => 'submit',
                            'class' => 'button',
                            'value' => 'Search',
			    'pre_html' => '<div class=\'col-md-3 search-form-flex\'>',
		    	    'post_html' => '</div>');
    register_wpas_form('my-form', $args);
}

add_action('init', 'my_search_form');


