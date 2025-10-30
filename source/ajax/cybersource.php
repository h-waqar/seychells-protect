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

    $booking_date = date('d M Y');
    $coverage_start = date('d M Y');
    $coverage_end = date('d M Y', strtotime("+{$days_dif} days"));

    $message = '
    <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#FFFFFF">
      <tbody>
        <tr>
          <td valign="top" bgcolor="#FFFFFF" width="100%">
            <table width="100%" role="content-container" align="center" cellpadding="0" cellspacing="0" border="0">
              <tbody>
                <tr>
                  <td width="100%">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tbody>
                        <tr>
                          <td>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:615px" align="center">
                              <tbody>
                                <tr>
                                  <td role="modules-container" style="padding:0;color:#000;text-align:left" bgcolor="#FFFFFF" width="100%" align="left">

                                    <table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="display:none!important;opacity:0;color:transparent;height:0;width:0">
                                      <tbody><tr><td role="module-content"><p>Thank you for purchasing Medical Protection with Seychelles Medical</p></td></tr></tbody>
                                    </table>

                                    <table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
                                      <tbody><tr><td style="font-size:6px;line-height:10px;padding:18px 0" valign="top" align="center">
                                        <img border="0" style="display:block;width:100%;height:auto" width="615" alt="Medical Protection" src="https://cdn.mcauto-images-production.sendgrid.net/2be3c6b0d2805038/1977b2b5-9a58-4053-a3a0-02d2b3c5d87c/550x64.jpg">
                                      </td></tr></tbody>
                                    </table>

                                    <table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
                                      <tbody><tr><td style="padding:18px 0;line-height:22px;text-align:center;background-color:#d2ebff" bgcolor="#d2ebff"><strong style="font-size:24px;color:#808080">CERTIFICATE OF MEDICAL PROTECTION</strong></td></tr></tbody>
                                    </table>

                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" bgcolor="#FFFFFF">
                                      <tbody>
                                        <tr>
                                          <td style="padding:18px 0" valign="top">
                                            <table width="297" align="left"><tbody><tr><td><p style="font-size:18px;color:#808080;font-family:arial,helvetica,sans-serif;">Dear Traveller,</p></td></tr></tbody></table>

                                            <table width="297" align="left"><tbody><tr><td><p style="font-size:18px;color:#808080;font-family:arial,helvetica,sans-serif;">Your Reference: <strong>' . $applicantId . '</strong></p></td></tr></tbody></table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>

                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" bgcolor="#FFFFFF">
                                      <tbody>
                                        <tr>
                                          <td style="padding:18px 0" valign="top">
                                            <table width="297" align="left"><tbody><tr><td><p style="font-size:18px;color:#808080;font-family:arial,helvetica,sans-serif;">Package: <strong>Essential Protection</strong></p></td></tr>
                                            <tr><td><p style="font-size:18px;color:#808080;font-family:arial,helvetica,sans-serif;">Coverage start date: <strong>' . $coverage_start . '</strong></p></td></tr></tbody></table>

                                            <table width="297" align="left"><tbody><tr><td><p style="font-size:18px;color:#808080;font-family:arial,helvetica,sans-serif;">Purchase amount: <strong>€' . $amount . '</strong></p></td></tr>
                                            <tr><td><p style="font-size:18px;color:#808080;font-family:arial,helvetica,sans-serif;">Coverage end date: <strong>' . $coverage_end . '</strong></p></td></tr></tbody></table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>

                                    <table width="100%" height="2px" style="line-height:2px;font-size:2px"><tbody><tr><td bgcolor="#d2ebff"></td></tr></tbody></table>

                                    <table role="module" border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td style="padding:18px 0;line-height:22px;text-align:left;font-family:arial,helvetica,sans-serif;color:#808080">
                                            <p style="font-size:18px;">Welcome to Seychelles Medical</p>
                                            <p style="font-size:18px;">Your 24/7 Private Medical Support</p>
                                            <p style="font-size:18px;">You are now fully covered with immediate access to world-class medical care, anytime, anywhere in Seychelles. Relax and enjoy your stay knowing that expert help is always a phone call away.</p>
                                            <p style="font-size:18px;">Here’s what your coverage includes:</p>
                                            <ul style="font-size:18px;color:#808080;">
                                              <li>24/7 direct access to our medical team</li>
                                              <li>Initial phone consultation with a qualified doctor</li>
                                              <li>Optional video consultations</li>
                                              <li>Hotel or villa visits when required</li>
                                              <li>Private medical consultations</li>
                                              <li>Assistance with medication refills</li>
                                            </ul>
                                            <p style="font-size:18px;">Contact Us:</p>
                                            <p style="font-size:18px;">Call or WhatsApp (24/7): <strong><a href="tel:+2482578899" style="color:#808080;text-decoration:none;">+248 257 8899</a></strong></p>
                                            <p style="font-size:18px;">Email: <a href="mailto:doctor@doctor247.sc" style="color:#808080;text-decoration:none;">doctor@doctor247.sc</a></p>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>

                                  </td>
                                </tr>
                              </tbody>
                            </table>

                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>';

    // Set headers for HTML
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: Visitseychellesislands <support@visitseychellesislands.com>'
    );

    wp_mail($customer_email, $subject, $message, $headers);
}




