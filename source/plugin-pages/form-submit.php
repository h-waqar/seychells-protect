<?php

/**
 * Handle Form Submission
 */
// Introduction
$bs_first_name1 = isset($_POST['bs_first_name1']) ? $_POST['bs_first_name1'] : null;
$bs_last_name1 = isset($_POST['bs_last_name1']) ? $_POST['bs_last_name1'] : null;
$bs_dob = isset($_POST['bs_dob']) ? $_POST['bs_dob'] : null;
$bs_email = isset($_POST['bs_email']) ? $_POST['bs_email'] : null;
$payForTest = isset($_POST['payForTest']) ? $_POST['payForTest'] : null;
$unique_health_key = isset($_POST['unique_health_key']) ? $_POST['unique_health_key'] : null;

// Basic Information
$bs_radio_location_card = isset($_POST['bs_radio_location_card']) ? $_POST['bs_radio_location_card'] : null;
$bs_bi_first_name = isset($_POST['bs_bi_first_name']) ? $_POST['bs_bi_first_name'] : null;
//$bs_bi_mi = isset($_POST['bs_bi_mi']) ? $_POST['bs_bi_mi'] : null;
$bs_bi_last_name = isset($_POST['bs_bi_last_name']) ? $_POST['bs_bi_last_name'] : null;
$bs_bi_phone_number = isset($_POST['bs_bi_phone_number']) ? $_POST['bs_bi_phone_number'] : null;
$bs_bi_date_of_birth = isset($_POST['bs_bi_date_of_birth']) ? $_POST['bs_bi_date_of_birth'] : null;
$bs_bi_email_address = isset($_POST['bs_bi_email_address']) ? $_POST['bs_bi_email_address'] : null;
$bs_address_line_1 = isset($_POST['bs_address_line_1']) ? $_POST['bs_address_line_1'] : null;
$bs_address_line_2 = isset($_POST['bs_address_line_2']) ? $_POST['bs_address_line_2'] : null;
$bs_town_or_city = isset($_POST['bs_town_or_city']) ? $_POST['bs_town_or_city'] : null;
// $bs_country = isset($_POST['bs_country']) ? $_POST['bs_country'] : null;
$bs_post_code = isset($_POST['bs_post_code']) ? $_POST['bs_post_code'] : null;

// Your GP
// bs_checkbox_do_not_provide_info

$bs_checkbox_do_not_provide_info = isset($_POST['bs_checkbox_do_not_provide_info']) ? $_POST['bs_checkbox_do_not_provide_info'] : null;
$bs_gp_surgery = isset($_POST['bs_gp_surgery']) ? $_POST['bs_gp_surgery'] : null;
$gp_doctor_name = isset($_POST['gp_doctor_name']) ? $_POST['gp_doctor_name'] : null;
$gap_address_line_1 = isset($_POST['gp_address_line_1']) ? $_POST['gp_address_line_1'] : null;
$gp_address_line_2 = isset($_POST['gp_address_line_2']) ? $_POST['gp_address_line_2'] : null;
$gp_town_or_city = isset($_POST['gp_town_or_city']) ? $_POST['gp_town_or_city'] : null;
$gp_country = isset($_POST['gp_country']) ? $_POST['gp_country'] : null;

// Clinical Questions
$bs_test_reason = isset($_POST['bs_test_reason']) ? $_POST['bs_test_reason'] : null;
$bs_birth_sex = isset($_POST['bs_birth_sex']) ? $_POST['bs_birth_sex'] : null;

$bs_smoke_status = isset($_POST['bs_smoke_status']) ? $_POST['bs_smoke_status'] : null;

$bs_diagnosed_cancer = isset($_POST['bs_diagnosed_cancer']) ? $_POST['bs_diagnosed_cancer'] : null;
$bs_family_cancer_status = isset($_POST['bs_family_cancer_status']) ? $_POST['bs_family_cancer_status'] : null;

$bs_genetic_predisposition = isset($_POST['bs_genetic_predisposition']) ? $_POST['bs_genetic_predisposition'] : null;
$bs_genetic_predisposition_family = isset($_POST['bs_genetic_predisposition_family']) ? $_POST['bs_genetic_predisposition_family'] : null;

$bs_routine_screening = isset($_POST['bs_routine_screening']) ? $_POST['bs_routine_screening'] : null;

$stripe_payment_id = isset($_POST['bs_payment_id']) ? $_POST['bs_payment_id'] : null;

/**
 * Checkbox values
 */
$bs_best_test_situation = isset($_POST['bs_best_test_situation']) ? $_POST['bs_best_test_situation'] : null;
$bs_ethnicity = isset($_POST['bs_ethnicity']) ? $_POST['bs_ethnicity'] : null;
$bs_disease_status = isset($_POST['bs_disease_status']) ? $_POST['bs_disease_status'] : null;

$bs_best_test_situation = implode(", ", (array)$bs_best_test_situation);
$bs_ethnicity = implode(", ", (array)$bs_ethnicity);
$bs_disease_status = implode(", ", (array)$bs_disease_status);

// Rest of your code...






// ************* Field Name in ACF


