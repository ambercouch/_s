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
    <div class="main">

      <?php if (have_posts()) : ?>

        <header class="main__header--archive">
          <?php
          the_archive_title('<h1 class="main__header--archive__title">', '</h1>');
          the_archive_description('<div class="main__header--archive__tax-description">', '</div>');
          ?>
        </header><!-- .page-header -->

        <?php /* Start the Loop */ ?>
        <?php while (have_posts()) : the_post(); ?>

          <?php
          /* Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part('template_parts/content', get_post_format());
          ?>

        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

      <?php else : ?>

        <?php get_template_part('content', 'none'); ?>

      <?php endif; ?>
    </div>
    <!-- .main -->
  </main>
  <!-- .primary -->

  <?php get_sidebar(); ?>
</div><!-- .content -->
<?php get_footer(); ?>
