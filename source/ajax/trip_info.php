<?php


$php_file_name = "trip_info_sy";

function cs_trip_info_sy()
{
    global $swift_helper_sy;
    global $swift_data_sy;
    $response = [
        "success" => true,
    ];

    $input_post = filter_input_array(INPUT_POST);

    $applicationSingle = $_POST['applicationSingle'];

    if ($applicationSingle == "false") {

        // Group Passport

        $applicantId =  $swift_helper_sy->create_post_type();
        $response['applicantId'] = $applicantId;


        // Update Country
        // $selectedCountry = $_POST['page_data']['selectedCountry'];
        // update_field("applicant_country", $selectedCountry, $applicantId);
        update_field("applicant_country", $input_post['selectedCountry'], $applicantId);

    } else {
        $applicantId  = $_POST['applicantId'];
    }


    $arrivalDate = $_POST['page_data']['arrivalDate'];
    update_field("arrival_date", $arrivalDate, $applicantId);



    $departureDate = $_POST['page_data']['departureDate'];
    update_field("departure_date", $departureDate, $applicantId);



    $finalDestinationCountry = $_POST['page_data']['finalDestinationCountry'];
    update_field("final_destination_country", $finalDestinationCountry, $applicantId);



    $purposeOfTravel = $_POST['page_data']['purposeOfTravel'];
    update_field("purpose_of_travel", $purposeOfTravel, $applicantId);

    $numberOfPersons = $_POST['page_data']['numberOfPersons'];
    update_field("number_of_persons", $numberOfPersons, $applicantId);


    $numberOfChildren = $_POST['page_data']['numberOfChildren'];
    update_field("childrens", $numberOfChildren, $applicantId);




    // $returnAirline = $_POST['page_data']['returnAirline'];
    // update_field("departure_airline", $returnAirline, $applicantId);


    // $returnFlight = $_POST['page_data']['returnFlight'];
    // update_field("departure_flight", $returnFlight, $applicantId);



    // $selectedAirline = $_POST['page_data']['selectedAirline'];
    // update_field("arrival_airline", $selectedAirline, $applicantId);



    // $selectedFlight = $_POST['page_data']['selectedFlight'];
    // update_field("arrival_flight", $selectedFlight, $applicantId);


    $startingCountry = $_POST['page_data']['startingCountry'];
    update_field("origin_trip", $startingCountry, $applicantId);

    /**
     * Code to upload the repeater field
     */
    $swift_data_sy->insert_staying_places($applicantId);


    /**
     * Code to upload repeater field Ends
     */

    die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);
