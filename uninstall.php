<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// Remove all matching options from the database
foreach (wp_load_alloptions() as $option => $value) {
    if (strpos($option, 'chad_plugin_settings_') !== false) {
        delete_option($option);
    }
}

// THIS IS UNUSED, but might be useful to leave here, just in case
// drop a custom database table
// global $wpdb;
// $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}mytable");