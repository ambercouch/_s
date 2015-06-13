<?php

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function _s_widgets_init() {
    foreach( unserialize(SIDEBARS) as $sidebar ) {
        register_sidebar(array(
            'name' => __($sidebar , '_s'),
            'id' => 'aside-'.strtolower($sidebar),
            'description' => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
      }

}

add_action('widgets_init', '_s_widgets_init');

