<?php
if (! defined('ABSPATH')) exit;

class SMP_Coupons
{

    /** 
     * Initialize hooks
     */
    public static function init()
    {
        add_action('init', [__CLASS__, 'register_coupon_cpt']);
        add_action('add_meta_boxes', [__CLASS__, 'add_meta_boxes']);
        add_action('save_post', [__CLASS__, 'save_coupon_meta']);
    }

    /**
     * Register custom post type for coupons
     */
    public static function register_coupon_cpt()
    {
        $labels = [
            'name'               => __('Protection Coupons', 'smp'),
            'singular_name'      => __('Protection Coupon', 'smp'),
            'add_new'            => __('Add New Coupon', 'smp'),
            'add_new_item'       => __('Add New Protection Coupon', 'smp'),
            'edit_item'          => __('Edit Protection Coupon', 'smp'),
            'new_item'           => __('New Protection Coupon', 'smp'),
            'view_item'          => __('View Protection Coupon', 'smp'),
            'search_items'       => __('Search Coupons', 'smp'),
            'not_found'          => __('No Coupons Found', 'smp'),
            'menu_name'          => __('Protection Coupons', 'smp'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => 'options-general.php', // under Settings
            'menu_position'      => 99,
            'supports'           => ['title'],
        ];

        register_post_type('smp_protection_coupon', $args);
    }

    /**
     * Add meta boxes for coupon details
     */
    public static function add_meta_boxes()
    {
        add_meta_box(
            'smp_coupon_details',
            __('Coupon Details', 'smp'),
            [__CLASS__, 'coupon_details_meta_box'],
            'smp_protection_coupon',
            'normal',
            'default'
        );
    }

    /**
     * Coupon meta box HTML
     */
    public static function coupon_details_meta_box($post)
    {
        wp_nonce_field('smp_save_coupon_meta', 'smp_coupon_meta_nonce');

        $coupon_code       = get_post_meta($post->ID, '_smp_coupon_code', true);
        $discount_basic    = get_post_meta($post->ID, '_smp_discount_basic', true);
        $discount_total    = get_post_meta($post->ID, '_smp_discount_total', true);
?>
        <table class="form-table">
            <tr>
                <th><label for="smp_coupon_code">Coupon Code</label></th>
                <td><input type="text" name="smp_coupon_code" id="smp_coupon_code" value="<?php echo esc_attr($coupon_code); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="smp_discount_basic">Discount on Basic Protection (%)</label></th>
                <td><input type="number" step="0.01" name="smp_discount_basic" id="smp_discount_basic" value="<?php echo esc_attr($discount_basic); ?>" class="small-text" /></td>
            </tr>
            <tr>
                <th><label for="smp_discount_total">Discount on Total Protection (%)</label></th>
                <td><input type="number" step="0.01" name="smp_discount_total" id="smp_discount_total" value="<?php echo esc_attr($discount_total); ?>" class="small-text" /></td>
            </tr>
        </table>
<?php
    }

    /**
     * Save coupon meta fields
     */
    public static function save_coupon_meta($post_id)
    {
        if (! isset($_POST['smp_coupon_meta_nonce']) || ! wp_verify_nonce($_POST['smp_coupon_meta_nonce'], 'smp_save_coupon_meta')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (! current_user_can('edit_post', $post_id)) return;

        update_post_meta($post_id, '_smp_coupon_code', sanitize_text_field($_POST['smp_coupon_code'] ?? ''));
        update_post_meta($post_id, '_smp_discount_basic', floatval($_POST['smp_discount_basic'] ?? 0));
        update_post_meta($post_id, '_smp_discount_total', floatval($_POST['smp_discount_total'] ?? 0));
    }

    /**
     * Check if a coupon is valid
     */
    public static function is_valid_coupon($code)
    {
        $coupon = self::get_coupon_by_code($code);
        return $coupon ? true : false;
    }

    /**
     * Get discount on basic protection
     */
    public static function get_basic_discount($code)
    {
        $coupon = self::get_coupon_by_code($code);
        return $coupon ? floatval(get_post_meta($coupon->ID, '_smp_discount_basic', true)) : 0;
    }

    /**
     * Get discount on total protection
     */
    public static function get_total_discount($code)
    {
        $coupon = self::get_coupon_by_code($code);
        return $coupon ? floatval(get_post_meta($coupon->ID, '_smp_discount_total', true)) : 0;
    }

    /**
     * Fetch coupon by code
     */
    private static function get_coupon_by_code($code)
    {
        $args = [
            'post_type'      => 'smp_protection_coupon',
            'post_status'    => 'publish',
            'meta_key'       => '_smp_coupon_code',
            'meta_value'     => sanitize_text_field($code),
            'posts_per_page' => 1,
        ];
        $posts = get_posts($args);
        return ! empty($posts) ? $posts[0] : false;
    }
}

/**
 * Initialize the class immediately
 */
SMP_Coupons::init();

// Ensure CPT registered and rewrite rules flushed once
if ( ! get_option('smp_coupons_flush_done') ) {
    SMP_Coupons::register_coupon_cpt();
    flush_rewrite_rules(false);
    update_option('smp_coupons_flush_done', true);
}
