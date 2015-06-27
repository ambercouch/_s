<?php

/**
 * _s functions and definitions
 *
 * @package _s
 */
/**
 * Set the content width.
 */
require get_template_directory() . '/lib/settings.php';

require get_template_directory() . '/lib/content-width.php';

require get_template_directory() . '/lib/theme-setup.php';

require get_template_directory() . '/lib/widget-areas.php';

require get_template_directory() . '/lib/enqueue.php';

require get_template_directory() . '/lib/body-data.php';

require get_template_directory() . '/lib/wp_foot.php';

require get_template_directory() . '/lib/admin.php';

require get_template_directory() . '/lib/bem-classes.php';

require get_template_directory() . '/lib/options.php';


// TODO put this somewhere nice - extras.php
// Add SVG
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/lib/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/lib/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/lib/inc/jetpack.php';

