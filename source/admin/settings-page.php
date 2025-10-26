<?php

function sp_add_settings_page() {
    add_options_page(
        'Seychelles Protect Settings',
        'Seychelles Protect',
        'manage_options',
        'seychelles-protect',
        'sp_render_settings_page'
    );
}
add_action('admin_menu', 'sp_add_settings_page');

function sp_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Seychelles Protect Settings</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('sp_settings_group');
            do_settings_sections('seychelles-protect');
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}

function sp_register_settings() {
    register_setting('sp_settings_group', 'sp_basic_protection_price', ['type' => 'number', 'default' => 3.95]);
    register_setting('sp_settings_group', 'sp_total_protection_price', ['type' => 'number', 'default' => 6.95]);

    add_settings_section(
        'sp_prices_section',
        'Protection Plan Prices',
        'sp_prices_section_callback',
        'seychelles-protect'
    );

    add_settings_field(
        'sp_basic_protection_price_field',
        'Essential Protection Price (€)',
        'sp_basic_price_field_callback',
        'seychelles-protect',
        'sp_prices_section'
    );

    add_settings_field(
        'sp_total_protection_price_field',
        'Total Protection Price (€)',
        'sp_total_price_field_callback',
        'seychelles-protect',
        'sp_prices_section'
    );
}
add_action('admin_init', 'sp_register_settings');

function sp_prices_section_callback() {
    echo '<p>Set the prices for the medical protection plans.</p>';
}

function sp_basic_price_field_callback() {
    $price = get_option('sp_basic_protection_price', 3.95);
    echo "<input type='number' step='0.01' name='sp_basic_protection_price' value='" . esc_attr($price) . "' />";
}

function sp_total_price_field_callback() {
    $price = get_option('sp_total_protection_price', 6.95);
    echo "<input type='number' step='0.01' name='sp_total_protection_price' value='" . esc_attr($price) . "' />";
}