$data = array(
    // Introduction
    'first_name' => $bs_first_name1,
    'last_name' => $bs_last_name1,
    'date_of_birth' => $bs_dob,
    'email_address' => $bs_email,
    'how_will_you_be_paying_for_the_test' => $payForTest,

    // Basic Information
    'where_will_you_have_your_blood_drawn' => $bs_radio_location_card,
    'first_name2' => $bs_bi_first_name,
    // 'mi' => $bs_bi_mi,
    'last_name2' => $bs_bi_last_name,
    'phone_number' => $bs_bi_phone_number,
    'date_of_birth_ddmmyyyy' => $bs_bi_date_of_birth,
    'personal_email_address' => $bs_bi_email_address,
    'address_line_1' => $bs_address_line_1,
    'address_line_2' => $bs_address_line_2,
    'town_or_city' => $bs_town_or_city,
    // 'country' => $bs_country,
    'post_code' => $bs_post_code,

    // GP
    'enter_your_gps_information' => $bs_checkbox_do_not_provide_info,
    'gp_surgery' => $bs_gp_surgery,
    'your_doctors_name' => $gp_doctor_name,
    'address_line_1_gp' => $gap_address_line_1,
    'address_line_2_gp' => $gp_address_line_2,
    'town_or_city_gp' => $gp_town_or_city,
    'country_gp' => $gp_country,

    // Clinical Questions
    'please_provide_your_main_reason_for_requesting_this_test' => $bs_test_reason,
    'please_choose_which_test_situation_best_applies_to_you' => $bs_best_test_situation,
    'what_is_your_sex_assigned_at_birth' => $bs_birth_sex,
    'what_is_your_ethnicity' => $bs_ethnicity,

    'have_you_ever_had_any_of_the_following' => $bs_disease_status,
    'are_you_a_current_or_former_smoker' => $bs_smoke_status,

    'have_you_ever_been_diagnosed_with_cancer' => $bs_diagnosed_cancer,
    'have_any_of_your_close_family_members_had_cancer_in_their_lifetime' => $bs_family_cancer_status,

    'do_you_have_an_identified_genetic_predisposition_to_cancer' => $bs_genetic_predisposition,
    'do_any_of_your_close_family_members_have_an_identified_genetic_predisposition_to_cancer' => $bs_genetic_predisposition,

    'how_often_do_you_have_routine_cancer_screening' => $bs_routine_screening,
    // 'what_type_of_colon_screening_have_you_had' => $bs_type_of_colon,
    'stripe_payment_id' => $stripe_payment_id,

);


// first_name

$title = "$bs_first_name1 $bs_last_name1 booked a test.";

$my_query = array(
    'post_title' => wp_strip_all_tags($title),
    'post_content' => "",
    'post_type' => 'booking',
    'post_name' => wp_strip_all_tags($title),
    'post_status' => 'publish',
    'post_author' => 1
);
// create custom post type and get post id
$post_id = wp_insert_post($my_query);

$form_success = false;
$error_message = null;

if (is_wp_error($post_id)) {
    // Error handling: The insertion failed, so handle the error.
    $error_message = $post_id->get_error_message();
    // You can log the error, display an error message, or take other actions.
    echo "<h1>Error: $error_message</h1>";
} else {
    // The insertion was successful.


    /**
     * Insert meta data into database
     */
    foreach ($data as $data_key => $data_value) {
        update_post_meta($post_id, $data_key, $data_value);
    }

    $form_success = true;

    // echo "Post ID: $post_id";






    /**
     ********************* Email to Customer Code Starts ***************************
     */
    

                $to = $bs_email;
	// testing email
//                 $to = "faheemh127@gmail.com";
                $subject = "Your CancerScan UK Test Request Received – Review in Progress";

                $message = "<p>Dear $bs_first_name1 $bs_last_name1</p>";
                $message .= "<p>Thank you for requesting the TruCheck cancer screening test with CancerScan UK. We have successfully received your request, and your payment of £1190 has been processed.</p>";
                $message .= "<p><b>Request Details:</b></p>";
                $message .= "<ul>";
                $message .= "<li><b>Request Id:</b> $post_id</li>";
                $message .= "<li><b>Test Type:</b> TruCheck Intelli – A single test for detecting 70 types of cancers</li>";
                $message .= "</ul>";
                $message .= "<p><b>What Happens Next:</b></p>";
                $message .= "<p><b>1.Review Process:</b> Our team will carefully review your request within the next 3 business days to ensure that our test is suitable for you.</p>";
                $message .= "<p><b> 2. Approval Notification:</b>  Upon approval, we will contact you directly to coordinate the appointment for the blood draw.</p>";
                $message .= "<p><b>3. Refund Policy (If Applicable):</b> If your request is not approved, we will initiate a refund within 30 days of the decision.</p>";
                $message .= "<p>Your trust in CancerScan UK is highly valued, and we're committed to providing a seamless experience tailored to your needs. While we conduct our review, please feel free to reach out with any questions or concerns at help@cancerscanuk.co.uk.</p>";
                $message .= "<p>We look forward to potentially serving you and assisting you in taking control of your health.</p>";
                $message .= "<p>Best regards,</p>";
                $message .= "<p>The CancerScan UK Team</p>";
                $message .= "<img src='https://cancerscanuk.co.uk/wp-content/uploads/2023/06/Cancer-UK-Favicon-01.png'/>";
                
                $headers = array('Content-Type: text/html; charset=UTF-8', 'From: Your Appointment on cancerscanuk.co.uk <help@cancerscanuk.co.uk>');
                wp_mail($to, $subject, $message, $headers);

                // send email to admin as well
                $to = "help@cancerscanuk.co.uk";
                $subject = "New CancerScan UK Test Request Received – Please Review it";
                $headers = array('Content-Type: text/html; charset=UTF-8', 'From: New Appointment on cancerscanuk.co.uk <help@cancerscanuk.co.uk>');

                wp_mail($to, $subject, $message, $headers);


                
                /**
                 *********************** Email to Customers Part Ends ************************
                 */



} // success (else parts) ends
