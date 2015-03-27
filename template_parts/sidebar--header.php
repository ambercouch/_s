<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _s
 */
if (!is_active_sidebar('sidebar--header')) {
return;
}
?>

<div class="master-header__widget-area">
  <div class="widget-area--sidebar--header">
    <?php dynamic_sidebar('sidebar--header'); ?>
  </div>
</div>
