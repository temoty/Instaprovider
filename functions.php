<?php

function theme_styles() {
    
    //wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.0.3', 'all' );
    
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'fontawesome_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',  array(), '4.7.0' );
    
        
    //wp_enqueue_style( 'bootstrap-css', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css', array(), '3.0.3', 'all' );
    
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );







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


//Change Title Tags depending on Search Results
add_filter( 'wpseo_title', 'instaprovider_search_category_title', 10, 1 );
function instaprovider_search_category_title( $title ) {

    $tax_category_exists = array_key_exists('tax_category', $_GET);
    $tax_category_name = $tax_category_exists ? $_GET['tax_category'] : '';

    if ( $tax_category_name !== '' ) {
        $title = ucwords( $tax_category_name ) . ' Providers - ' . get_bloginfo( 'name' );
    }

    return $title;

}

// Change Description Meta depending on Search Results
add_filter( 'wpseo_metadesc', 'instaprovider_search_description_meta_tags', 10, 1 );
function instaprovider_search_description_meta_tags ( $description ) {

    //include specialty name and city in meta description tags
    $tax_category_exists = array_key_exists('tax_category', $_GET);
    $tax_category_name = $tax_category_exists ? $_GET['tax_category'] : '';

    $search_query_exists = array_key_exists('search_query', $_GET);
    $search_query_name = $search_query_exists ? $_GET['search_query'] : '';

    if ( $search_query_name !== '' ) {
        $description = ucwords( $tax_category_name ) . ' providers in ' . $search_query_name ;
    }

    return $description;

}


