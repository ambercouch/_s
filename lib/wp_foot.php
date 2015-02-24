<?php

/*
 * This ones for the foot.
 */

function css_at_bottom() {
  echo '<link href=" ' . get_stylesheet_uri() . '" rel="stylesheet" media="all" type="text/css" />';
}

if (CSS_AT_BOTTOM === TRUE) {
  add_action('wp_footer', 'css_at_bottom', 1);
}


