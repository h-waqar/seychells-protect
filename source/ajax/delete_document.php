<?php

$php_file_name = "delete_document_sy";

function cs_delete_document_sy()
{
    global $swift_helper_sy;

    $response = [
        "success" => true,
    ];


    $applicantId  = $_POST['applicantId'];
    $attachement_id  = $_POST['doc_id'];
    $docName = $_POST['docName'];


    /**
     * Check Which Docuemnt we need to delete
     */

    if ($docName == "accomodation") {
        $repeater = "accommodation_booking_confirmations";
        $sub_field = "booking_confirmations_document";
    } else if ($docName == "airline") {
        $repeater = "airline_booking_confirmation";
        $sub_field = "airline_booking_confirmation_document";
    } else if ($docName == "optional") {
        $repeater = "other_documents";
        $sub_field = "other_document";
    }




    $swift_helper_sy->del_document($attachement_id, $applicantId, $repeater, $sub_field);




    die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);
