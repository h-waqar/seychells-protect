<?php


$php_file_name = "country_data_sy";

function cs_country_data_sy()
{
  $response = [
    "success" => true,
  ];

  // Define the path to your JSON file

  $json_file_path = SP_PLUGIN_BASEPATH . 'source/json/countries.json';
  $json_data = file_get_contents($json_file_path);

  // Decode the JSON data into a PHP object or array
  $decoded_data = json_decode($json_data);

  if ($decoded_data) {
    $response['countries_data'] = $decoded_data;
  } else {
    $response['success'] = false;
  }

  die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);
// }
