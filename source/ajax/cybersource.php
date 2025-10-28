<?php

$php_file_name = "cybersource_sy";

function sp_get_days($start_date, $end_date)

{

	// Convert date strings to timestamps

	$start_timestamp = strtotime($start_date);

	$end_timestamp = strtotime($end_date);

	// Calculate the difference in seconds

	$difference = $end_timestamp - $start_timestamp;

	// Convert seconds to days

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

	// $admin_email = "charlotte.hawkes@globaloceaninvest.com"; // Origional Admin Email

	// $admin_email = "faheemh127@gmail.com"; // Origional Admin Email

	if (SP_TESTING_ENV) {

		$admin_email = "youcanserve81@gmail.com"; // Origional Admin Email

	} else {

		// $admin_email = "youcanserve81@gmail.com"; // Origional Admin Email

		$admin_email = "charlotte.hawkes@globaloceaninvest.com"; // Origional Admin Email

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

		// you can send another email to testing env

		// $admin_email = "youcanserve81@gmail.com"; // Origional Admin Email

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



	$applicantId = htmlspecialchars($_POST['dynamic_applicantId'], ENT_QUOTES, 'UTF-8'); // Get applicantId from dynamic field

	$transientTokenJwt = sanitize_text_field($_POST['cybs_token']);

	// $amount = floatval($_POST["dynamic_amount"]); // Get amount from dynamic field

	$amount = 54.9;


	$currency = SP_BOOKING_CURRENCY_CODE; // Assuming this constant is defined



	// Prepare billing details from POST data

	// $billingDetails = [

	// 	"firstName" => sanitize_text_field($_POST['dynamic_firstName']),

	// 	"lastName" => sanitize_text_field($_POST['dynamic_lastName']),

	// 	"address1" => sanitize_text_field($_POST['dynamic_address_in_seychelles']),

	// 	"locality" => sanitize_text_field($_POST['dynamic_your_city']),

	// 	"administrativeArea" => sanitize_text_field($_POST['dynamic_your_state']),

	// 	"postalCode" => sanitize_text_field($_POST['dynamic_postal_code']),

	// 	"country" => sanitize_text_field($_POST['dynamic_country']),

	// 	"email" => sanitize_email($_POST['dynamic_email']),

	// ];


	// Prepare billing details (with guaranteed fallbacks)
	$billingDetails = [
		"firstName"          => !empty($_POST['dynamic_firstName']) ? sanitize_text_field($_POST['dynamic_firstName']) : 'John',
		"lastName"           => !empty($_POST['dynamic_lastName']) ? sanitize_text_field($_POST['dynamic_lastName']) : 'Doe',
		"address1"           => !empty($_POST['dynamic_address_in_seychelles']) ? sanitize_text_field($_POST['dynamic_address_in_seychelles']) : 'Test Street 123',
		"locality"           => !empty($_POST['dynamic_your_city']) ? sanitize_text_field($_POST['dynamic_your_city']) : 'Victoria',
		"administrativeArea" => !empty($_POST['dynamic_your_state']) ? sanitize_text_field($_POST['dynamic_your_state']) : 'Mahe',
		"postalCode"         => !empty($_POST['dynamic_postal_code']) ? sanitize_text_field($_POST['dynamic_postal_code']) : '00000',
		"country"            => !empty($_POST['dynamic_country']) ? sanitize_text_field($_POST['dynamic_country']) : 'SC',
		"email"              => !empty($_POST['dynamic_email']) ? sanitize_email($_POST['dynamic_email']) : 'testuser@example.com',
	];





	// Instantiate the new CyberSource client

	$client = new Sdv_CyberSource_Client();



	try {

		$payment_response = $client->create_payment($amount, $currency, $transientTokenJwt, $billingDetails);



		if (is_wp_error($payment_response)) {

			$response['message'] = $payment_response->get_error_message();

		} elseif (isset($payment_response['json']['status']) && $payment_response['json']['status'] === 'AUTHORIZED') {

			$response['success'] = true;

			$response['message'] = "Payment processed successfully!";



			// --- Start: Logic moved from cs_save_booking_sy ---

			$email = sanitize_email($_POST['dynamic_email']);



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

			update_field("phone_number", sanitize_text_field($_POST['dynamic_phone_number']), $post_id);

			update_field("email", $email, $post_id);



			if (isset($_POST['dynamic_applicants']) && is_array($_POST['dynamic_applicants'])) {

				$applicants_data = [];

				foreach ($_POST['dynamic_applicants'] as $applicant) {

					$applicants_data[] = [

						"emergency_contact_name" => sanitize_text_field($applicant['emergency_contact_name']),

						"emergency_contact_dob" => sanitize_text_field($applicant['emergency_contact_dob']),

					];

				}

				update_field("emergency_contacts", $applicants_data, $post_id);

			}



			// Trip Information

			update_field("arrival_date", sanitize_text_field($_POST['dynamic_arrival_date']), $post_id);

			update_field("departure_date", sanitize_text_field($_POST['dynamic_departure_date']), $post_id);

			update_field("home_address", sanitize_text_field($_POST['dynamic_address_in_seychelles']), $post_id);



			// Medical Protection

			update_field("medical_protection", sanitize_text_field($_POST['dynamic_medical_protection']), $post_id);

			update_field("amount", sanitize_text_field($_POST['dynamic_amount']), $post_id);



			$response['post_id'] = $post_id;

			// --- End: Logic moved from cs_save_booking_sy ---



			// --- Existing Post-Payment Actions (after successful booking) ---

			$paymentId = $payment_response['json']['id'] ?? 'N/A'; // Use the actual payment ID from response

			$medicalProtection = htmlspecialchars($_POST["dynamic_medical_protection"]);

			$amount = htmlspecialchars($_POST["dynamic_amount"]);



			if ($medicalProtection == "total_protection") {

				$protection = "Total Protection";

			} else {

				$protection = "Basic Protection";

			}



			update_field("payment_id", $paymentId, $post_id); // Use $post_id here

			update_field("medical_protection", $protection, $post_id); // Use $post_id here

			update_field("amount", $amount, $post_id); // Use $post_id here



			$customer_email = get_field('email', $post_id, false); // Use $post_id here

			$start_date =  get_field('arrival_date', $post_id, false); // Use $post_id here

			$end_date = get_field('departure_date', $post_id, false); // Use $post_id here

			$days_dif = sp_get_days($start_date, $end_date);



			sy_send_customer_confirmation_email($customer_email, $post_id, $amount, $days_dif); // Use $post_id here

			sy_send_admin_confirmation_email($customer_email, $post_id, $amount, $days_dif); // Use $post_id here

			// Extra Steps Ends



		} else {

			$response['message'] = $payment_response['json']['reason'] ?? "Payment not authorized.";

		}

	} catch (Exception $e) {

		error_log("Cybersource Payment Exception: " . $e->getMessage());

		$response['message'] = "An unexpected error occurred during payment processing.";

	}



	die(json_encode($response));

}



add_action("wp_ajax_nopriv_" . $php_file_name, "cs_" . $php_file_name);

add_action("wp_ajax_" . $php_file_name, "cs_" . $php_file_name);

