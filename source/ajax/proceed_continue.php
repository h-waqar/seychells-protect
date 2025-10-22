<?php

$php_file_name = "proceed_continue_sy";

function cs_proceed_continue_sy()
{

    $response = [
        "success" => true,
    ];


    $applicantId  = $_POST['applicantId'];

    $applicationBySelf = $_POST['data']['applicationBySelf'];
    $contactName = $_POST['data']['contactName'];
    $contactNumber = $_POST['data']['contactNumber'];
    $emailAddress = $_POST['data']['emailAddress'];
    $additionalNotes = $_POST['data']['additionalNotes'];

   
    update_field("by_agent_or_self", $applicationBySelf, $applicantId);
    update_field("agent_name", $contactName, $applicantId);
    update_field("agent_phone_number", $contactNumber, $applicantId);
    update_field("agent_email", $emailAddress, $applicantId);
    update_field("additional_notes", $additionalNotes, $applicantId);
    


    die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);

