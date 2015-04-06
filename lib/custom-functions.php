<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 06/04/2015
 * Time: 11:35
 */

/**
 * Custom Loops
 */
function ac_custom_loop($postType, $showPosts, $name = NULL, $order = 'menu_order', $tax = NULL, $cat = NULL, $exc = true) {

    $args = array(
        'post_type' => $postType,
        'name' => $name,
        'showposts' => $showPosts,
    );
    wp_reset_query();
    global $wp_query;
    $temp_q = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query( $args);

//    $wp_query->query(array(
//            'post_type' => 'offers',
//            'post_name' => 'latest-spring-offers',
//            //'showposts' => 1,
//            'orderby' => 'menu_order',
//            'order' => 'DESC')
//    );
//    echo '<pre>';
//    var_dump($wp_query);
//    die();

    if (have_posts()) : while (have_posts()): the_post(); ?>


        <?php get_template_part('template_parts/content', $postType) ?>

    <?php

    endwhile;
    else :
        echo '<!-- No '.$postType.' found -->';
    endif;

    $wp_query = $temp_q;
    wp_reset_query();
}