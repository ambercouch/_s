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
    SUB CONTENT...
  </div>
</section><!-- #subsidiary -->

<footer id="colophon" class="site__footer" role="contentinfo">
  <div class="footer">
    <div class="footer__info">
      <a href="<?php echo esc_url(__('http://wordpress.org/', '_s')); ?>"><?php printf(__('Proudly powered by %s', '_s'), 'WordPress'); ?></a>
      <span class="sep"> | </span>
      <?php printf(__('Theme: %1$s by %2$s.', '_s'), '_s', '<a href="http://automattic.com/" rel="designer">Automattic</a>'); ?>
    </div><!-- .site-info -->
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
