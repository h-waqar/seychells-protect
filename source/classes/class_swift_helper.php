<?php
class SwiftHelperSy
{
    public $post_id = null;
    public $passport_repeater = "acf_passport_info";
    public $field_document_number = "acf_document_number";
    public function __construct()
    {
    }
    function del_passport($document_number, $post_id)
    {
        // Load the repeater field data
        $passports = get_field($this->passport_repeater, $post_id);
        $status = false;
        if (is_array($passports)) {
            foreach ($passports as $index => $passport) {
                if ($passport[$this->field_document_number] === $document_number) {
                    // Remove the matching row
                    unset($passports[$index]);
                    // Update the repeater field with the modified data
                    update_field($this->passport_repeater, array_values($passports), $post_id);
                    $status = true;
                    break;
                }
            }
        }
        return $status;
    }
    // public function passport_url($document_number, $post_id)
    // {
    //     $passport_url = "";
    //     $existing_repeater_data = get_field("acf_passport_info", $post_id);
    //     foreach ($existing_repeater_data as $key => $row) {
    //         if ($row['acf_document_number'] === $document_number) {
    //             // Update the sub-field within this row.
    //             $passport_url =  $existing_repeater_data[$key]['selfie_link'];
    //         }
    //     }
    // }
    public function insert_passport_to_acf($post_id, $document_number, $attach_id)
    {
        $existing_repeater_data = get_field("acf_passport_info", $post_id);
        foreach ($existing_repeater_data as $key => $row) {
            if ($row['acf_document_number'] === $document_number) {
                // Update the sub-field within this row.
                $existing_repeater_data[$key]['passport_file'] = $attach_id;
            }
        }
        update_field("acf_passport_info", $existing_repeater_data, $post_id);
    }
    public function insert_passport_image($files)
    {
        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php');
        foreach ($files as $file) {
            if ($file['name']) {
                $myFile = array(
                    'name'     => $file['name'],
                    'type'     => $file['type'],
                    'tmp_name' => $file['tmp_name'],
                    'error'    => $file['error'],
                    'size'     => $file['size']
                );
                $upload_overrides = array('test_form' => false);
                $upload = wp_handle_upload($myFile, $upload_overrides);
                $filename = $upload['file'];
                $parent_post_id = 0;
                $filetype = wp_check_filetype(basename($filename), null);
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid'           => $wp_upload_dir['url'] . '/' . basename($filename),
                    'post_mime_type' => $filetype['type'],
                    'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );
                $attach_id = wp_insert_attachment($attachment, $filename, $parent_post_id);
                $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
                wp_update_attachment_metadata($attach_id, $attach_data);
                // echo "Reaching upto here";
            }
        } // foreach ends
        return $attach_id;
    }
    public function insert_selfie($attachment_id, $document_number, $post_id)
    {
        $existing_repeater_data = get_field("acf_passport_info", $post_id);
        foreach ($existing_repeater_data as $key => $row) {
            if ($row['acf_document_number'] === $document_number) {
                // Update the sub-field within this row.
                $existing_repeater_data[$key]['selfie_link'] = $attachment_id;
            }
        }
        update_field("acf_passport_info", $existing_repeater_data, $post_id);
    }
    public function get_passport_url($documentNumber, $post_id)
    {
        $repeaterfield = "acf_passport_info"; // Replace with the name of your repeater field
        $passport_url = null;
        $existing_repeater_data = get_field($repeaterfield, $post_id);
        // @todo remove this testing line below
        $_POST['acf_passport_info'] = $existing_repeater_data;
        $_POST['post_id'] = $post_id;
        $_POST['documentNumber'] = $documentNumber;

        if ($existing_repeater_data) {
            foreach ($existing_repeater_data as $key => $row) {
                if ($row['acf_document_number'] === $documentNumber) {
                    // Match found; you can access the data in this row
                    // $passport_url = $row['passport_file']['url'];
                    if (isset($row['passport_url'])) {
                        $passport_url = $row['passport_url'];
                    }
                    // Do something with $selfie_link
                    break; // Exit the loop, assuming each document number is unique
                }
            }
        }
        return $passport_url;
    }

