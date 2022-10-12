<?php
/**
 * Plugin Name:       Chad Sample Plugin
 * Plugin URI:        https://github.com/cbarbee-git/sample-wp-plugin
 * Description:       This plugin does just sample coding.
 * Text Domain:		  chad-sample-plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Chad Barbee
 * Author URI:        https://chadbarbee.com/
 */
if( !defined('ABSPATH') ) : exit(); endif;

/**
 * Define plugin constants
 */
define( 'CHADPLUGIN_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
define( 'CHADPLUGIN_URL', trailingslashit( plugins_url('/', __FILE__) ) );

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'chadplugin_settings_link');
function chadplugin_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'admin.php?page=chad_plugin-settings-page' ) .
		'">' . __('Settings') . '</a>';
	$links[] = '<a href="'. plugins_url($path, $file) . '/' . trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) .'readme-display.php" class="thickbox open-plugin-details-modal" aria-label="More information about Chad\'s Plugin" data-title="Chad\'s Plugin" >' . __('View details') . '</a>';
	return $links;
}

/**
 * Include admin.php
 */
if( is_admin() ) {
 //   require_once CHADPLUGIN_PATH . '/admin/admin.php';
}

/**
 * Include public.php
 */
if( !is_admin() ) {
 //   require_once CHADPLUGIN_PATH . '/public/public.php';
}

/**
 * Include Post Types
 */
require_once CHADPLUGIN_PATH . 'inc/post-type/movie.php';

/**
 * Include Admin Menus (NOT USED)
 */
//////require_once CHADPLUGIN_PATH . 'inc/menu/menu.php';

/**
 * Include Settings Page
 */
require_once CHADPLUGIN_PATH . 'inc/settings/settings.php';