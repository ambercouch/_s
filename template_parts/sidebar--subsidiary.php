<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _s
 */
if (!is_active_sidebar('aside--subsidiary')) {
  return;
}
?>

<div class="subsidiary__widget-area">
  <div class="widget-area--sidebar--subsidiary">
    <?php dynamic_sidebar('aside--subsidiary'); ?>
  </div>
</div>
