<?php
/**
 * Init Styles & scripts
 *
 * @return void
 */
function chadplugin_public_styles_scripts()
{
    wp_enqueue_style('chadplugin-public-style', CHADPLUGIN_URL . 'public/css/public.css', '', rand());
    wp_enqueue_script('chadplugin-public-script', CHADPLUGIN_URL . 'public/js/public.js', array('jquery'), rand(), true);
}
add_action('wp_enqueue_scripts', 'chadplugin_public_styles_scripts');