<?php
/**
 * @package _s
 */
?>

<section id="post-<?php the_ID(); ?>" <?php post_class('offer-box__offer'); ?>>
  <header class="offer__header">
    <?php the_title(sprintf('<h1 class="post__title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
  </header><!-- .post__header -->

  <div class="offer__content">
    <?php
    /* translators: %s: Name of current post */
    the_content(sprintf(
                    __('Continue reading %s <span class="meta-nav">&rarr;</span>', '_s'), the_title('<span class="screen-reader-text">"', '"</span>', false)
    ));
      ?>


  </div><!-- .post__content -->
</section><!-- #post-## -->