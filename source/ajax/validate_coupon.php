<?php
add_action('wp_ajax_validate_coupon', 'validate_coupon_callback');
add_action('wp_ajax_nopriv_validate_coupon', 'validate_coupon_callback');

function validate_coupon_callback()
{
    $coupon_code = sanitize_text_field($_POST['coupon_code']);
    $coupons = get_option('sp_coupons', []);

    if (!empty($coupons)) {
        foreach ($coupons as $coupon) {
            if (isset($coupon['name']) && $coupon['name'] === $coupon_code) {
                wp_send_json_success([
                    'basic_price' => $coupon['basic_price'],
                    'total_price' => $coupon['total_price'],
                ]);
            }
        }
    }

    wp_send_json_error(['message' => 'Invalid coupon code.']);
}
