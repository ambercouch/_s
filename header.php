<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> <?php _s_body_data(); ?>>
    <div id="page" class="hfeed site">
      <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', '_s'); ?></a>

      <header id="masthead" class="site__master-header" role="banner">
        <div class="master-header">
          <div class="master-header__branding">
            <div class="branding">
              <h1 class="branding__title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
              <h2 class="branding__description"><?php bloginfo('description'); ?></h2>
            </div><!-- .branding -->
          </div><!-- .master-header__branding -->
            <?php get_template_part('template_parts/navigation--head'); ?>
        </div><!-- .master-header -->
      </header><!-- .site__master-header -->
        <?php get_template_part('template_parts/navigation--main'); ?>

      <div id="content" class="site__content">
