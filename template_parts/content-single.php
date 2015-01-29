<?php
/**
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post--single'); ?>>
  <header class="post--single__header">
    <?php the_title('<h1 class="post--single__title">', '</h1>'); ?>

    <div class="post--single__meta">
      <?php _s_posted_on(); ?>
    </div><!-- .entry-meta -->
  </header><!-- .entry-header -->

  <div class="post--single__content">
    <?php the_content(); ?>
    <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . __('Pages:', '_s'),
        'after' => '</div>',
    ));
    ?>
  </div><!-- .entry-content -->

  <footer class="post--single__footer">
    <?php _s_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->