    public function create_post_type()
    {
        // @todo type here the Post Name as a passport
        $title = "New Registration " . date('Y-m-d');
        $post_id = wp_insert_post([
            "post_title" => "$title",
            "post_content" => "",
            "post_type" => "protection", // Specify the custom post type here
            "post_status" => "private",
        ]);
        return $post_id;
    }
    function insert_health_symptom($documentNumber, $health_symptoms, $post_id)
    {
        $existing_repeater_data = get_field("health_declaration", $post_id);
        foreach ($existing_repeater_data as $key => $row) {
            if ($row['document_number'] === $documentNumber) {
                // Update the sub-field within this row.
                $existing_repeater_data[$key]['health_symptoms'] = $health_symptoms;
                update_field("health_declaration", $existing_repeater_data, $post_id);
                return;
            }
        }
        // If the documentNumber doesn't exist, insert a new row
        $row = array(
            "document_number" => $documentNumber,
            "health_symptoms" => $health_symptoms
        );
        // Repeater parent field name - "health_declaration"
        add_row("health_declaration", $row, $post_id);
    }
    function insert_health_declaration_countries($documentNumber, $countries, $post_id)
    {
        $hyphenSeparatedCountries = implode(' - ', $countries);
        $existing_repeater_data = get_field("health_declaration_countries", $post_id);
        foreach ($existing_repeater_data as $key => $row) {
            if ($row['document_number'] === $documentNumber) {
                // Update the sub-field within this row.
                $existing_repeater_data[$key]['countries'] = $hyphenSeparatedCountries;
                update_field("health_declaration_countries", $existing_repeater_data, $post_id);
                return;
            }
        }
        // If the documentNumber doesn't exist, insert a new row
        $row = array(
            "document_number" => $documentNumber,
            "countries" => $hyphenSeparatedCountries
        );
        // Repeater parent field name - "health_declaration"
        add_row("health_declaration_countries", $row, $post_id);
    }
    function del_document($attachment_id_to_remove, $post_id, $repeater, $sub_field)
    {
        $repeater_field_name = $repeater;
        $subfield_name = $sub_field; // Replace with your subfield name
        // Get the repeater field data for the specific post
        $repeater_field_data = get_field($repeater_field_name, $post_id);
        if ($repeater_field_data) {
            // Initialize a variable to store the index
            $index_to_remove = -1;
            // Iterate through the repeater rows
            foreach ($repeater_field_data as $index => $row) {
                // Check if the subfield with the attachment ID matches the one to remove
                if ($row[$subfield_name]['id'] == $attachment_id_to_remove) {
                    // Store the index of the matching row
                    $index_to_remove = $index;
                    break; // Exit the loop once found
                }
            }
            if ($index_to_remove >= 0) {
                // Now $index_to_remove contains the index of the row to remove
                // You can use this index to update or remove the specific row
                $this->del_row($repeater, $index_to_remove, $post_id);
            } else {
                // The attachment ID was not found in any row
            }
        } else {
            // No repeater field data found
        }
    }
    function del_row($repeater, $row_id, $post_id)
    {
        $repeater_field_data = get_field($repeater, $post_id);
        // Remove the row from the repeater field data
        if (isset($repeater_field_data[$row_id])) {
            unset($repeater_field_data[$row_id]);
        }
        // Update the repeater field with the modified data
        update_field($repeater, $repeater_field_data, $post_id);
        delete_row($repeater, $row_id, [$post_id]);
    } // function ends
    // Validate Passport
    function is_passport_valid($api_response)
    {
        if ($api_response['error'] != null) return false;
        $resp = $api_response['passport_data'];
        if (
            isset($resp->fields->fullName) &&
            isset($resp->fields->documentNumber) &&
            $resp->fields->documentNumber !== "" &&
            isset($resp->fields->issuingCountry) &&
            isset($resp->fields->nationality) &&
            isset($resp->fields->dateOfBirth) &&
            isset($resp->fields->dateOfExpiry)
        )
            return true;
        else {
            $_POST['passport_error'] = "Our system is currently unable to recognize the mandatory fields in your passport. Kindly upload a clear picture of your passport.";
            // required fields does not exists passport is invalid
            return false;
        }
    }
    function isPastDate($dateOfExpiry)
    {
        // Convert date string to timestamp
        $expiryTimestamp = strtotime($dateOfExpiry);
        // Get current timestamp
        $currentTimestamp = time();
        // Check if the date is in the past
        if ($expiryTimestamp < $currentTimestamp) {
            // Date is in the past, create a blank if statement
            // Your logic goes here
            // This block will only be executed if the date is in the past
            return true;
        }
        return false;
    }
    public function insert_url_selfie($attachment_id_or_url, $document_number, $post_id)
    {
        $existing_repeater_data = get_field("acf_passport_info", $post_id);
        echo $attachment_id_or_url;
        // Check if $attachment_id_or_url is a URL
        if (filter_var($attachment_id_or_url, FILTER_VALIDATE_URL)) {
            // Download the image and get the attachment ID
            $attachment_id = $this->download_image($attachment_id_or_url);
            echo "Attachement ID";
            echo $attachment_id;
        } else {
            // Use the provided attachment ID
            $attachment_id = $attachment_id_or_url;
        }
        foreach ($existing_repeater_data as $key => $row) {
            if ($row['acf_document_number'] === $document_number) {
                // Update the sub-field within this row.
                $existing_repeater_data[$key]['selfie_link'] = $attachment_id;
            }
        }
        update_field("acf_passport_info", $existing_repeater_data, $post_id);
    }
    // Function to download an image and return the attachment ID
    private function download_image($url)
    {
        // Use WordPress function to download and attach the image
        $image = media_sideload_image($url, 0);
        // If successful, extract the attachment ID from the HTML response
        if (!is_wp_error($image)) {
            preg_match('/<img.*?attachment_id="(.*?)".*?>/i', $image, $matches);
            if (!empty($matches[1])) {
                return $matches[1];
            }
        }
        // Return 0 or handle the error as needed
        return 0;
    }
} // Class Ends
$swift_helper_sy = new SwiftHelperSy();
