<?php
$php_file_name = "cybersource_sy";

function sp_get_days($start_date, $end_date)
{
    $start_timestamp = strtotime($start_date);
    $end_timestamp = strtotime($end_date);
    $difference = $end_timestamp - $start_timestamp;
    $days_difference = floor($difference / (60 * 60 * 24));
    return $days_difference;
}

function sy_send_customer_confirmation_email($customer_email, $applicantId, $amount, $days_dif)
{
    $subject = 'Medical Protection Booking Confirmation';
    $message = 'Dear Customer,
                Thank you for booking medical protection. Your booking has been successfully received.
                Details:
                - Email: ' . $customer_email . '
                - Booking Date: ' . date('Y-m-d H:i:s') . '
                - Protection Days: ' . $days_dif . '
                - Total Amount: €' . $amount . '
                We appreciate your trust in our services.
                Best regards,
                Visitseychellesislands';
    $headers[] = 'Content-Type: text/plain; charset=UTF-8';
    $headers[] = 'From: Visitseychellesislands <support@visitseychellesislands.com>';
    wp_mail($customer_email, $subject, $message, $headers);
}

function sy_send_admin_confirmation_email($customer_email, $applicantId, $amount, $days_dif)
{
    if (SP_TESTING_ENV) {
        $admin_email = "youcanserve81@gmail.com";
    } else {
        $admin_email = "charlotte.hawkes@globaloceaninvest.com";
    }
    $subject = 'New Medical Protection Booking';
    $message = 'Hello Admin,
                A new medical protection booking has been received.
                Details:
                - Customer Email: ' . $customer_email . '
                - Booking Date: ' . date('Y-m-d H:i:s') . '
                - Protection Days: ' . $days_dif . '
                - Total Amount: €' . $amount . '
                Please take necessary actions.
                Best regards,
                Visitseychellesislands';
    $headers[] = 'Content-Type: text/plain; charset=UTF-8';
    $headers[] = 'From: Visitseychellesislands <support@visitseychellesislands.com>';
    wp_mail($admin_email, $subject, $message, $headers);

    if (!SP_TESTING_ENV) {
        $admin_email = "finance@seychellesmedicalservices.com";
        wp_mail($admin_email, $subject, $message, $headers);
    }
}

