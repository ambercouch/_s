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
    <script>
      (function (d) {
        var config = {
          kitId: 'aaq4chq',
          scriptTimeout: 3000
        },
        h = d.documentElement, t = setTimeout(function () {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a;
        h.className += " wf-loading";
        tk.src = '//use.typekit.net/' + config.kitId + '.js';
        tk.async = true;
        tk.onload = tk.onreadystatechange = function () {
          a = this.readyState;
          if (f || a && a != "complete" && a != "loaded")
            return;
          f = true;
          clearTimeout(t);
          try {
            Typekit.load(config)
          } catch (e) {
          }
        };
        s.parentNode.insertBefore(tk, s)
      })(document);
    </script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> <?php _s_body_data(); ?>>
    <div style="display:none;">
      <?php include_once("assets/images/defs.svg"); ?>
    </div>
    <div id="page" class="hfeed site">
      <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', '_s'); ?></a>

      <header id="masthead" class="site__master-header" role="banner">
        <div class="master-header">
          <div class="master-header__branding">
            <div class="branding">
              <h1 class="branding__title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                  <svg role="img" aria-label="<?php echo esc_attr(get_bloginfo('name', 'display')); ?> <?php echo esc_attr(get_bloginfo('description', 'display')); ?>" preserveAspectRatio="none" class="icon branding__title__icon ">
                  <title><?php echo esc_attr(get_bloginfo('name', 'display')); ?></title>
                  <desc><?php echo esc_attr(get_bloginfo('description', 'display')); ?></desc>
                  <use xlink:href="<?php //echo '/content/themes/ac-inuk/assets/images/defs.svg';                     ?>#icon-bumps-logo" />
                  </svg>
                </a>
              </h1>
            </div><!-- .branding -->
          </div><!-- .master-header__branding -->
          <?php get_template_part('template_parts/sidebar--header'); ?>
        </div><!-- .master-header -->
      </header><!-- #masthead -->
        <?php if(is_front_page()) : ?>
      <div class="site__slider">
        <?php get_template_part('template_parts/slider--master'); ?>
      </div><!-- .site--slider -->
        <?php endif; ?>
      <nav id="main-navigation" class="site__navigation" role="navigation">
        <div class="navigation--main">
          <!-- <button class="navigation--main__toggle" aria-controls="navigation--main__menu" aria-expanded="false"><?php _e('Primary Menu', '_s'); ?></button> -->
          <?php get_template_part('template_parts/navigation--main'); ?>
        </div>
      </nav><!-- #site-navigation -->

      <div id="content" class="site__content">
