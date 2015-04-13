<?php

/*
 * CDC CUSTOM POST TYPES
 */

function bds_cpt() {
    //offers
    $labels = array(
        'name' => _x('Offers', 'post type general name'),
        'singular_name' => _x('Offer', 'post type singular name'),
        'add_new' => _x('Add New', 'offer'),
        'add_new_item' => __('Add New Offer'),
        'edit_item' => __('Edit Offer'),
        'new_item' => __('New Offer'),
        'all_items' => __('All Offers'),
        'view_item' => __('View Offer'),
        'search_items' => __('Search Offers'),
        'not_found' => __('No offers found'),
        'not_found_in_trash' => __('No offers found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Offers'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Bump\'s Limmited Special Offers',
        'public' => true,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail',  'revisions'),
        'has_archive' => true,
    );
    register_post_type('offer', $args);
    //offers
    $labels = array(
        'name' => _x('Testimonials', 'post type general name'),
        'singular_name' => _x('Testimonial', 'post type singular name'),
        'add_new' => _x('Add New', 'testimonial'),
        'add_new_item' => __('Add New Testimonial'),
        'edit_item' => __('Edit Testimonial'),
        'new_item' => __('New Testimonial'),
        'all_items' => __('All Testimonials'),
        'view_item' => __('View Testimonial'),
        'search_items' => __('Search Testimonials'),
        'not_found' => __('No testimonials found'),
        'not_found_in_trash' => __('No testimonials found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Testimonials'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Bump\'s client testimonial',
        'public' => true,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
        'has_archive' => true,
    );
    register_post_type('testimonial', $args);
}

add_action('init', 'bds_cpt');
