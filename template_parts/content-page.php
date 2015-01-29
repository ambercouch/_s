<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="page__header">
    <?php the_title('<h1 class="post__title">', '</h1>'); ?>
  </header><!-- .entry-header -->

  <div class="page__content">
    <?php the_content(); ?>
    <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . __('Pages:', '_s'),
        'after' => '</div>',
    ));
    ?>
  </div><!-- .entry-content -->

  <footer class="page__footer">
    <?php edit_post_link(__('Edit', '_s'), '<span class="edit-link">', '</span>'); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->
