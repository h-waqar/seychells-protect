<?php

/*
Plugin Name: Seychelles Protect
Description: Seychelles Protect is a powerful WordPress plugin developed by AounSolutions.com. It enables users to easily purchase and manage medical protection plans offered by our company in Seychelles. Seamlessly integrate health coverage options into your WordPress site with Seychelles Protect.
Version: 1.1
Author: Aoun Solutions
Author URI: https://www.aounsolutions.com
License: GPL-3.0
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: seychelles-protect
*/


/**
 * Constants
 */

// Push before making mojaor copy paste from visa swift about pdf

// define('SP_PLUGIN_VERSION', time()); // Cache Buster
define('SP_PLUGIN_VERSION', "2.0.1");
define('SP_BOOKING_CURRENCY', '£'); //currency symbol
define('SP_BOOKING_CURRENCY_CODE', 'GBP'); //currency code
define('SY_TEXT', 'sy'); //To make the plugin conflict free from visa-swift plugin
define('SY_SHORTCODE', 'seychelles_protect'); //To make the plugin conflict free from visa-swift plugin



define("SP_PIXLAB_API_KEY", "66b82a3ac80fd0d8a8531c7baf290374");
define("SP_TESTING_ENV", false);
/**
 * Plugin base url/path etc
 */

define('SP_PLUGIN_BASEFILE', __FILE__);
define('SP_PLUGIN_BASEPATH', plugin_dir_path(SP_PLUGIN_BASEFILE));

define('PLUGIN_BASEURL_SY', plugin_dir_url(SP_PLUGIN_BASEFILE));




require_once(SP_PLUGIN_BASEPATH . '/vendor/autoload.php');


include_once('source/classes/class_swift_helper.php');
include_once('source/classes/class_swift_data.php');
include_once('source/classes/class_pdf_passport.php');
include_once('source/php/common-functions.php');
include_once('source/ajax/get-demo.php');
include_once('source/ajax/validate_passport.php');
include_once('source/ajax/selfie_upload.php');
include_once('source/ajax/country_data.php');
include_once('source/ajax/contact_info.php');
include_once('source/ajax/trip_info.php');
include_once('source/ajax/health_declaration.php');
include_once('source/ajax/custom_declaration.php');
include_once('source/ajax/accommodation_booking_document.php');
include_once('source/ajax/proceed_continue.php');
include_once('source/ajax/airline_document.php');
include_once('source/ajax/optional_document.php');
include_once('source/ajax/delete_passport.php');
include_once('source/ajax/delete_document.php');
include_once('source/ajax/cybersource.php');
include_once('source/ajax/get_establishment.php');
include_once('source/ajax/create_custom_post.php');


/**
 * Class Seychelles_Protect
 *
 * Main class for this plugin.
 */

class Seychelles_Protect
{

    /**
     * Plugin version.
     *
     * @var string
     */
    private $version = '1.0.0';

    /**
     * Initialize the plugin.
     */
    public function __construct()
    {
        // Actions and filters can be added here for initialization.
        add_action('init', array($this, 'init'));
        // Add more hooks and actions as needed.
    }




    public function plugin_init()
    {
        ob_start();
        include("source/home.php");
        $contents = ob_get_contents();
        ob_end_clean();

        ?>

        <script>
            const ajaxUrl = "<?php echo (admin_url('admin-ajax.php')); ?>";
        </script>

        <?php

        return ($contents);
    }






