<?php
require_once('WP_Bootstrap_Navwalker.php');
function add_my_styles()
{
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/fontawesome.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css');
}


function add_my_scripts()
{
    wp_deregister_script('jquery');
    wp_register_script( 'jquery', includes_url('/js/jquery/jquery.js'), array(), false, true );
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);
    // wp_enqueue_script('fontawesome-js', get_template_directory_uri() . '/js/fontawesome.min.js', array(), false, true);
    wp_enqueue_script('fontawesome-all-js', get_template_directory_uri() . '/js/all.min.js', array(), false, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), false, true);
}

// Add Post Thumbnails to the theme

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );


function add_custom_menu()
{
    register_nav_menus( array(
        'Main_menu' => 'Navigation Bar',
        'Footer_menu' => 'Footer Menu',
        )
    );
}

function fire_menu()
{
    wp_nav_menu(array(
        'theme_location'    => 'Main_menu',
        'menu_class'        => 'navbar-nav mr-auto',
        'container'         => false,
        'depth'             => 5,
        'walker'            => new WP_Bootstrap_Navwalker(),
    ));
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function custom_excerpt_length($length) {
    if ( is_author() ) {
        return 10;
    }else{
        return 40;
    }


}


function custom_excerpt_more($more) {
	return ' ...';
}

// Numbering paginate
function custom_numbering_paginate()
{
  global $wp_query;
  $all_pages = $wp_query->max_num_pages;
  $current_page = max( 1, get_query_var( 'paged' ) );

    if ($all_pages > 1) {
      return paginate_links( array(
              'base' => get_pagenum_link() . '%_%',
              'format' => 'page/%#%',
              'current' => $current_page,
              'prev_text' => '«',
              'next_text' => '»',
              'before_page_number' => '<span class="btn btn-info">',
              'after_page_number' => '</span>',
       ));
    }
}


// Register Main Sidebar

function reg_main_sidebar()
{
  register_sidebar( $args = array(
      'name'    => 'Main Sidebar',
      'id'    => 'main-sidebar',
      'description'    => 'main sidebar',
      'class'    => 'main-sidebar',
      'before_widget'    => '<div class="main-sidebar-content">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="sidebar-title">',
      'after_title'    => '</h3>',

  ) );
}



add_filter( 'excerpt_more', 'custom_excerpt_more' );
add_filter( 'excerpt_length', 'custom_excerpt_length');
add_filter('wp_enqueue_scripts', 'add_my_styles');
add_filter('wp_enqueue_scripts', 'add_my_scripts');
add_filter('init', 'add_custom_menu');
add_action( 'widgets_init', 'reg_main_sidebar' );


// apply_filters( 'excerpt_length', 10 );
