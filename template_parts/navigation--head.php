<?php

$args = array(
    'theme_location' => 'head',
    'menu' => '',
    'container' => 'div',
    'container_class' => '',
    'container_id' => '',
    'menu_class' => 'menu--head',
    'menu_id' => 'head-menu',
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

<?php  if(!has_nav_menu('head')) {return;} ?>

<nav id="head-navigation" class="master-header__navigation" role="navigation">
    <div class="navigation--head">
        <button class="navigation--head__toggle" aria-controls="navigation--head__menu" aria-expanded="false"><?php _e('Head Menu', '_s'); ?></button>
        <?php wp_nav_menu($args); ?>
    </div>
</nav><!-- #site-navigation -->
