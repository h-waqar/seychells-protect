<?php

/**
 * Monday.com API handler. 
 * 'rn_' is 'Relational Notes' prefix.
 */
$php_file_name = "get_demo_sy";



function cs_get_demo_sy(){
    $response = [
        "code"=> 1,
        "success"=> true,
    ];

    die(json_encode($response));
    
}


/**
 * Performs action if user access is denied. 
 * The 'rn_' is the Relational Notes prefix
 * and the '_denied' is a given state.
 */
function cs_get_demo_denied_sy()
{
  $response = array(
    "code" => 0,
    "message" => "Invalid Access. Please login first."
  );

  die(json_encode($response));
};


/**
 * The first 'add_action' handles what happens if
 * a user is not logged in. The 'wp_ajax_nopriv_'
 * is a no-login prefix. The second 'add_action'
 * handles the actual event if a user is logged-in.
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls. The '_rn' is the Relational Notes prefix.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name . "_denied");
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name . "");
