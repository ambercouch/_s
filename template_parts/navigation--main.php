<?php

$args = array(
    'theme_location' => 'primary',
    'menu' => '',
    'container' => 'div',
    'container_class' => '',
    'container_id' => '',
    'menu_class' => 'navigation--main__menu',
    'menu_id' => 'main-menu',
    'echo' => true,
    'fallback_cb' => 'wp_page_menu',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth' => 0,
    'walker' => ''
);
?>
<?php wp_nav_menu($args); ?>
