<?php

$php_file_name = "accommodation_booking_document_sy";










function cs_accommodation_booking_document_sy()
{

    $response = [
        "success" => true,
    ];



    // $applicantId  = get_post_id_from_unique_key_sy($_POST['applicantId']);
    $applicantId  = $_POST['applicantId'];
    $mainrepeater = 'accommodation_booking_confirmations';
    $repeaterfield = 'booking_confirmations_document';

    $resp = insert_repeater_row_attachment_sy($_FILES, $applicantId, $mainrepeater, $repeaterfield);

    $response['upload_status'] =  $resp['status'];
    $response['filename'] =  $resp['filename'];
    $response['attachment_id'] = $resp['attachment_id'];
    $file_url = wp_get_attachment_url($resp['attachment_id']);

    $response['file_url'] = $file_url;
    die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);
