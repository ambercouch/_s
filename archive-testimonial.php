<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */
get_header();
?>
<div class="content">
  <main id="primary" class="content__main" role="main">
    <div class="archive--testimonial">
      <?php if (have_posts()) : ?>

        <header class="archive--testimonial__header">

          <h1 class="archive--testimonial__title"> <?php post_type_archive_title(); ?></h1>

        </header><!-- .page-header -->
        <div class="archive--testimonial__testimonials">
        <?php /* Start the Loop */ ?>
        <?php while (have_posts()) : the_post(); ?>

          <?php
          /* Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part('template_parts/content-testimonial');
          ?>

        <?php endwhile; ?>

        </div>
        <?php
        $args =  array(
          'prev_text'          => 'Older Testimonials',
          'next_text'          => __( 'Newer Testimonials' ),
          'screen_reader_text' => __( 'Testimonials navigation' ),
        );
        ?>
        <?php the_posts_navigation($args); ?>



      <?php endif; ?>
    </div><!-- .main -->
  </main><!-- .primary -->

  <?php get_sidebar(); ?>
</div><!-- .content -->
<?php get_footer(); ?>
