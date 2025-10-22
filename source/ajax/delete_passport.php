<?php

$php_file_name = "delete_passport_sy";

function cs_delete_passport_sy()
{
    global $swift_helper_sy;

    $response = [
        "success" => true,
    ];


    $applicantId  = $_POST['applicantId'];
    $documentNumber  = $_POST['documentNumber'];

    $status = $swift_helper_sy->del_passport($documentNumber, $applicantId);

    if ($status == false)
        $response['success'] = false;

    die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);
