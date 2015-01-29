<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post--search'); ?>>
  <header class="post--search__header">
    <?php the_title(sprintf('<h1 class="post--search__title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>

    <?php if ('post' == get_post_type()) : ?>
      <div class="post--search__meta">
        <?php _s_posted_on(); ?>
      </div><!-- .post--search__meta -->
    <?php endif; ?>
  </header><!-- .post--search__header -->

  <div class="post--search__summary">
    <?php the_excerpt(); ?>
  </div><!-- .post--search__summary -->

  <footer class="post--search__footer">
    <?php _s_entry_footer(); ?>
  </footer><!-- .post--search__footer -->
</article><!-- #post-## -->
