<?php

class SwiftDataSy
{

    public function __construct()
    {
    }
    
    public function insert_staying_places($applicantId)
    {

        if (isset($_POST['page_data']['trips'])) {
            $trip_Infoes  = $_POST['page_data']['trips'];
            $trips = [];

            foreach ($trip_Infoes as $trip_Info) {
                $repeater_data = array(
                    "staying_place" => $trip_Info['address']
                );
                // Check if 'stayingFrom' is not empty
                if (!empty($trip_Info['stayingFrom'])) {
                    $repeater_data['from_date'] = $trip_Info['stayingFrom'];
                }
                // Check if 'stayingTo' is not empty
                if (!empty($trip_Info['stayingTo'])) {
                    $repeater_data['to_date'] = $trip_Info['stayingTo'];
                }
                $trips[] = $repeater_data;
            }

            // Now you can use the $trips array to update the ACF field 'customer_staying_information' with the appropriate data.
            update_field('customer_staying_information', $trips, $applicantId);
        }

    } // funEnds
} // Class Ends

$swift_data_sy = new SwiftDataSy();
