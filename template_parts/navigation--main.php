<?php

$args = array(
    'theme_location' => 'primary',
    'menu' => '',
    'container' => 'div',
    'container_class' => '',
    'container_id' => '',
    'menu_class' => 'menu--main',
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

<?php  if(!has_nav_menu('primary')) {return;} ?>

<nav id="main-navigation" class="site__navigation" role="navigation">
    <div class="navigation--main">
        <button class="navigation--main__toggle" aria-controls="navigation--main__menu" aria-expanded="false"></button>
        <?php wp_nav_menu($args); ?>
    </div>
</nav><!-- #site-navigation -->