function sy_send_admin_confirmation_email($customer_email, $applicantId, $amount, $days_dif)
{
    if (SP_TESTING_ENV) {
        $admin_email = "youcanserve81@gmail.com";
    } else {
        $admin_email = "charlotte.hawkes@globaloceaninvest.com";
    }

    $subject = 'New Medical Protection Booking Received';

    $message = '
    <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#FFFFFF">
      <tr>
        <td valign="top" bgcolor="#FFFFFF" width="100%">
          <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="max-width:615px;margin:auto">
            <tr>
              <td style="padding:0;color:#000000;text-align:left" bgcolor="#FFFFFF" align="left">

                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed">
                  <tr>
                    <td style="padding:18px 0;text-align:center;background-color:#d2ebff;">
                      <span style="font-family:Arial,Helvetica,sans-serif;font-size:22px;color:#333;">
                        <strong>NEW MEDICAL PROTECTION BOOKING</strong>
                      </span>
                    </td>
                  </tr>
                </table>

                <table width="100%" cellpadding="10" cellspacing="0" border="0" style="table-layout:fixed;background-color:#FFFFFF;">
                  <tr>
                    <td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#555;">
                      <p style="margin:0 0 10px 0;">Hello Admin,</p>
                      <p style="margin:0 0 10px 0;">A new Medical Protection booking has been received from the website.</p>
                      <p style="margin:0 0 10px 0;">Here are the details:</p>

                      <table cellpadding="6" cellspacing="0" border="0" width="100%" style="border:1px solid #ddd;border-collapse:collapse;font-size:15px;color:#555;">
                        <tr style="background-color:#f7faff;">
                          <td style="border:1px solid #ddd;"><strong>Customer Email</strong></td>
                          <td style="border:1px solid #ddd;">' . esc_html($customer_email) . '</td>
                        </tr>
                        <tr>
                          <td style="border:1px solid #ddd;"><strong>Applicant ID</strong></td>
                          <td style="border:1px solid #ddd;">' . esc_html($applicantId) . '</td>
                        </tr>
                        <tr style="background-color:#f7faff;">
                          <td style="border:1px solid #ddd;"><strong>Booking Date</strong></td>
                          <td style="border:1px solid #ddd;">' . date('Y-m-d H:i:s') . '</td>
                        </tr>
                        <tr>
                          <td style="border:1px solid #ddd;"><strong>Protection Duration</strong></td>
                          <td style="border:1px solid #ddd;">' . esc_html($days_dif) . ' Days</td>
                        </tr>
                        <tr style="background-color:#f7faff;">
                          <td style="border:1px solid #ddd;"><strong>Total Amount</strong></td>
                          <td style="border:1px solid #ddd;">€' . esc_html($amount) . '</td>
                        </tr>
                      </table>

                      <p style="margin:15px 0 10px 0;">Please review this booking and take the necessary action.</p>
                      <p style="margin:0;">Best Regards,</p>
                      <p style="margin:0;"><strong>Visit Seychelles Islands Team</strong></p>
                    </td>
                  </tr>
                </table>

                <table width="100%" cellpadding="10" cellspacing="0" border="0" style="table-layout:fixed;margin-top:10px;">
                  <tr>
                    <td style="background-color:#d2ebff;text-align:center;font-family:Arial,Helvetica,sans-serif;color:#808080;font-size:14px;">
                      This email was generated automatically by the Visit Seychelles Medical System.
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    ';

    $headers = [];
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: Visit Seychelles Islands <support@visitseychellesislands.com>';

    // Send to main admin
    wp_mail($admin_email, $subject, $message, $headers);

    // Send a copy to finance (only in live mode)
    // if (!SP_TESTING_ENV) {
    //     $finance_email = "finance@seychellesmedicalservices.com";
    //     wp_mail($finance_email, $subject, $message, $headers);
    // }
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
