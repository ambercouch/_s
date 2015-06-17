<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */
?>

</div><!-- #content -->

<section id="subsidiary" class="site__subsidiary">
  <div class="subsidiary">
      <?php get_template_part('template_parts/sidebar--subsidiary'); ?>
  </div>
</section><!-- #subsidiary -->

<footer id="colophon" class="site__footer" role="contentinfo">
  <div class="footer">
        <?php get_template_part('template_parts/footer__widget-area'); ?>
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<!-- WP FOOTER -->
<?php wp_footer(); ?>

</body>
</html>
