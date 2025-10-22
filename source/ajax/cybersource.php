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

		"success" => true,

	];

	$applicantId = htmlspecialchars($_POST['applicantId'], ENT_QUOTES, 'UTF-8');

	require_once(SP_PLUGIN_BASEPATH . "source/lib/cybersource/cybersource.php");





	if (SP_TESTING_ENV) {

		$request = new CyberSource("caliphsoft_web_test", "Q1zcCMzFHm0QjOSDQmfsECLQpP9V7AqfFcEkb761HZiruMA+PmiotFHSIEKl1om0JqYNJsa0MbvBuy9Pxoua6fFT1YKPlZ/xiLTjTj1Aie1nskvTlSudxD5eIA3MuenEVlhmuQ9+PKoBvQCRHSZZ4187cAPmI8qk5we5WaHnUm9nhI6xsDHBLgUvy57R8DAg1tvdeaEyORMC5pYpiHKrPOA/E+FQovRapllEgZiuEeI3BnxsscSrHVmdsmDHHXYDuG77JGIU4Zb8VRDnu3hq4kBLlkoNO+st9+zZx0cyM7P0P57lc4DMkvY07+wjFK7clG9qxl4K2r6SbrM4xl+trA==", "Test");

		// 5555555555554444

		// mastercard

	} else {





		// sms own

		// $request = new CyberSource("absa_seytravel_eur_0981357", "RfeC/KdTJd0dIrfC9X792iF5k6yd7NiV3c57vfFdqZHQiOm4CDO6gvQJENyeD4kwJVVKUMyvBOBL56n0AUc/JUF1xKfD0b1DI/d2EZ/wZxbJQ6QsI0M8rTiUPXazI6ZPSEmWyRNh61UkJJQc8aw6Mh9RILz6MRdd9+U9xS5IcreGqfjAzMHgaXgK8vOzxL6lBejeIkCGBGGz4k07hwhOVOR8oFVn/QuFaAAbNzXqHdbeqkB49UuOYFmtsEahpqtXgq79DPNrv/PO7WF4In29J3HhhRIggJfCJs3dr/moT5+IMURMgVGbQeKLqeEGIis69rEVOY8KeEgRnpikPSBWMA==", "Live");

		// keys from wheelswander plugin

		// $request = new CyberSource("absa_seytravel_eur_0981357", "jpwlcXvYQ0qlY0j8qqgYHIBDsqKyODJLB/zZg3Z61+Tpj5yG2rzNuKjnAnKiSYQ34J99B6xogm12uxYZAlrobUiSZ3X/26x5ll5kYqMWbsRWaMS78ShJTJIK5v/6+MjDuV4y/V53aYsthV2JGzWkPWx8SKQPr/pYmaddifG482SC+EY6iLyvcn7nSm6/2XiNRwdurvrmPzEImT8OGGukDxGAXVSbZ3Pfh5PtcFjzZVx0Rt8ms7qFOdalFkVZ684tfS3Nlk1d15vdQjV6odLuWmKFKYUpBrZXf4Q/v5DCj/h0/89it3Emerfui9mjix2y8kpTEV9sCsYw7Rkf6jeFvw==", "Live");

		$request = new CyberSource("absa_seytravel_eur_0981357", "geyjU8HpUTYxthFqCaEIXF14/6+336dvZNzNda0LUQObwy28UtM97lgODPiwM/dhe66Ycry6OWiOxQ+cAQe8K8Os2/03UUOOISxQq6m+9Olko+Djoe1jqYi+QdZoT7YEMXm4nYzd6YR8vLMEsxza1IMbhF/hyBOIFmnTgOkd1QA1JSGgkhpt2EP1oaIYfmKC/CIuXWsiKOp9SOAXIdTMsLm3nLAwIY6IhCmqBVUCQYf4qquULJju1f1439I13OwNZ75V5xoi42Jhyca5vLoQ725TqSSfo5/sEljJG10SUB+vy+qYcG1mPR/nd8edYZEqZlMaE+nSHDcGVUsQRhil3g==", "Live");

	}

	// @todo Remove Caliphsoft keys

	$request->reference_code = "Order-" . @$_POST['applicantId'];

	$billTo             = new stdClass();

	$billTo->firstName  = @$_POST['data']['firstName'];

	$billTo->lastName   = @$_POST['data']["lastName"];

	$billTo->street1    = @$_POST['data']["street1"];

	$billTo->city       = @$_POST['data']["city"];

	$billTo->state      = @$_POST['data']["state"];

	$billTo->postalCode = @$_POST['data']["postalCode"];

	$billTo->country    = trim(@$_POST['data']["country"]);

	$billTo->email      = @$_POST['data']["email"];

	$billTo->ipAddress  = $_SERVER['REMOTE_ADDR'];

	$card                  = new stdClass();

	$card->accountNumber   = @$_POST['data']["cardNumber"];

	$card->fullName        = @$_POST['data']["cardHolderName"];

	$card->expirationMonth = @$_POST['data']["cardExpMonth"];

	$card->expirationYear  = @$_POST['data']["cardExpYear"];

	$card->cvNumber          = @$_POST['data']["cardCvv"];

	$card->cardType        = @$request->card_types[@$_POST['data']["cardType"]];

	$request->billTo = $billTo;

	$request->card   = $card;

	try {

		//$request->charge(1);

		$request->charge(@$_POST["amount"]);

	} catch (Exception $exp) {

		error_log("Cybersource Exception" . $exp);

		$response['error'] = $exp->getMessage();

	}

	if ($request->response && $request->response->resMessage) {

		if (!$request->response->success) {

			// error Message

			$response['success'] = false;

			$response['message'] = $request->response->resMessage;

		} else {

			$response['success'] = true;

			$response['message'] = "Payment processed";

			// Some Further Steps after payment processed

			$paymentId = $request->response->requestID;

			$medicalProtection = htmlspecialchars($_POST["data"]['medical_protection']);

			$amount = htmlspecialchars($_POST["data"]['amount']);

			if ($medicalProtection == "total_protection") {

				$protection = "Total Protection";

			} else {

				$protection = "Basic Protection";

			}

			update_field("payment_id", $paymentId, $applicantId);

			update_field("medical_protection", $protection, $applicantId);

			update_field("amount", $amount, $applicantId);

			$customer_email = get_field('email', $applicantId, false);

			$start_date =  get_field('arrival_date', $applicantId, false);

			$end_date = get_field('departure_date', $applicantId, false);

			$days_dif = sp_get_days($start_date, $end_date);

			sy_send_customer_confirmation_email($customer_email, $applicantId, $amount, $days_dif);

			sy_send_admin_confirmation_email($customer_email, $applicantId, $amount, $days_dif);

			// Extra Steps Ends

		}

	}

	die(json_encode($response));

}



add_action("wp_ajax_nopriv_" . $php_file_name, "cs_" . $php_file_name);

add_action("wp_ajax_" . $php_file_name, "cs_" . $php_file_name);

