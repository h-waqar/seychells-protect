<?php

$php_file_name = "health_declaration_sy";

function cs_health_declaration_sy()
{

    $response = [
        "success" => true,
    ];

    global $swift_helper_sy;


    $post_id  = $_POST['applicantId'];
    $documentNumber = $_POST['documentNumber'];
    $healthSymptoms = $_POST['page_data']['healthSymptoms'];


    if ($_POST['applicationSingle'] == "true") {
        $healthCounties = $_POST['page_data']['healthCounties'];
        $swift_helper_sy->insert_health_symptom($documentNumber, $healthSymptoms, $post_id);
        $swift_helper_sy->insert_health_declaration_countries($documentNumber, $healthCounties, $post_id);
    } else {

        $passports = $_POST['page_data']['passports'];


        foreach ($passports as $document_number => $passport) {

            $health_countries = $passport['health_countries'];
            $swift_helper_sy->insert_health_declaration_countries($document_number, $health_countries, $post_id);


        }
    }









    die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);
