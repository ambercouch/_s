<?php
/**
 * @package _s
 */
?>

<div id="testimonial-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="testimonial__wrapper" href="#modal-<?php echo $post->ID; ?>">
    <?php if(has_post_thumbnail()) : ?>
  <header class="testimonial__header">
      <?php the_post_thumbnail(); ?>
  </header><!-- .post__header -->
    <?php endif; ?>

 <!-- .post__content -->
        </a>

</div><!-- #post-## -->
<div class="remodal testimonial__remodal" data-remodal-id="modal-<?php echo $post->ID; ?>">
  <header class="testimonial__header--remodal">
    <?php the_post_thumbnail(); ?>
  </header><!-- .post__header -->
  <div class="testimonial__content--remodal">
    <?php
    /* translators: %s: Name of current post */
    the_content();
    ?>
  </div>
</div>