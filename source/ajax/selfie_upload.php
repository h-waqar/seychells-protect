<?php

$php_file_name = "selfie_upload_sy";

function cs_validate_selfie_sy($documentNumber, $selfie_url, $post_id)
{
  $response = [
    "status" => false,
    "message" => "", // Optional
  ];

  require_once SP_PLUGIN_BASEPATH . "source/php/pixlab.php";

  global $swift_helper_sy;
  $swift_helper_sy = new SwiftHelperSy();
  $passport_url =  $swift_helper_sy->get_passport_url($documentNumber, $post_id);

  /* API call */
  $pix = new Pixlab(SP_PIXLAB_API_KEY);

  if (
    !$pix->get("facecompare", [
      "src" => $selfie_url /* Passport scanned image */,
      "target" => $passport_url /* Type of document we are going to scan */,
    ])
  ) {

    $response['message'] =  $pix->get_error_message();
  }


  if ($pix->json->same_face == 1 || $pix->json->confidence > 0.8) {
    // return true;
    $response['status'] = true;
  } else {
    $response['status'] = false;
  }


  return $response;
}



function crop_image_sy($response)
{

  $croppedSelfies = [];
  $pixlab =  $response['pixlab'];
  $faces = $pixlab['faces'];
  $error = [];


  // Iterate through each element in the array
  foreach ($faces as $k => $v) {

    $imageUrl = $k;
    $imageDimentions = $v[0];


    $bottom = $imageDimentions->bottom;
    $right = $imageDimentions->right;
    $top = $imageDimentions->top;
    $left = $imageDimentions->left;

    // Complementary variables that we can use 
    $width = $imageDimentions->width;
    $height = $imageDimentions->height;
    // $face_id = $imageDimentions->face_id;

    // Get the filename from the URL
    $filename = basename($imageUrl);

    // Path to the original image
    $originalImagePath = SP_PLUGIN_BASEPATH  . "source/uploads/" . $filename;

    // Load the original image
    $originalImage = imagecreatefromjpeg($originalImagePath);
    // Get the dimensions of the original image
    $originalWidth = imagesx($originalImage);
    $originalHeight = imagesy($originalImage);




    // Create a new image for the cropped area
    $croppedImage = imagecrop($originalImage, [
      'x' => $left,
      'y' => $top,
      'width' => $width,
      'height' => $height
    ]);


    // Save or output the cropped image
    if ($croppedImage !== false) {
      // Specify the path to save the cropped image
      $croppedImagePath = SP_PLUGIN_BASEPATH  . "source/uploads/" . $filename;

      // Save the cropped image
      imagejpeg($croppedImage, $croppedImagePath);

      // Output the cropped image directly to the browser
      // header('Content-Type: image/jpeg');
      // imagejpeg($croppedImage);

      // Free up memory by destroying the image resources
      // imagedestroy($originalImage);
      // imagedestroy($croppedImage);

      // echo "<br> Cropped Image Url";
      $croppedImageUrl = PLUGIN_BASEURL_SY  . "source/uploads/" . $filename;

      $croppedSelfies[] =  $croppedImageUrl;
    } else {
      // Handle error if imagecrop fails
      $error[] = 'Image cropping failed.';
    }
  } // endforeach

  return
    $croppedSelfies;
}







function cs_selfie_upload_sy()
{


  $response = [
    "code" => 1,
    "success" => true,
  ];




  global $swift_helper_sy, $swift_pdf_sy;

  $documentNumber = $_POST['documentNumber'];
  $post_id = $_POST['applicantId'];
  $pdf_doc = false;


  $attachment_id =  cs_insert_selfie($_FILES, $post_id);



  // insert here actual selfie name

  if ($_FILES["selfieImg"]["type"] == 'application/pdf') {


    $response['pixlab'] = $swift_pdf_sy->handle_pdf_selfie($attachment_id);

    $response['pixlab']["faces"] = crop_image_sy($response);
    $response['pdf'] = true;
    $selfie_url = $response['pixlab']["faces"][0];
    $pdf_doc = true;
  } else {
    $selfie_url = wp_get_attachment_url($attachment_id);
  }


  // echo "<pre>";
  // print_r($documentNumber);
  // print_r($selfie_url);
  // print_r($post_id);

  // echo "</pre>";


  $selfie_validation_status = cs_validate_selfie_sy($documentNumber, $selfie_url, $post_id);

  if ($selfie_validation_status['status']) {
    /**
     * Face compare true
     */

    $swift_helper_sy->insert_selfie($attachment_id, $documentNumber, $post_id);
    $response['face_compare'] = true;
    $response['selfieUrl'] = $selfie_url;
  } else {

    $response['face_compare'] = false;
    $response['message'] = $selfie_validation_status['message'];

    /**
     * Delete the uploaded Selfie
     */

    $result = wp_delete_attachment($attachment_id, true);
    if ($result !== false) {
      // The attachment was successfully deleted
      $response['attachement'] = 'Attachment with ID ' . $attachment_id . ' has been deleted.';
    } else {
      // An error occurred while deleting the attachment
      $response['attachement'] = 'Error deleting attachment with ID ' . $attachment_id;
    }
  } // else ends

  // file handling code ends

  $response['acf_passport_info'] = $_POST['acf_passport_info'];
  $response['post_id'] = $_POST['post_id'];
  $response['documentNumber'] = $_POST['documentNumber'];

  die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
// }

add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);
