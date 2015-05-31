<?php
/*
 * Taken from bones
 *This file handles the admin area and functions.
 *You can use this file to make changes to the
 *dashboard. Updates to this page are coming soon.
 *via the functions file.

 *Developed by: Eddie Machado
 *URL: http://themble.com/bones/

 *Special Thanks for code & inspiration to:
 *@jackmcconnell - http://www.voltronik.co.uk/
 *Digging into WP - http://digwp.com/2010/10/customize-wordpress-dashboard/


	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin


*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);       // Right Now Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);       // Quick Press Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //

	// remove plugin dashboard boxes
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget

}
// removing the dashboard widgets
add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets' );


function remove_welcome_panel()
{
    remove_action('welcome_panel', 'wp_welcome_panel');
    $user_id = get_current_user_id();
    if (0 !== get_user_meta( $user_id, 'show_welcome_panel', true ) ) {
        update_user_meta( $user_id, 'show_welcome_panel', 0 );
    }
}

// removing the welcome box from the dashboard
add_action( 'load-index.php', 'remove_welcome_panel' );



/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function _s_login_css() {
	wp_enqueue_style( '_s_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function _s_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function _s_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
//add_action( 'login_enqueue_scripts', '_s_login_css', 10 );
add_filter( 'login_headerurl', '_s_login_url' );
add_filter( 'login_headertitle', '_s_login_title' );


/************* CUSTOMIZE ADMIN *******************/

/*
I don't really recommend editing the admin too much
as things may get funky if WordPress updates. Here
are a few functions which you can choose to use if
you like.
*/

// Custom Backend Footer
function _s_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://ambercouch.co.uk" target="_blank">AmberCouch</a></span>.', '_s' );
}

// adding it to the admin area
add_filter( 'admin_footer_text', '_s_custom_admin_footer' );

?>
