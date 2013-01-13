<?php

add_action( 'init', 'post_types_adding' );

function post_types_adding() {

        /*************************************************************/
        /************PORTFOLIO POST TYPE***************************/
        /*************************************************************/

  $labels = array(
    'name' => __('Portfolio', 'inkland'),
    'singular_name' => __('Portfolio', 'inkland'),
    'add_new' => __('Add New', 'inkland'),
    'add_new_item' => __('Add New Portfolio', 'inkland'),
    'edit_item' => __('Edit Portfolio', 'inkland'),
    'new_item' => __('New Portfolio', 'inkland'),
    'all_items' => __('All Portfolios', 'inkland'),
    'view_item' => __('View this Portfolio', 'inkland'),
    'search_items' => __('Search Portfolios', 'inkland'),
    'not_found' =>  __('No Portfolios', 'inkland'),
    'not_found_in_trash' => __('No Portfolios in Trash', 'inkland'),
    'parent_item_colon' => '',
    'menu_name' => __('Portfolio', 'inkland'),

  );
  $args = array(
    'exclude_from_search' => false,
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'portfolios'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 100,
    'menu_icon' => get_template_directory_uri().'/style/img/portfolio.png',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt' ),
    'taxonomies' => array('category', 'post_tag'),
);
  register_post_type('pt_portfolio',$args);

  flush_rewrite_rules();

} ?>