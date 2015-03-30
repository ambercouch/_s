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

<div class="subsidiary__widget-area">
  <div class="widget-area--sidebar--subsidiary">
    <?php dynamic_sidebar('sidebar--subsidiary'); ?>
  </div>
</div>
