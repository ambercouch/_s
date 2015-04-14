<?php
/**
 * Template Name: No Title
 *
 * This Header Banner template we just need the wordpress template class
 * everything else is just a page.
 *
 */
get_header();
?>
<div class="content ">
  <main id="primary" class="content__main" role="main">
    <div class="main no-title">
      <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('template_parts/content', 'page'); ?>

        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if (comments_open() || get_comments_number()) :
          comments_template();
        endif;
        ?>

      <?php endwhile; // end of the loop. ?>
    </div><!-- .main -->
  </main><!-- #main -->

  <?php get_sidebar(); ?>

</div><!-- .content -->

<?php get_footer(); ?>


