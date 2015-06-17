<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _s
 */
if (!is_active_sidebar('aside-footer')) {
    return;
}
?>
<div id="footer-info" class="footer--master__widget-area sidebar" role="complementary">
  <div class="widget-area" >
    <div class="footer--master__site-info" >
      <div class="site-info">
          <?php dynamic_sidebar('aside-footer'); ?>
      </div><!-- .site-info -->
    </div>
  </div>
</div><!-- #secondary -->

