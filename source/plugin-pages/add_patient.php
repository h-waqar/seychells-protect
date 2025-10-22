<?php
/* 
 * Add Patient Handler
 * 
 * dont echo anything here as its hooked into wp 'init'.
 */

$current_form_action = sanitize_text_field($_REQUEST['bk_action']);
\EtechBooking\clear_form_errors ($current_form_action);

if(!is_user_logged_in()){
    $error = array(
        'error' => array(
                'msg' => __("Sorry, you must be logged in to perform this action."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}
//need validation to check if logged in user has 'staff' role?

//validation
if(empty($_REQUEST['firstName'])){
    $error = array(
        'firstName' => array(
                'msg' => __("First name is required."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}
//@todo - so on for other fields


//No errors - continue
global $wpdb;

$test_and_addon_ids = !empty($_REQUEST['test_and_addon_id']) ? explode(':', $_REQUEST['test_and_addon_id']) : array();
$test_id = !empty($test_and_addon_ids[0]) ? absint($test_and_addon_ids[0]) : '';
$addon_id = !empty($test_and_addon_ids[1]) ? absint($test_and_addon_ids[1]) : '';
$addon_name = $addon_id ? get_the_title($addon_id) : ''; 
$test_name = get_field('test_name', $test_id); // added via ACF custom field

//$test_cost = get_field('test_cost', $test_id); 
$firstName = sanitize_text_field($_REQUEST['firstName']);
$lastName = sanitize_text_field($_REQUEST['lastName']);
//$productId = sanitize_text_field($_REQUEST['productId']); 
$passportName = sanitize_text_field($_REQUEST['passportName']);
$passportIssuingCountry = sanitize_text_field($_REQUEST['passport_issuing_country']);
$passportExpiry = sanitize_text_field($_REQUEST['passport_expiry']);
$gender = sanitize_text_field($_REQUEST['gender']);
$dob = !empty($_REQUEST['dob']) ? sanitize_text_field($_REQUEST['dob']) : '0000-00-00';
$ethnicity = sanitize_text_field($_REQUEST['ethnicity']);
$email = sanitize_text_field($_REQUEST['email']);
$phoneNumber = sanitize_text_field($_REQUEST['phoneNumber']);
$vaccinationStatus = sanitize_text_field($_REQUEST['vaccinationStatus']);
$street_address_1 = sanitize_text_field($_REQUEST['street_address_1']);
$street_address_2 = sanitize_text_field($_REQUEST['street_address_2']);
$country = sanitize_text_field($_REQUEST['country']);
$zip_code = sanitize_text_field($_REQUEST['post-code']);
//billing
$use_different_billing = !empty($_REQUEST['different-billing']) ? 1 : 0;
$billing_street_address_1 = !empty($_REQUEST['billing_street_address_1']) ? sanitize_text_field($_REQUEST['billing_street_address_1']) : '';
$billing_street_address_2 = !empty($_REQUEST['billing_street_address_2']) ? sanitize_text_field($_REQUEST['billing_street_address_2']) : '';
$billing_country = !empty($_REQUEST['billing_country']) ? sanitize_text_field($_REQUEST['billing_country']) : '';
$billing_zip_code = !empty($_REQUEST['billing_post-code']) ? sanitize_text_field($_REQUEST['billing_post-code']) : '';

//loggedin user id
$user_id = get_current_user_id();
//location ID
$staff_location = $wpdb->get_var("select post_id from " . $wpdb->postmeta . " where meta_key='staff_user' and `meta_value`='$user_id'");

$loc_code_prefix = ''; //eg. will be like GDS-000001	
if($staff_location){
    $loc_code_prefix = get_field('loc_code', $staff_location);
}

//generate unique ref
$reference = bin2hex(random_bytes(6)); //generate N*2 chars..so 6*2=12

$table = $wpdb->prefix.'bk_patients';
$data = array(
    'first_name' => $firstName, 
    'last_name' => $lastName,
//    'product_id' => $productId,
    'passport_name' => $passportName,
    'passport_issuing_country' => $passportIssuingCountry,
    'passport_expiry' => $passportExpiry,
    'gender' => $gender,
    'date_of_birth' => $dob,
    'ethnicity' => $ethnicity,
    'email' => $email,
    'phone_number' => $phoneNumber, 
    'vaccination_status' => $vaccinationStatus,
    'address1' => $street_address_1,
    'address2' => $street_address_2,
    'country' => $country,
    'postal_code' => $zip_code,
    'different_billing' => $use_different_billing,
    'location_id' => intval($staff_location),
    'lab_code' => '',//generated based on inserted id
    'staff_user_id' => absint($user_id),
    //'result_status' => 'Pending',
    'test_id' => $test_id,
    'test_name' => $test_name,
    'addon_id' => $addon_id,
    'addon_name' => $addon_name,
    'reference' => $reference,
    'dated' => current_time('mysql', 1),
);
$format = array(
    '%s', //first_name
    '%s',
    //'%s',
    '%s',
    '%s',//passport_issuing_country
    '%s',//passport_expiry
    '%s',
    '%s',
    '%s',
    '%s',
    '%s',
    '%s', //vaccination_status
    '%s',
    '%s',
    '%s',
    '%s', 
    '%d', //different_billing
    '%d', //location_id
    '%s', 
    '%d', //staff_user_id
    //'%s', 
    '%s',  //test_id
    '%s',  //test_name
    '%s', //addon_id 
    '%s', //addon_name  
    '%s',  //reference
    '%s' //dated
);

if($use_different_billing){
    $data = array_merge($data, array(
        'billing_address1' => $billing_street_address_1,
        'billing_address2' => $billing_street_address_2,
        'billing_country' => $billing_country,
        'billing_postal_code' => $billing_zip_code,
    ));
    $format = array_merge($format, array(
        '%s',
        '%s',
        '%s',
        '%s', 
    ));
}

$insert = $wpdb->insert($table, $data, $format);
if(!$insert){ //insert failed
    $error = array(
        'error' => array(
                'msg' => __("Error occured while adding patient. Error: ".$wpdb->last_error),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}


$last_insert_id = $wpdb->insert_id; //get last inserted ID

//update
$wpdb->update($table, array( 
    'lab_code' => $loc_code_prefix.'-'. str_pad($last_insert_id, 6, '0', STR_PAD_LEFT) 
    ), array('ID' => $last_insert_id));


//add success message -or- redirect here
$success_msg = array(
    'success' => array(
        'msg' => __("Patient added successfully."),
        'type' => 'success', //or success or warning (bootstrap alert types)...default danger
    )
);
\EtechBooking\set_form_errors ($current_form_action, $success_msg);
unset($_POST); //reset the formdata
