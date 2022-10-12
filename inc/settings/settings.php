<?php

/**
 * Create Settings Menu
 */
function chad_plugin_settings_menu() {

    add_menu_page(
        __( 'Chad Plugin Settings', 'chad-plugin' ),
        __( 'Chad Plugin Settings', 'chad-plugin' ),
        'manage_options',
        'chad_plugin-settings-page',
        'chad_plugin_settings_template_callback',
        'dashicons-admin-settings',
        null
    );

}
add_action('admin_menu', 'chad_plugin_settings_menu');

/**
 * Settings Template Page
 */
function chad_plugin_settings_template_callback() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<?php
			//TODO: add some validation to these fields
			//// register_setting( $option_group, $option_name, $sanitize_callback );
            //// register_setting('my_option_group', 'my_option_group', 'my_option_group_validate');
			settings_errors();
		?>
        <form action="options.php" method="post">
            <?php
            // security field
            settings_fields( 'chad_plugin-settings-page' );

            // output settings section here
            do_settings_sections('chad_plugin-settings-page');

            // save settings button
            submit_button( 'Save Settings for Chad Plugin' );
            ?>
        </form>
    </div>
    <?php
}

/**
 * Settings Template
 */
function chad_plugin_settings_init() {

    // Setup settings section
    add_settings_section(
        'chad_plugin_settings_section',
        'Chad Plugin Settings Page',
        '',
        'chad_plugin-settings-page'
    );

    // Register input field
    register_setting(
        'chad_plugin-settings-page',
        'chad_plugin_settings_input_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        'chad_plugin_settings_input_field',
        __( 'Input Field', 'chad-plugin' ),
        'chad_plugin_settings_input_field_callback',
        'chad_plugin-settings-page',
        'chad_plugin_settings_section'
    );

    // Register textarea field
    register_setting(
        'chad_plugin-settings-page',
        'chad_plugin_settings_textarea_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_textarea_field',
            'default' => ''
        )
    );

    // Add textarea fields
    add_settings_field(
        'chad_plugin_settings_textarea_field',
        __( 'Textarea Field', 'chad-plugin' ),
        'chad_plugin_settings_textarea_field_callback',
        'chad_plugin-settings-page',
        'chad_plugin_settings_section'
    );

    // Register select option field
    register_setting(
        'chad_plugin-settings-page',
        'chad_plugin_settings_select_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add textarea fields
    add_settings_field(
        'chad_plugin_settings_select_field',
        __( 'Select Field', 'chad-plugin' ),
        'chad_plugin_settings_select_field_callback',
        'chad_plugin-settings-page',
        'chad_plugin_settings_section'
    );

    // Register radio field
    register_setting(
        'chad_plugin-settings-page',
        'chad_plugin_settings_radio_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add radio fields
    add_settings_field(
        'chad_plugin_settings_radio_field',
        __( 'Radio Field', 'chad-plugin' ),
        'chad_plugin_settings_radio_field_callback',
        'chad_plugin-settings-page',
        'chad_plugin_settings_section'
    );

}
add_action( 'admin_init', 'chad_plugin_settings_init' );


/**
 * txt field template
 */
function chad_plugin_settings_input_field_callback() {
    $chad_plugin_input_field = get_option('chad_plugin_settings_input_field');
    ?>
    <input type="text" name="chad_plugin_settings_input_field" class="regular-text" value="<?php echo isset($chad_plugin_input_field) ? esc_attr( $chad_plugin_input_field ) : ''; ?>" />
    <?php
}


/**
 * textarea field template
 */
function chad_plugin_settings_textarea_field_callback() {
    $chad_plugin_textarea_field = get_option('chad_plugin_settings_textarea_field');
    ?>
    <textarea name="chad_plugin_settings_textarea_field" class="large-text" rows="10"><?php echo isset($chad_plugin_textarea_field) ? esc_textarea( $chad_plugin_textarea_field ) : ''; ?></textarea>
    <?php
}

/**
 * select field template
 */
function chad_plugin_settings_select_field_callback() {
    $chad_plugin_select_field = get_option('chad_plugin_settings_select_field');
    ?>
    <select name="chad_plugin_settings_select_field" class="regular-text">
        <option value="">Select One</option>
        <option value="option1" <?php selected( 'option1', $chad_plugin_select_field ); ?> >Option 1</option>
        <option value="option2" <?php selected( 'option2', $chad_plugin_select_field ); ?>>Option 2</option>
    </select>
    <?php
}

/**
 * radio field template
 */
function chad_plugin_settings_radio_field_callback() {
    $chad_plugin_radio_field = get_option( 'chad_plugin_settings_radio_field' );
    ?>
    <label for="value1">
        <input type="radio" name="chad_plugin_settings_radio_field" value="value1" <?php checked( 'value1', $chad_plugin_radio_field ); ?>/> Value 1
    </label>
    <label for="value2">
        <input type="radio" name="chad_plugin_settings_radio_field" value="value2" <?php checked( 'value2', $chad_plugin_radio_field ); ?>/> Value 2
    </label>
    <?php
}