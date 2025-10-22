<?php

$php_file_name = "custom_declaration_sy";

function cs_custom_declaration_sy()
{

    $response = [
        "success" => true,
    ];




    $applicantId  = $_POST['applicantId'];

    $cs_customs_animal_plant = $_POST['data']['cs_customs_animal_plant'];
    update_field("bringing_animal_or_plant", $cs_customs_animal_plant, $applicantId);

    $cs_customs_another_person_goods = $_POST['data']['cs_customs_another_person_goods'];
    update_field("goods_that_belongs_to_another_person_in_your_possession", $cs_customs_another_person_goods, $applicantId);

    $cs_customs_commercial_merch = $_POST['data']['cs_customs_commercial_merch'];
    update_field("commercial_merchandise", $cs_customs_commercial_merch, $applicantId);

    $cs_customs_free_alcohol = $_POST['data']['cs_customs_free_alcohol'];
    update_field("duty_free_alcohol_allowance", $cs_customs_free_alcohol, $applicantId);

    $cs_customs_free_perfume = $_POST['data']['cs_customs_free_perfume'];
    update_field("duty_free_perfume_allowance", $cs_customs_free_perfume, $applicantId);

    $cs_customs_free_tobacco = $_POST['data']['cs_customs_free_tobacco'];
    update_field("duty_free_tobacco_allowance", $cs_customs_free_tobacco, $applicantId);

    $cs_customs_purchased_abroad = $_POST['data']['cs_customs_purchased_abroad'];
    update_field("value_exceed", $cs_customs_purchased_abroad, $applicantId);

    $cs_customs_toxic_substances = $_POST['data']['cs_customs_toxic_substances'];
    update_field("possession_controlled_substances", $cs_customs_toxic_substances, $applicantId);

    $cs_customs_transporting_currency = $_POST['data']['cs_customs_transporting_currency'];
    update_field("transporting_currency_or_monetary_instruments", $cs_customs_transporting_currency, $applicantId);

    $cs_customs_visited_farm = $_POST['data']['cs_customs_visited_farm'];
    update_field("visited_a_forest_farm_nature_park", $cs_customs_visited_farm, $applicantId);

    // // $healthSymptoms = "common_disease_symptoms";




    // echo $cs_customs_transporting_currency;


    if ($cs_customs_transporting_currency == "yes") {

        /**
         * If user is taking money with him store this information in the backend.
         */

        $monetaries = $_POST['data']['monetary'];

        $monetary_data = [];
        foreach ($monetaries as $monetary) {
            $repeater_data =
                array(
                    "monetary_instrument" => $monetary['monetaryInstrument'],
                    'currency' => $monetary['monetaryCurrency'],
                    'amount' => $monetary['currencyAmount'],

                );
            $monetary_data[] = $repeater_data;
        }


        update_field('monetary', $monetary_data, $applicantId);


    }




    die(json_encode($response));
}

/**
 * The 'wp_ajax_' is a WordPress prefix for all ajax
 * type calls.
 */
add_action("wp_ajax_nopriv_" . $php_file_name . "", "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name . "", "cs_" . $php_file_name);
