<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form action="options.php" method="post">
        <?php
        settings_fields('seychelles_protect_settings_group');
        do_settings_sections('seychelles_protect_settings_group');
        ?>
        <h2>General Settings</h2>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Basic Protection Price</th>
                <td><input type="text" name="sp_basic_protection_price" value="<?php echo esc_attr(get_option('sp_basic_protection_price')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Total Protection Price</th>
                <td><input type="text" name="sp_total_protection_price" value="<?php echo esc_attr(get_option('sp_total_protection_price')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Bank Fee Percentage (%)</th>
                <td><input type="number" name="sp_bank_fee_percentage" value="<?php echo esc_attr(get_option('sp_bank_fee_percentage', 4)); ?>" /></td>
            </tr>
        </table>
        <h2>Mail Settings</h2>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Hostname</th>
                <td><input type="text" name="sp_hostname" value="<?php echo esc_attr(get_option('sp_hostname')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Domain</th>
                <td><input type="text" name="sp_domain" value="<?php echo esc_attr(get_option('sp_domain')); ?>" /></td>
            </tr>
        </table>
        <h2>CyberSource Credentials</h2>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Merchant ID</th>
                <td><input type="text" name="sp_cybersource_merchant_id" value="<?php echo esc_attr(get_option('sp_cybersource_merchant_id')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Merchant Key ID</th>
                <td><input type="text" name="sp_cybersource_merchant_key_id" value="<?php echo esc_attr(get_option('sp_cybersource_merchant_key_id')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Merchant Secret Key</th>
                <td><input type="password" name="sp_cybersource_merchant_secret_key" value="<?php echo esc_attr(get_option('sp_cybersource_merchant_secret_key')); ?>" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>