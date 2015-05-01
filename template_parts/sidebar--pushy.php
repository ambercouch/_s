<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _s
 */
if (!is_active_sidebar('sidebar--subsidiary')) {
  return;
}
?>

<div class="pushy__widget-area">
  <div class="widget-area--sidebar--pushy">
    <?php dynamic_sidebar('sidebar-pushy'); ?>
  </div>
</div>
