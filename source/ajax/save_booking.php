<?php

$php_file_name = "save_booking_sy";

function cs_save_booking_sy()
{
    $response = [
        "success" => false,
        "message" => "Something went wrong",
    ];

    $data = $_POST['data'] ?? [];

    $email = sanitize_email($data['email']);

    $post_id = wp_insert_post([
        "post_title"   => "New Booking - " . $email,
        "post_content" => "",
        "post_type"    => "protection",
        "post_status"  => "private",
    ]);

    if (is_wp_error($post_id)) {
        $response['message'] = "Post creation failed.";
        die(json_encode($response));
    }

    // Personal Information
    update_field("phone_number", sanitize_text_field($data['phone_number']), $post_id);
    update_field("email", $email, $post_id);

    if (isset($data['applicants']) && is_array($data['applicants'])) {
        $applicants_data = [];
        foreach ($data['applicants'] as $applicant) {
            $applicants_data[] = [
                "emergency_contact_name" => sanitize_text_field($applicant['name']),
                "emergency_contact_dob" => sanitize_text_field($applicant['dob']),
            ];
        }
        update_field("emergency_contacts", $applicants_data, $post_id);
    }

    // Trip Information
    update_field("arrival_date", sanitize_text_field($data['arrival_date']), $post_id);
    update_field("departure_date", sanitize_text_field($data['departure_date']), $post_id);
    update_field("home_address", sanitize_text_field($data['address_in_seychelles']), $post_id);

    // Medical Protection
    update_field("medical_protection", sanitize_text_field($data['medical_protection']), $post_id);
    update_field("amount", sanitize_text_field($data['amount']), $post_id);


    $response['success'] = true;
    $response['message'] = "Booking saved successfully.";
    $response['post_id'] = $post_id;

    die(json_encode($response));
}


