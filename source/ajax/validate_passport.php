<?php

$php_file_name = "validate_passport_sy";

function cs_verify_passport_sy($fileUrl)
{
	$response                = [];
	$response['error']       = null;
	$_POST['passport_error'] = null;
	require_once SP_PLUGIN_BASEPATH . "source/php/pixlab.php";


	/* Process */
	$pix = new Pixlab(SP_PIXLAB_API_KEY);
	if (
		!$pix->get("docscan", [
			"img"  => $fileUrl /* Passport scanned image */,
			"type" => "passport" /* Type of document we are going to scan */,
		])
	) {

		$response['error']       = $pix->get_error_message() . "\n";
		$_POST['passport_error'] = $pix->get_error_message() . "\n";
	}

	$response['passport_data'] = $pix->json;

	return $response;
}



function mp_update_post_title($post_id, $passport_name)
{

	// Here we have to make the post title 
	// Assuming $post_id contains the ID of the post you want to update
	$new_title = "$passport_name has a new booking scheduled for " . date("Y-m-d");

	// Create an array with the updated post data
	$post_data = array(
		'ID' => $post_id,
		'post_title' => $new_title,
	);

	// Update the post in the database
	wp_update_post($post_data);
}

function cs_validate_passport_sy()
{
	global $swift_helper_sy, $swift_pdf_sy;
	$response = [
		"code"          => 1,
		"success"       => true,
		'record_exists' => false,
	];


	if (
		isset($_FILES["passportImg"]) &&
		$_FILES["passportImg"]["error"] === UPLOAD_ERR_OK
	) {


		if ($_FILES["passportImg"]["type"] == 'application/pdf') {
			// Handle PDF
			$api_response  = $swift_pdf_sy->handle_pdf_passport();
			$passportUrl   = $api_response['passport_url'];
			$attachment_id = $swift_helper_sy->insert_passport_image($_FILES);
		} else {
			$attachment_id = $swift_helper_sy->insert_passport_image($_FILES);
			$passportUrl   = wp_get_attachment_url($attachment_id);
			$api_response  = cs_verify_passport_sy($passportUrl);
		}


		if ($swift_helper_sy->is_passport_valid($api_response)) {
			$resp                        = $api_response['passport_data'];
			$response['data']            = $api_response['passport_data'];
			$documentNumber              = $resp->fields->documentNumber;
			$response['passport_status'] = true;
			$response['success']         = 1;
			$response['passportUrl']     = htmlspecialchars_decode($passportUrl);


			if ($_POST['applicationSingle'] == "false") {
				/**
				 * Multiple Passport Upload is active
				 */






				$post_id = $_POST['postId'];

				mp_update_post_title($post_id, $resp->fields->fullName);
			} else {


				/**
				 * Single Passport Upload
				 */

				$post_title = $resp->fields->fullName . " has a new booking scheduled for " . date('Y-m-d');
				$post_id    = wp_insert_post([
					"post_title"   => $post_title,
					"post_content" => "",
					"post_type"    => "protection", // Specify the custom post type here
					"post_status"  => "private",
				]);

				// $response['user_id'] =  generate_unique_key_and_store($post_id);
				$response['user_id'] = $post_id;
				update_field('applicant_country', $_POST['country'], $post_id);
				$response['success'] = 1;
			} // singlePassport Else Ends


			if ($swift_helper_sy->isPastDate($resp->fields->dateOfExpiry)) {
				$response['success'] = false;


				$response['message'] = "Your passport has expired. Please upload a valid passport.";
				die(json_encode($response));
			}






			// New Code to insert new acf row started

			$current_data = get_field('acf_passport_info', $post_id);
			$new_record   = array(
				"acf_full_name"       => $resp->fields->fullName,
				'acf_image_link'      => $resp->mrz_img_url,
				'acf_document_number' => $resp->fields->documentNumber,
				'acf_issuing_country' => $resp->fields->issuingCountry,
				'acf_nationality'     => $resp->fields->nationality,
				'acf_date_of_birth'   => $resp->fields->dateOfBirth,
				'acf_date_of_expiry'  => $resp->fields->dateOfExpiry,
				'personal_number'     => $resp->fields->personalNumber,
				'mrz_raw_text'        => $resp->mrz_raw_text,
				'passport_url'        => $passportUrl
			);

			$document_number_to_update = $resp->fields->documentNumber;
			$record_updated            = false;

			foreach ($current_data as $key => $record) {
				if ($record['acf_document_number'] == $document_number_to_update) {
					// Update the existing record
					$current_data[$key]      = $new_record;
					$record_updated            = true;
					$response['record_exists'] = true;
					break;
				}
			}

			if (!$record_updated) {
				// If the document number doesn't exist, add a new record
				$current_data[] = $new_record;
			}

			update_field('acf_passport_info', $current_data, $post_id);


			// New Code Ended

			$swift_helper_sy->insert_passport_to_acf($post_id, $documentNumber, $attachment_id);
		} else {


			/**
			 * Passport is invalid
			 */

			// Failed to move the file

			$response['passport_status'] = false;
			$response['success']         = false;


			$response['message'] = $_POST['passport_error'];
			/**
			 * Delete the attachement becuase passport was not valid
			 */
			// Delete the attachment
			$result = wp_delete_attachment($attachment_id, true);
			if ($result !== false) {
				// The attachment was successfully deleted
				$response['attachement'] = 'Attachment with ID ' . $attachment_id . ' has been deleted.';
			} else {
				// An error occurred while deleting the attachment
				$response['attachement'] = 'Error deleting attachment with ID ' . $attachment_id;
			}
		}
	} else {

		/**
		 * No File Uploaded
		 */
		$response['success'] = false;
		$response['message'] = "No file uploaded or an error occurred.";
	}


	// file handling code ends
	die(json_encode($response));
} // main function ends
/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);
