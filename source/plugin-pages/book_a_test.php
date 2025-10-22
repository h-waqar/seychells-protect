<?php
/* 
 * Add Muliple Patients/ Book a test Handler
 * 
 * dont echo anything here as its hooked into wp 'init'.
 */

$current_form_action = sanitize_text_field($_REQUEST['bk_action']);
\EtechBooking\clear_form_errors ($current_form_action);

//validation
if(empty($_REQUEST['test_date'])){
    $error = array(
        'test_date' => array(
                'msg' => __("Please select a test date from the calendar."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}
if(empty($_REQUEST['time_slot'])){
    $error = array(
        'time_slot' => array(
                'msg' => __("Please select a time slot from the selected date."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}
//@todo - so on for other fields

//No errors - continue
global $wpdb;
$table = $wpdb->prefix.'bk_patients';

$test_id = absint($_REQUEST['test_id']);
$addon_id = !empty($_REQUEST['addon_id']) ? absint($_REQUEST['addon_id']) : '';
$addon_name = $addon_id ? get_the_title($addon_id) : ''; 
$test_name = get_field('test_name', $test_id); // added via ACF custom field
//$test_cost = get_field('test_cost', $test_id); 
$test_date = sanitize_text_field($_REQUEST['test_date']);
$time_slot = sanitize_text_field($_REQUEST['time_slot']);
$test_datetime_str = sprintf("%s %s", $test_date, $time_slot);

//validate timeslot max bookings restriction
$max_bookings_per_slot = 25;
//change '%H:00:00' into '%H:%i:%s' to only check for booking via this frontend form which adds row date values as Y-m-d H:00:00.
//...using '%H:00:00' will also check for rows added via admin/staff 
$current_bookings = $wpdb->get_row($wpdb->prepare("SELECT count(dated) AS bookings, DATE_FORMAT(dated,'%%Y-%%m-%%d') AS time_slot_date, DATE_FORMAT(dated,'%%H:00:00') AS time_slot FROM {$table} GROUP BY time_slot_date, time_slot HAVING time_slot = '%s' AND time_slot_date = '%s'", $time_slot, $test_date));
if($current_bookings && $current_bookings->bookings >= $max_bookings_per_slot){
    $error = array(
        'time_slot' => array(
                'msg' => __("Max bookings per timeslot reached. Please select a different timeslot."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
    //@todo this will not check if adding rows for current request will results in greater than $max_bookings_per_slot...Add if its required?
}
//payment_intent_id
$payment_intent_id = $_REQUEST['payment_intent_id'];
//location ID
$staff_location = absint($_REQUEST['test_location']);
//loggedin user id
$user_id = get_post_meta($staff_location, 'staff_user', true);

$loc_code_prefix = ''; //eg. will be like GDS-000001	
if($staff_location){
    $loc_code_prefix = get_field('loc_code', $staff_location);
}

//Multiple patients data
$patients_data = isset($_REQUEST['person']) && is_array($_REQUEST['person']) ? $_REQUEST['person'] : array();
$persons_to_email = array();
foreach ($patients_data as $key => $patient_data) {
    if(empty($patient_data['firstName'])){
        $error = array(
            "firstName{$key}" => array(
                    'msg' => __("First name is missing for one of the person."),
                    'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
                )
            );
        \EtechBooking\set_form_errors ($current_form_action, $error);
        continue; //skips adding this person
    }
    if(empty($patient_data['email'])){
        $error = array(
            "email{$key}" => array(
                    'msg' => __("Email is missing for one of the person."),
                    'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
                )
            );
        \EtechBooking\set_form_errors ($current_form_action, $error);
        continue; //skips adding this person
    }
    //@todo - so on for other fields
    
    $firstName = sanitize_text_field($patient_data['firstName']);
    $lastName = sanitize_text_field($patient_data['lastName']);
    //$productId = sanitize_text_field($patient_data['productId']);
    $passportName = sanitize_text_field($patient_data['passportName']);
    $passportIssuingCountry = sanitize_text_field($patient_data['passport_issuing_country']);
    $passportExpiry = sanitize_text_field($patient_data['passport_expiry']);
    $gender = sanitize_text_field($patient_data['gender']);
    $dob = !empty($patient_data['dob']) ? sanitize_text_field($patient_data['dob']) : '0000-00-00';
    $ethnicity = sanitize_text_field($patient_data['ethnicity']);
    $email = sanitize_text_field($patient_data['email']);
    $phoneNumber = sanitize_text_field($patient_data['phoneNumber']);
    $vaccinationStatus = sanitize_text_field($patient_data['vaccinationStatus']);
    $street_address_1 = sanitize_text_field($patient_data['street_address_1']);
    $street_address_2 = sanitize_text_field($patient_data['street_address_2']);
    $country = sanitize_text_field($patient_data['country']);
    $zip_code = sanitize_text_field($patient_data['post-code']);
    //billing
    $use_different_billing = !empty($patient_data['different-billing']) ? 1 : 0;
    $billing_street_address_1 = !empty($patient_data['billing_street_address_1']) ? sanitize_text_field($patient_data['billing_street_address_1']) : '';
    $billing_street_address_2 = !empty($patient_data['billing_street_address_2']) ? sanitize_text_field($patient_data['billing_street_address_2']) : '';
    $billing_country = !empty($patient_data['billing_country']) ? sanitize_text_field($patient_data['billing_country']) : '';
    $billing_zip_code = !empty($patient_data['billing_post-code']) ? sanitize_text_field($patient_data['billing_post-code']) : '';
    //generate unique ref
    $reference = bin2hex(random_bytes(6)); //generate N*2 chars..so 6*2=12
    
    $data = array(
        'first_name' => $firstName, 
        'last_name' => $lastName,
        //'product_id' => $productId,
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
        //'result_status' => '', //set to default: Appointment Booked 
        'test_id' => $test_id,
        'test_name' => $test_name,
        'addon_id' => $addon_id,
        'addon_name' => $addon_name,
        'reference' => $reference,
        'stripe_paymentintent_id' => $payment_intent_id,
        //'dated' => current_time('mysql', 1), //current time
        'dated' => $test_datetime_str
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
        '%s', //reference 
        '%s', //stripe_paymentintent_id 
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
                    'msg' => __("Error occured while registering one of the person."),
                    'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
                )
            );
        \EtechBooking\set_form_errors ($current_form_action, $error);
        continue;
    }
    
    $last_insert_id = $wpdb->insert_id; //get last inserted ID

    //update
    $lab_code = $loc_code_prefix.'-'. str_pad($last_insert_id, 6, '0', STR_PAD_LEFT);
    $wpdb->update($table, array( 
        'lab_code' => $lab_code 
    ), array('ID' => $last_insert_id));
    
    //save data for sending QR email
    $data['person_id'] = $last_insert_id;
    $data['full_name'] = trim($firstName. ' ' . $lastName);
    $data['location_code'] = $loc_code_prefix;
    $data['location_title'] = get_the_title($staff_location);
    $data['test_date'] = $test_date;
    $data['test_time_slot'] = $time_slot;
    $persons_to_email[] = $data;
}

$stripe_meta = array(
    'test_cost' => '',
    'test_qty' => '',
    'coupon_applied' => '',
    'coupon_code' => '',
);

//update strip metadata
require_once(ETECH_BOOKING_BASEPATH.'/vendor/autoload.php');
try {
    $selected_location_name = $staff_location ? get_the_title($staff_location).' ('.$loc_code_prefix.')' : '';
    if ($payment_intent_id) {
        $stripe = new \Stripe\StripeClient(
            ETECH_BOOKING_STRIPE_SECRET_KEY
          );
        $stripe->paymentIntents->update(
            $payment_intent_id,
            [
                'metadata' => [
                    'record_id' => $last_insert_id,
                    'test_date' => $test_date,
                    'time_slot' => $time_slot,
                    'selected_location' => $selected_location_name,
                    //@todo - add other metadata here if required
                ]
            ]
        );
        
        $pi_data = $stripe->paymentIntents->retrieve(
            $payment_intent_id,
            []
        );
        //fetch additional metadata we might need like Confirmation Email 
        if(isset($pi_data->metadata->test_cost)){
            $stripe_meta['test_cost'] = $pi_data->metadata->test_cost;
        }
        if(isset($pi_data->metadata->test_qty)){
            $stripe_meta['test_qty'] = $pi_data->metadata->test_qty;
        }
        if(isset($pi_data->metadata->coupon_applied)){
            $stripe_meta['coupon_applied'] = $pi_data->metadata->coupon_applied;
        }
        if(isset($pi_data->metadata->coupon_code)){
            $stripe_meta['coupon_code'] = $pi_data->metadata->coupon_code;
        }

    }

} catch (\Stripe\Exception\ApiErrorException $e) {
    # Display error?
    \EtechBooking\log($e->getMessage(), 'stripe', "Sripe Update Metadata - Error");
}


foreach ($persons_to_email as $pdata) {
    $pdata['metadata'] = $stripe_meta;
    
    \EtechBooking\log($pdata, 'book_a_test', "Person to Email/Add to Yoti");

    //Emails
    \EtechBooking\send_email($pdata['email'], __("Booking Confirmation"), 'booking-confirmation', $pdata, true); //send email to each person registered
    
    //YOTI Integration - add customers/patients
    \EtechBooking\yoti_add_record($pdata); //add each person registered
}


//add success message -or- redirect here
$thanks_page_id = get_option('book_a_test_thanks_page', 0);

unset($_POST); //reset the formdata

if(!$thanks_page_id){ //if not set
    $success_msg = array(
        'success' => array(
            'msg' => __("Person/s registered successfully."),
            'type' => 'success', //or success or warning (bootstrap alert types)...default danger
        )
    );
    \EtechBooking\set_form_errors ($current_form_action, $success_msg);
}else{
    //else redirect to it
    wp_safe_redirect( add_query_arg('id', $last_insert_id, get_permalink($thanks_page_id)) );
    exit;
}