    public function enqueue_css_js()
    {


        global $post;

        if (isset($post->post_content) && has_shortcode($post->post_content, SY_SHORTCODE)) {


            wp_enqueue_style('country-flags-codes-demo', plugins_url('source/plugin-pages/country-flags-codes/css/demo.css', __FILE__));

            wp_enqueue_style('country-flags-codes-intlTelInput', plugins_url('source/plugin-pages/country-flags-codes/css/intlTelInput.css', __FILE__));

            wp_enqueue_script('country-flags-codes-intlTelInput', plugins_url('source/plugin-pages/country-flags-codes/js/intlTelInput.js', __FILE__));


            // ------------------------->Bootstrap Libraries


            // Enqueue Bootstrap Datepicker CSS and JavaScript files
            // wp_enqueue_style('bootstrap-datepicker-css', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css');



            // wp_enqueue_script('bootstrap-datepicker-js', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js', array('jquery'), '1.9.0', true);


            // Enqueue Bootstrap JS from CDN
            wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js');

            // Enqueue Bootstrap CSS from CDN
            wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');


            // ---------------------------> Enqueue Fa Fa cdn for ICONS
            wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

            // Enqueue your custom JavaScript files
            wp_enqueue_script('visaSwift', plugins_url('/source/js/visaSwift.js', __FILE__), array('jquery'), SP_PLUGIN_VERSION, true);
            wp_enqueue_script('swiftStorage', plugins_url('/source/js/swiftStorage.js', __FILE__), array('jquery'), SP_PLUGIN_VERSION, true);
            wp_enqueue_script('ajaxRequest', plugins_url('/source/js/ajaxRequest.js', __FILE__), array('jquery'), SP_PLUGIN_VERSION, true);
            wp_enqueue_script('swiftFormValidation', plugins_url('/source/js/swiftFormValidation.js', __FILE__), array('jquery'), SP_PLUGIN_VERSION, true);
            wp_enqueue_script('niceCountryInput', plugins_url('/source/js/niceCountryInput.js', __FILE__), array('jquery'), SP_PLUGIN_VERSION, true);
            wp_enqueue_script('SwiftUiManager', plugins_url('/source/js/SwiftUiManager.js', __FILE__), array('jquery'), SP_PLUGIN_VERSION, true);
            wp_enqueue_script('swiftMultiPassport', plugins_url('/source/js/swiftMultiPassport.js', __FILE__), array('jquery'), SP_PLUGIN_VERSION, true);
            wp_enqueue_script('swiftCountrySelect', plugins_url('/source/js/swiftCountrySelect.js', __FILE__), array('jquery'), SP_PLUGIN_VERSION, true);



            wp_enqueue_script('swiftNavigation', plugins_url('/source/js/swiftNavigation.js', __FILE__), array('jquery'), SP_PLUGIN_VERSION, true);




            // Enqueue your custom CSS file
            wp_enqueue_style('cs_root', plugins_url('/source/styles/root.css', __FILE__), array(), SP_PLUGIN_VERSION, 'all');

            wp_enqueue_style('cs_main', plugins_url('/source/styles/main.css', __FILE__), array(), SP_PLUGIN_VERSION, 'all');

            wp_enqueue_style('cs_sidebar', plugins_url('/source/styles/side-bar.css', __FILE__), array(), SP_PLUGIN_VERSION, 'all');

            wp_enqueue_style('cs_pure_main', plugins_url('/source/styles/main-style.css', __FILE__), array(), SP_PLUGIN_VERSION, 'all');

            wp_enqueue_style('niceCountryInput', plugins_url('/source/styles/niceCountryInput.css', __FILE__), array(), SP_PLUGIN_VERSION, 'all');
        }
    }






    public function insert_data_from_csv()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'establishment';

        // Assume $csvFilePath contains the path to your CSV file
        $csvFilePath = SP_PLUGIN_BASEPATH . "source/csv/establishment.csv";
        $csvFile = fopen($csvFilePath, 'r');

        if ($csvFile !== false) {
            // Skip the header row
            fgetcsv($csvFile);

            while (($data = fgetcsv($csvFile)) !== false) {
                $wpdb->insert(
                    $table_name,
                    array(
                        'Establishment' => $data[0],
                        'Manager' => $data[1],
                        'Status' => $data[2],
                        'Rooms' => $data[3],
                        'Beds' => $data[4],
                        'Address' => $data[5],
                        'Island' => $data[6],
                        'Tel' => $data[7],
                        'Email' => $data[8],
                        'License_Type' => $data[9],
                    )
                );
            }

            fclose($csvFile);
        }
    }




    public function create_establishment_table()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'establishment';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
    id INT NOT NULL AUTO_INCREMENT,
    Establishment VARCHAR(255),
    Manager VARCHAR(255),
    Status VARCHAR(255),
    Rooms INT,
    Beds INT,
    Address TEXT,
    Island VARCHAR(255),
    Tel VARCHAR(20),
    Email VARCHAR(255),
    License_Type VARCHAR(255),
    PRIMARY KEY (id)
) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }




    /**
     * Initialize the plugin when WordPress is loaded.
     */
    public function init()
    {
        // Add initialization code here.
        // Example: add_action('wp_enqueue_scripts', array($this, 'enqueue_styles_and_scripts'));


        add_shortcode('seychelles_protect', [$this, 'plugin_init']);



        add_action('wp_enqueue_scripts', [$this, 'enqueue_css_js']);
    }

    /**
     * Enqueue styles and scripts.
     */
    public function enqueue_styles_and_scripts()
    {
        // Example: wp_enqueue_style('seychelles-protect-style', plugin_dir_url(__FILE__) . 'css/style.css', array(), $this->version, 'all');
        // Example: wp_enqueue_script('seychelles-protect-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), $this->version, true);
    }

    /**
     * Activate the plugin.
     */
    public static function activate()
    {
        // Activation code goes here.
        $seychelles_protect = new self();
        $seychelles_protect->create_establishment_table();
        $seychelles_protect->insert_data_from_csv();
    }

    /**
     * Deactivate the plugin.
     */
    public static function deactivate()
    {
        // Deactivation code goes here.
    }
}

// Instantiate the class
$seychelles_protect = new Seychelles_Protect();

// Activation and deactivation hooks
register_activation_hook(__FILE__, array('Seychelles_Protect', 'activate'));
register_deactivation_hook(__FILE__, array('Seychelles_Protect', 'deactivate'));
