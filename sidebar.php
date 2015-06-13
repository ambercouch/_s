<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _s
 */
if (!is_active_sidebar('aside-primary')) {
  return;
}
?>

<div id="secondary" class="content__widget-area" role="complementary">
  <div class="widget-area--sidebar">
    <?php dynamic_sidebar('aside-primary'); ?>
  </div>
</div><!-- #secondary -->
