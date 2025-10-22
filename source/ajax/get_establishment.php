<?php

$php_file_name = "get_establishment_sy";


function getAutosuggestionsSy($query) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'establishment';

    $sql = $wpdb->prepare(
        "SELECT Establishment, Address, Island
        FROM $table_name
        WHERE Establishment LIKE %s OR Address LIKE %s OR Island LIKE %s
        LIMIT 5",
        "%{$query}%",
        "%{$query}%",
        "%{$query}%"
    );

    $results = $wpdb->get_results($sql, ARRAY_A);

    return $results;
}





function cs_get_establishment_sy()
{

    $response = [
        "success" => true,
    ];

 



    $query = sanitize_text_field($_POST['query']); // Use appropriate sanitation

   
    $suggestions = getAutosuggestionsSy($query);
    $response['suggestions'] = $suggestions;


    // echo "<pre>";
    // print_r($suggestions);
    // echo "</pre>";
    // // Display suggestions
    // foreach ($suggestions as $suggestion) {
    //     echo '<div class="suggestion">';
    //     echo '<p>' . $suggestion['Establishment'] . ', ' . $suggestion['Address'] . ', ' . $suggestion['Island'] . '</p>';
    //     echo '</div>';
    // }






    die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);

