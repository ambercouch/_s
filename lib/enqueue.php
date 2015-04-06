<?php

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
  wp_enqueue_style('_s-style', get_stylesheet_uri());

  wp_enqueue_script('_s-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true);
  wp_enqueue_script('_s-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true);
    wp_enqueue_script('bdc_script', get_template_directory_uri() . '/assets/js/dist/main.js', array('jquery'), '201501041258', true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', '_s_scripts');
