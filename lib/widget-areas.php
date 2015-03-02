<?php

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function _s_widgets_init() {
  register_sidebar(array(
      'name' => __('Sidebar', '_s'),
      'id' => 'sidebar-1',
      'description' => '',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget__title">',
      'after_title' => '</h3>',
  ));
}

add_action('widgets_init', '_s_widgets_init');

