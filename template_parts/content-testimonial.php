<?php
/**
 * @package _s
 */
?>

<div id="testimonial-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="testimonial__wrapper">
    <?php if(has_post_thumbnail()) : ?>
  <header class="testimonial__header">

      <?php the_post_thumbnail(); ?>


  </header><!-- .post__header -->
    <?php endif; ?>

  <div class="testimonial__content">
    <?php
    /* translators: %s: Name of current post */
    the_content();
    ?>
  </div><!-- .post__content -->
        </div>

</div><!-- #post-## -->