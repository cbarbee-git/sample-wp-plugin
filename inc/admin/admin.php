<?php 
/**
 * Init Styles & scripts
 *
 * @return void
 */
function chadplugin_admin_styles_scripts() {

    wp_enqueue_style( 'chadplugin-admin-style', CHADPLUGIN_URL . 'admin/css/admin.css', '', rand());

    wp_enqueue_script( 'chadplugin-admin-script', CHADPLUIN_URL . 'admin/js/admin.js', array('jquery'), rand(), true );
}
add_action( 'admin_enqueue_scripts', 'chadplugin_admin_styles_scripts' );