<?php
/**
 * The template for displaying search results pages.
 *
 * @package _s
 */
get_header();
?>
<div class="content">
  <main id="primary"  class="content__main" role="main">
    <div class="main">
      <?php if (have_posts()) : ?>

        <header class="main__header--search">
          <h1 class="main__header--search__title"><?php printf(__('Search Results for: %s', '_s'), '<span>' . get_search_query() . '</span>'); ?></h1>
        </header><!-- .main__header--search -->

        <?php /* Start the Loop */ ?>
        <?php while (have_posts()) : the_post(); ?>

          <?php
          /**
           * Run the loop for the search to output the results.
           * If you want to overload this in a child theme then include a file
           * called content-search.php and that will be used instead.
           */
          get_template_part('template_parts/content', 'search');
          ?>

        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

      <?php else : ?>

        <?php get_template_part('content', 'none'); ?>

      <?php endif; ?>
    </div><!-- .main -->
  </main><!-- #primary -->


  <?php get_sidebar(); ?>
</div><!-- .content -->
<?php get_footer(); ?>
