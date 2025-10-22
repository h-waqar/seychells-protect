<?php
/* 
 * Person Details - Update Handler
 * 
 * dont echo anything here as its hooked into wp 'init'.
 */

$current_form_action = sanitize_text_field($_REQUEST['bk_admin_action']);
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
if(empty($_REQUEST['edit_update_id'])){
    $error = array(
        'edit_update_id' => array(
                'msg' => __("Record ID is missing from the request."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}
if(empty($_REQUEST['first_name'])){
    $error = array(
        'first_name' => array(
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

$person_id = absint($_REQUEST['edit_update_id']);

$test_and_addon_ids = !empty($_REQUEST['test_and_addon_id']) ? explode(':', $_REQUEST['test_and_addon_id']) : array();
$test_id = !empty($test_and_addon_ids[0]) ? absint($test_and_addon_ids[0]) : '';
$addon_id = !empty($test_and_addon_ids[1]) ? absint($test_and_addon_ids[1]) : '';
$addon_name = $addon_id ? get_the_title($addon_id) : ''; 
$test_name = get_field('test_name', $test_id); // added via ACF custom field

$firstName = sanitize_text_field($_REQUEST['first_name']);
$lastName = sanitize_text_field($_REQUEST['last_name']);
//$productId = sanitize_text_field($_REQUEST['productId']); 
$passportName = sanitize_text_field($_REQUEST['passport_name']);
$passportIssuingCountry = sanitize_text_field($_REQUEST['passport_issuing_country']);
$passportExpiry = sanitize_text_field($_REQUEST['passport_expiry']);
$gender = sanitize_text_field($_REQUEST['gender']);
$dob = !empty($_REQUEST['date_of_birth']) ? sanitize_text_field($_REQUEST['date_of_birth']) : '0000-00-00';
$ethnicity = sanitize_text_field($_REQUEST['ethnicity']);
$email = sanitize_text_field($_REQUEST['email']);
$phoneNumber = sanitize_text_field($_REQUEST['phone_number']);
$vaccinationStatus = sanitize_text_field($_REQUEST['vaccination_status']);
$street_address_1 = sanitize_text_field($_REQUEST['address1']);
$street_address_2 = sanitize_text_field($_REQUEST['address2']);
$country = sanitize_text_field($_REQUEST['country']);
$zip_code = sanitize_text_field($_REQUEST['postal_code']);
//billing
$use_different_billing = !empty($_REQUEST['different-billing']) ? 1 : 0;
$billing_street_address_1 = !empty($_REQUEST['billing_address1']) ? sanitize_text_field($_REQUEST['billing_address1']) : '';
$billing_street_address_2 = !empty($_REQUEST['billing_address2']) ? sanitize_text_field($_REQUEST['billing_address2']) : '';
$billing_country = !empty($_REQUEST['billing_country']) ? sanitize_text_field($_REQUEST['billing_country']) : '';
$billing_zip_code = !empty($_REQUEST['billing_postal_code']) ? sanitize_text_field($_REQUEST['billing_postal_code']) : '';

$result_status = sanitize_text_field($_REQUEST['result_status']);
//location ID
$staff_location = absint($_REQUEST['location_id']);
$staff_user_id = 0;

$loc_code_prefix = ''; //eg. will be like GDS-000001	
if($staff_location){
    $loc_code_prefix = get_field('loc_code', $staff_location);
    $staff_user_id = get_field('staff_user', $staff_location);
}

$table = $wpdb->prefix.'bk_patients';
$data = array(
    'first_name' => $firstName, 
    'last_name' => $lastName,
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
    'staff_user_id' => absint($staff_user_id),
    'result_status' => $result_status,
    //empty default values
    'billing_address1' => '',
    'billing_address2' => '',
    'billing_country' => '',
    'billing_postal_code' => '',
);
if($use_different_billing){
    $data = array_merge($data, array(
        'billing_address1' => $billing_street_address_1,
        'billing_address2' => $billing_street_address_2,
        'billing_country' => $billing_country,
        'billing_postal_code' => $billing_zip_code,
    ));
}
if(!empty($test_id)){
    $data['test_id'] = $test_id;
    $data['test_name'] = $test_name;
    $data['addon_id'] = $addon_id;
    $data['addon_name'] = $addon_name;
}
if(in_array(strtolower($result_status), array('test complete'))){
    $data['test_date'] = current_time('mysql', 1);
}
if(in_array(strtolower($result_status), array('positive', 'negative'))){
    $data['final_result'] = $result_status;
}
$update = $wpdb->update($table, $data, array('ID' => $person_id));

//update
$wpdb->update($table, array( 
    'lab_code' => $loc_code_prefix.'-'. str_pad($person_id, 6, '0', STR_PAD_LEFT) 
    ), array('ID' => $person_id));

//add success message -or- redirect here
$success_msg = array(
    'success' => array(
        'msg' => __("Record updated successfully."),
        'type' => 'success', //or success or warning (bootstrap alert types)...default danger
    )
);
\EtechBooking\set_form_errors ($current_form_action, $success_msg);

//Certificate Emails:
//Note  : These statuses are for internally use except POSITIVE & NEGATIVE because we will email them Certificates based on these fields Either negative or positive
if(in_array(strtolower($result_status), array('positive', 'negative'))){
    global $wpdb;

    $sql = "SELECT *,date_format(dated,'%%m-%%d-%%Y') as dated,date_format(dated,'%%H:00:00') as timeslot FROM " . $wpdb->prefix . "bk_patients WHERE ID = %d ORDER BY ID DESC LIMIT 1";
    $patient = $wpdb->get_row( $wpdb->prepare($sql, $person_id), ARRAY_A );
    if($patient && empty($patient['certificate_sent'])){
        $patient['person_id'] = $patient['ID'];
        $patient['full_name'] = trim($patient['first_name']. ' ' . $patient['last_name']);
        $patient['location_code'] = get_field('loc_code', $patient['location_id']);
        $patient['location_title'] = get_the_title($patient['location_id']);
        //$patient['test_date'] = $patient['dated'];
        $patient['test_time_slot'] = $patient['timeslot'];
        \EtechBooking\send_email($patient['email'], __("Test Certificate"), 'test-certificate', $patient, true); //send email to person
        //update email sent flag so as not to send this email each time user is updated
        $wpdb->update($table, array( 
            'certificate_sent' => 1,
            'certificate_date' => current_time('mysql', 1)
        ), array('ID' => $patient['ID'], 'location_id' => $patient['location_id']));
    }
}


unset($_POST); //reset the formdata
