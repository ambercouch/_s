<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page--links'); ?>>
  <header class="page__header">
    <?php the_title('<h1 class="page__title">', '</h1>'); ?>
  </header>
  <!-- .entry-header -->

  <div class="page__content">
    <?php the_content(); ?>

    <?php $links = get_field('links'); ?>
    <?php if (have_rows('links')): ?>
      <div class="links">
        <ul class="links__list">
          <?php while (have_rows('links')) : the_row(); ?>
            <li class="links__item">
              <div class="links__item__link">
                <div class="links__item__link__head">
                  <h3 class="links__item__link__title"><?php the_sub_field('link_title'); ?></h3>
                  <a class="links__item__link__a"
                     href="http://<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_url'); ?></a>
                </div>
                <div class="links__item__link__content">
                  <?php if (get_sub_field('link_notes') != '') : ?>
                    <?php echo wpautop(get_sub_field('link_notes')); ?>
                  <?php endif; ?>
                  <a class="links__item__link__btn" href="http://<?php the_sub_field('link_url'); ?>">Visit the site</a>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php
    wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', '_s'), 'after' => '</div>',));
    ?>
  </div>
  <!-- .entry-content -->

  <footer class="page__footer">
    <?php edit_post_link(__('Edit', '_s'), '<span class="edit-link">', '</span>'); ?>
  </footer>
  <!-- .entry-footer -->
</article><!-- #post-## -->
