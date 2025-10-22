<?php

$php_file_name = "create_custom_post_sy";

function cs_create_custom_post_sy()
{
    $response = [
        "success" => false,
        "message" => "Something went wrong",
    ];



    $data = $_POST['data'] ?? [];

    $post_title   = sanitize_text_field($data['post_title'] ?? '');
    $post_content = sanitize_text_field($data['post_content'] ?? '');
    $post_type    = sanitize_text_field($data['post_type'] ?? 'protection');
    $post_status  = sanitize_text_field($data['post_status'] ?? 'private');
    $applicant_id = sanitize_text_field($_POST['applicantId'] ?? '');
    $country = sanitize_text_field($_POST['country'] ?? '');

    // Optional validation
    if (empty($post_title)) {
        $response['message'] = "Post title is required.";
        die(json_encode($response));
    }

    $post_id = wp_insert_post([
        "post_title"   => $post_title,
        "post_content" => $post_content,
        "post_type"    => "protection",
        "post_status"  => $post_status,
    ]);

    // if you want to update title
    //     $new_title = 'Updated Booking Title';
    // wp_update_post([
    //     'ID'         => $post_id,
    //     'post_title' => $new_title,
    // ]);


    if (is_wp_error($post_id)) {
        $response['message'] = "Post creation failed.";
        die(json_encode($response));
    }

    // echo "reached upto here232";
    // return;

    // // Optional ACF field
    // update_field('applicant_country', 'Pakistan', $post_id); // you can make it dynamic later
    update_field("applicant_country", $country, $post_id);

    $response['success'] = true;
    $response['user_id'] = $post_id;
    $response['message'] = "Custom post created successfully.";

    die(json_encode($response));
}

add_action("wp_ajax_nopriv_" . $php_file_name, "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name, "cs_" . $php_file_name);
