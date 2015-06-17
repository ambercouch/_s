<?php
/**
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post--audio'); ?>>
  <header class="post--audio__header">
    <?php the_title(sprintf('<h1 class="post--audio__title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>

    <?php if ('post' == get_post_type()) : ?>
      <div class="post--audio__meta">
        <?php _s_posted_on(); ?>
      </div><!-- .post__meta -->
    <?php endif; ?>
  </header><!-- .post__header -->

  <div class="post--audio__content">
    <?php
    /* translators: %s: Name of current post */
    the_content(sprintf(
                    __('Continue reading %s <span class="meta-nav">&rarr;</span>', '_s'), the_title('<span class="screen-reader-text">"', '"</span>', false)
    ));
    ?>
    <?php if (get_field('review') != '') : ?>
      <div class="post--audio__review">
        <div class="review">
          <?php echo the_field('review'); ?>
        </div>
      </div>
    <?php endif ?>
    <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . __('Pages:', '_s'),
        'after' => '</div>',
    ));
    ?>
  </div><!-- .post__content -->

  <footer class="post--audio__footer">
    <?php _s_entry_footer(); ?>
  </footer><!-- .post--audio__footer -->
</article><!-- #post-## -->