<?php 

/**
 * Custom Admin Menu
 */
function chadplugin_custom_admin_menu() {
    add_menu_page(
        __( 'Custom Menu', 'chad-plugin' ),
        __('Custom Menu', 'chad-plugin' ),
        'manage_options',
        'custom-menu',
        'chadplugin_custom_submenu_template_callback',
        CHADPLUGIN_URL . 'admin/img/plugins.png',
        10
    );

    add_submenu_page(
        'custom-menu',
        __( 'Custom Submenu', 'chad-plugin' ),
        __( 'Custom Submenu', 'chad-plugin' ),
        'manage_options',
        'custom-menu',
        'chadplugin_custom_submenu_template_callback'
    );

    add_submenu_page(
        'custom-menu',
        __( 'Custom Submenu 2', 'chad-plugin' ),
        __( 'Custom Submenu 2', 'chad-plugin' ),
        'manage_options',
        'custom-submenu-2',
        'chadplugin_custom_submenu_template_callback_2'
    );

    add_submenu_page(
        'admin.php',
        __( 'Custom Link', 'chad-plugin' ),
        __( 'Custom Link', 'chad-plugin' ),
        'manage_options',
        'custom-link',
        'chadplugin_custom_link_template_callback'
    );

    add_submenu_page(
        'tools.php',
        __( 'Custom Link', 'chad-plugin' ),
        __( 'Custom Link', 'chad-plugin' ),
        'manage_options',
        'custom-tool-link',
        'chadplugin_custom_tool_link_template_callback'
    );

    add_submenu_page(
        'options-general.php',
        __( 'Custom Link', 'chad-plugin' ),
        __( 'Custom Link', 'chad-plugin' ),
        'manage_options',
        'custom-option-link',
        'chadplugin_custom_option_link_template_callback'
    );
    
    add_submenu_page(
        'edit.php?post_type=page',
        __( 'Custom Link', 'chad-plugin' ),
        __( 'Custom Link', 'chad-plugin' ),
        'manage_options',
        'custom-theme-link',
        'chadplugin_custom_option_link_template_callback'
    );

}
add_action( 'admin_menu', 'chadplugin_custom_admin_menu' );

/**
 * Custom Submenu Callback Function
 */
function chadplugin_custom_submenu_template_callback() {
    ?>
    <h4>Hi, I am from custom submenu!!!</h4>
    <?php
}

/**
 * Custom Submenu Callback Function 2
 */
function chadplugin_custom_submenu_template_callback_2() {
    ?>
    <h4>Hi, I am from custom submenu 2!!!</h4>
    <a href="<?php echo admin_url('/admin.php?page=custom-link'); ?>">Custom Link</a>
    <?php
}

/**
 * Custom Link Tempalte Callback Function
 */
function chadplugin_custom_link_template_callback() {
    ?>
    <h4>Hello, I am from the custom link template!!!</h4>
    <?php 
}

/**
 * Custom Tool Link Template Callback
 */
function chadplugin_custom_tool_link_template_callback() {
    ?>
    <h2>Hey I am form the custom tool link!!</h2>
    <?php 
}


/**
 * Custom Tool Link Template Callback
 */
function chadplugin_custom_option_link_template_callback() {
    ?>
    <h2>Hey I am from the custom option link!!</h2>
    <?php 
}


/**
 * Add Custom Menus into Admin Toolbar
 */
function chadplugin_custom_admin_toolbar_links($admin_bar) {

    $admin_bar->add_menu(array(
        'id' => 'my-item',
        'title' => 'My Item',
        'href' => '#',
        'meta' => array(
            'title' => 'My Title'
        )
    ));

    $admin_bar->add_menu(array(
        'id' => 'my-first-item',
        'parent' => 'my-item',
        'title' => 'My Submenu Item',
        'href' => '#',
        'meta' => array(
            'title' => 'My Submenu Title',
            'target' => '_blank',
            'class' => 'my_custom_class'
        )
    ));

}
add_action( 'admin_bar_menu', 'chadplugin_custom_admin_toolbar_links', 100 );