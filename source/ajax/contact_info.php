<?php

$php_file_name = "contact_info_sy";

function cs_contact_info_sy()
{
    $response = [
        "success" => false,
        "message" => "Invalid request data",
    ];

    // Validate that required data exists
    if (
        !isset($_POST['page_data']) || !is_array($_POST['page_data']) ||
        !isset($_POST['applicantId']) || empty($_POST['applicantId'])
    ) {
        $response['message'] = "Missing required data.";
        wp_send_json($response);
    }

    $page_data = $_POST['page_data'];
    $applicantId = sanitize_text_field($_POST['applicantId']);

    $phone = sanitize_text_field($page_data['phone'] ?? '');
    $email = sanitize_email($page_data['email'] ?? '');
    $homeAddress = sanitize_text_field($page_data['homeAddress'] ?? '');
    $occupation = sanitize_text_field($page_data['occupation'] ?? '');
    $emergency_contacts = $page_data['emergency_contacts'] ?? [];

    // Update ACF fields
    update_field("email", $email, $applicantId);
    update_field("phone_number", $phone, $applicantId);
    update_field("home_address", $homeAddress, $applicantId);
    // update_field("occupation", $occupation, $applicantId); // Uncomment if field exists

    // Handle repeater field
    $name_updated = false;
    if (!empty($emergency_contacts) && is_array($emergency_contacts)) {
        $em_contacts = [];
        foreach ($emergency_contacts as $emergency_contact) {
            if (!$name_updated) {
                $new_title = sanitize_text_field($emergency_contact['name']);
                $formatted_date = date("F j, Y"); // e.g., April 15, 2025

                wp_update_post([
                    'ID'         => $applicantId,
                    'post_title' => $new_title . " has booked a Medical Protection on " . $formatted_date,
                ]);
            }
            $em_contacts[] = [
                "emergency_contact_name"  => sanitize_text_field($emergency_contact['name'] ?? ''),
                "emergency_contact_phone" => sanitize_text_field($emergency_contact['phoneNumber'] ?? ''),
            ];
        }
        update_field('emergency_contacts', $em_contacts, $applicantId);
    }

    $response['success'] = true;
    $response['message'] = "Contact info saved successfully.";
    wp_send_json($response);
}

add_action("wp_ajax_nopriv_" . $php_file_name, "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name, "cs_" . $php_file_name);
