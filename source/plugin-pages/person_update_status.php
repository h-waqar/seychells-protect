<?php
/* 
 * Person Details - Update Status Handler
 * 
 * dont echo anything here as its hooked into wp 'init'.
 */

$current_form_action = sanitize_text_field($_REQUEST['bk_action']);
\EtechBooking\clear_form_errors ($current_form_action);


if(!is_user_logged_in()){
    $error = array(
        'test_result' => array(
                'msg' => __("Sorry, you must be logged in to perform this action."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}
//need validation to check if logged in user has 'staff' role?

//validation
if(empty($_REQUEST['id'])){
    $error = array(
        'person_id' => array(
                'msg' => __("ID is required."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}
if(empty($_REQUEST['location_id'])){
    $error = array(
        'location_id' => array(
                'msg' => __("Location ID is required."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}
if(empty($_REQUEST['test_result'])){
    $error = array(
        'test_result' => array(
                'msg' => __("Status is required."),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}



//No errors - continue
global $wpdb;

$person_id = absint($_REQUEST['id']);
//$lab_code = !empty($_REQUEST['code']) ? sanitize_text_field($_REQUEST['code']) : '';
$location_id = !empty($_REQUEST['location_id']) ? absint($_REQUEST['location_id']) : '';
$test_result = sanitize_text_field($_REQUEST['test_result']);

//loggedin user id
//$user_id = get_current_user_id();

$table = $wpdb->prefix.'bk_patients';

//update
$data_to_update = array( 
    'result_status' => $test_result
);
if(in_array(strtolower($test_result), array('test complete'))){
    $data_to_update['test_date'] = current_time('mysql', 1);
}
if(in_array(strtolower($test_result), array('positive', 'negative'))){
    $data_to_update['final_result'] = $test_result;
}

$update = $wpdb->update($table, $data_to_update, array('ID' => $person_id, 'location_id' => $location_id));


if(!$update){ //insert failed
    $error = array(
        'error' => array(
                'msg' => __("Error occured while updating record. Error: ".$wpdb->last_error),
                'type' => 'danger', //or success or warning (bootstrap alert types)...default danger
            )
        );
    \EtechBooking\set_form_errors ($current_form_action, $error);
    return;
}

//add success message -or- redirect here
$success_msg = array(
    'success' => array(
        'msg' => __("Status updated successfully."),
        'type' => 'success', //or success or warning (bootstrap alert types)...default danger
    )
);
\EtechBooking\set_form_errors ($current_form_action, $success_msg);

//Certificate Emails:
//Note  : These statuses are for internally use except POSITIVE & NEGATIVE because we will email them Certificates based on these fields Either negative or positive
if(in_array(strtolower($test_result), array('positive', 'negative'))){
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
        //also sent via admin update ("etech-booking/includes/forms/admin/update_person_details.php")
        \EtechBooking\send_email($patient['email'], __("Test Certificate"), 'test-certificate', $patient, true); //send email to person
        //update email sent flag so as not to send this email each time user is updated
        $wpdb->update($table, array( 
            'certificate_sent' => 1,
            'certificate_date' => current_time('mysql', 1)
        ), array('ID' => $patient['ID'], 'location_id' => $patient['location_id']));

    }
    
}


unset($_POST); //reset the formdata