function cs_cybersource_sy()
{
    $response = [
        "success" => false,
        "message" => "Payment processing failed."
    ];

    // Get token
    $transientTokenJwt = sanitize_text_field($_POST['cybs_token'] ?? '');
    if (empty($transientTokenJwt)) {
        $response['message'] = "Payment token is missing.";
        die(json_encode($response));
    }

    // Get amount - FIXED: Now dynamic from form data
    $amount = !empty($_POST['dynamic_amount']) 
        ? floatval(str_replace(['€', '$', ','], '', $_POST['dynamic_amount'])) 
        : 0;
    
    if ($amount <= 0) {
        $response['message'] = "Invalid payment amount.";
        die(json_encode($response));
    }

    $currency = SP_BOOKING_CURRENCY_CODE;

    // Get email for post creation
    $email = !empty($_POST['dynamic_email']) 
        ? sanitize_email($_POST['dynamic_email']) 
        : 'noemail@example.com';

    // Prepare billing details - FIXED: Now dynamic from form
    $billingDetails = [
        "firstName"          => !empty($_POST['proceed_first_name']) 
            ? sanitize_text_field($_POST['proceed_first_name']) 
            : sanitize_text_field($_POST['dynamic_firstName'] ?? 'John'),
        
        "lastName"           => !empty($_POST['proceed_last_name']) 
            ? sanitize_text_field($_POST['proceed_last_name']) 
            : sanitize_text_field($_POST['dynamic_lastName'] ?? 'Doe'),
        
        "address1"           => !empty($_POST['dynamic_address_in_seychelles']) 
            ? sanitize_text_field($_POST['dynamic_address_in_seychelles']) 
            : 'N/A',
        
        "locality"           => !empty($_POST['proceed_your_city']) 
            ? sanitize_text_field($_POST['proceed_your_city']) 
            : sanitize_text_field($_POST['dynamic_your_city'] ?? 'Victoria'),
        
        "administrativeArea" => !empty($_POST['proceed_your_state']) 
            ? sanitize_text_field($_POST['proceed_your_state']) 
            : sanitize_text_field($_POST['dynamic_your_state'] ?? 'Mahe'),
        
        "postalCode"         => !empty($_POST['proceed_postal_code']) 
            ? sanitize_text_field($_POST['proceed_postal_code']) 
            : sanitize_text_field($_POST['dynamic_postal_code'] ?? '00000'),
        
        "country"            => !empty($_POST['dynamic_country']) 
            ? sanitize_text_field($_POST['dynamic_country']) 
            : 'SC',
        
        "email"              => $email,
    ];

    // Log for debugging
    error_log("CyberSource Payment - Amount: $amount, Email: $email");
    error_log("Billing Details: " . print_r($billingDetails, true));

    // Instantiate the CyberSource client
    $client = new Sdv_CyberSource_Client();

    try {
        $payment_response = $client->create_payment($amount, $currency, $transientTokenJwt, $billingDetails);
 
        if (is_wp_error($payment_response)) {
            $response['message'] = $payment_response->get_error_message();
            error_log("CyberSource Error: " . $response['message']);
        } elseif (isset($payment_response['json']['status']) && $payment_response['json']['status'] === 'AUTHORIZED') {
            $response['success'] = true;
            $response['message'] = "Payment processed successfully!";

            // Create WordPress post
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
            update_field("phone_number", sanitize_text_field($_POST['dynamic_phone_number'] ?? ''), $post_id);
            update_field("email", $email, $post_id);

            // Emergency Contacts - FIXED: Match the data structure from getAllFormData
            if (isset($_POST['dynamic_applicants']) && is_array($_POST['dynamic_applicants'])) {
                $applicants_data = [];
                foreach ($_POST['dynamic_applicants'] as $applicant) {
                    $applicants_data[] = [
                        "emergency_contact_name" => sanitize_text_field($applicant['name'] ?? ''),
                        "emergency_contact_dob" => sanitize_text_field($applicant['dob'] ?? ''),
                    ];
                }
                update_field("emergency_contacts", $applicants_data, $post_id);
                error_log("Emergency Contacts Saved: " . print_r($applicants_data, true));
            }

            // Trip Information
            update_field("arrival_date", sanitize_text_field($_POST['dynamic_arrival_date'] ?? ''), $post_id);
            update_field("departure_date", sanitize_text_field($_POST['dynamic_departure_date'] ?? ''), $post_id);
            update_field("home_address", sanitize_text_field($_POST['dynamic_address_in_seychelles'] ?? ''), $post_id);

            // Medical Protection
            $medicalProtection = sanitize_text_field($_POST["dynamic_medical_protection"] ?? 'basic_protection');
            $protection = ($medicalProtection == "total_protection") ? "Total Protection" : "Basic Protection";
            update_field("medical_protection", $protection, $post_id);
            
            // Amount
            update_field("amount", $amount, $post_id);

            // Payment ID
            $paymentId = $payment_response['json']['id'] ?? 'N/A';
            update_field("payment_id", $paymentId, $post_id);

            $response['post_id'] = $post_id;

            // Send confirmation emails
            $customer_email = get_field('email', $post_id, false);
            $start_date = get_field('arrival_date', $post_id, false);
            $end_date = get_field('departure_date', $post_id, false);
            $days_dif = sp_get_days($start_date, $end_date);

            sy_send_customer_confirmation_email($customer_email, $post_id, $amount, $days_dif);
            sy_send_admin_confirmation_email($customer_email, $post_id, $amount, $days_dif);

            error_log("Booking created successfully. Post ID: $post_id");

        } else {
            $response['message'] = $payment_response['json']['reason'] ?? "Payment not authorized.";
            error_log("Payment not authorized: " . $response['message']);
        }
    } catch (Exception $e) {
        error_log("Cybersource Payment Exception: " . $e->getMessage());
        $response['message'] = "An unexpected error occurred during payment processing.";
    }

    die(json_encode($response));
}

add_action("wp_ajax_nopriv_" . $php_file_name, "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name, "cs_" . $php_file_name);