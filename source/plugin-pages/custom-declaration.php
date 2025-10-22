<!-- Customs Declaration Page -->
<div id="basicInfoTwo">

    <section id="six_Customs" class="hidden">
        <div class="cs-container">

            <div class="question-wrapper">

                <!------------------| Question One |-------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        Are you or will you be bringing into Seychelles any animal or plant, any product of animal or
                        plant origin, any kind of biological specimen or any tool or equipment used for rearing of
                        animals and cultivation of plants?
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsAnimalPlantYes" name="cs_customs_animal_plant" value="yes">
                    <label class="cs-form-control" for="input_CustomsAnimalPlantYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsAnimalPlantNo" name="cs_customs_animal_plant" value="No">
                    <label class="cs-form-control" for="input_CustomsAnimalPlantNo">
                        No
                    </label>
                </div>

                <!------------------| Question Two |-------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        In the past 14 days, have you visited a forest, farm,
                        nature park or had any contact with farm animals
                        or visited any properties that slaughter or processes animals?
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsVisitedFarmYes" name="cs_customs_visited_farm" value="yes">
                    <label class="cs-form-control" for="input_CustomsVisitedFarmYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsVisitedFarmNo" name="cs_customs_visited_farm" value="No">
                    <label class="cs-form-control" for="input_CustomsVisitedFarmNo">
                        No
                    </label>
                </div>

                <!------------------| Question Three |------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        Do you or will you have in your possession-controlled substances, obscene articles,
                        toxic substances, similar Seychelles military wear,
                        firearms, spear guns or any dangerous weapons?
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsToxicSubstancesYes" name="cs_customs_toxic_substances" value="yes">
                    <label class="cs-form-control" for="input_CustomsToxicSubstancesYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsToxicSubstancesNo" name="cs_customs_toxic_substances" value="No">
                    <label class="cs-form-control" for="input_CustomsToxicSubstancesNo">
                        No
                    </label>
                </div>

                <!------------------| Question Four |------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        Are you or will you be transporting currency or monetary instruments (e.g. bearer negotiable
                        instruments including cheque, bill of exchange, promissory note, traveller's cheque, bearer
                        bond, money order, etc.) of a value greater than SCR 50,000 (approx. €3500/US$3500) or foreign
                        equivalent, in or out of the country?
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsTransportingCurrencyYes" name="cs_customs_transporting_currency" value="yes">
                    <label class="cs-form-control mb-1" for="input_CustomsTransportingCurrencyYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsTransportingCurrencyNo" name="cs_customs_transporting_currency" value="No">
                    <label class="cs-form-control mb-1" for="input_CustomsTransportingCurrencyNo">
                        No
                    </label>
                </div>

                <div id="monetaryInstrument" class="monetaryInstrument hidden">

                    <div id="wrapMonetary">
                        <div class="row add-monetary-instrument">

                            <h6 class="text-dark">
                                <strong>Select Form</strong>
                                <span class="remove-button" onclick="_swiftUiManager.removeMonetary(this)"><i class="fa fa-trash"></i>remove</span>
                            </h6>

                            <div class="col-md-6">

                                <div class="mb-2">
                                    <select name="select_monetary_instrument" class="form-select">
                                        <option class="hidden">Select Monetary Instrument</option>

                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Bill of exchange">Bill of exchange</option>
                                        <option value="Promissory note">Promissory note</option>
                                        <option value="Traveler's cheque">Traveler's cheque</option>
                                        <option value="Bearer bond">Bearer bond</option>
                                        <option value="Money Order">Money Order</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3 px-md-0">

                                <div class="mb-2">
                                    <select name="select_monetary_currency" class="form-select">
                                        <option class="hidden">Select Currency</option>
                                        <optgroup label="Frequently Selected">
                                            <option value="SCR">SCR</option>
                                            <option value="USD">USD</option>
                                            <option value="EUR">EUR</option>
                                            <option value="GBP">GBP</option>
                                            <option value="AED">AED</option>
                                        </optgroup>

                                        <optgroup label="All Currencies">
                                            <option value="CHF">CHF</option>
                                            <option value="RUB">RUB</option>
                                            <option value="ILS">ILS</option>
                                            <option value="AUD">AUD</option>
                                            <option value="JPY">JPY</option>
                                            <option value="CAD">CAD</option>
                                            <option value="INR">INR</option>
                                            <option value="INR">INR</option>
                                            <option value="ZAR">ZAR</option>
                                            <option value="MUR">MUR</option>
                                            <option value="SAR">SAR</option>
                                        </optgroup>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="mb-2">
                                    <input type="text" name="number_MonetaryCurrencyAmount" class="form-control"  placeholder="Amount" style="padding: 0.6rem;">
                                </div>

                            </div>

                        </div>

                    </div>

                    <span id="btn_AddAnotherMonetary" class="add-btn mt-3">
                        <i class="fa fa-plus"></i>
                        Add Another
                    </span>

                </div>

                <!------------------| Question Five |------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        Do you have in your possession, or will you be carrying any commercial merchandise?
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsComercialMerchYes" name="cs_customs_commercial_merch" value="yes">
                    <label class="cs-form-control" for="input_CustomsComercialMerchYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsComercialMerchNo" name="cs_customs_commercial_merch" value="No">
                    <label class="cs-form-control" for="input_CustomsComercialMerchNo">
                        No
                    </label>
                </div>

                <!------------------| Question Six |------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        Does the total value of all goods that were purchased abroad and that will remain in the
                        Seychelles exceed SCR5,000 (approx. €350/US$350) or foreign equivalent?
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsPurchasedAbroadYes" name="cs_customs_purchased_abroad" value="yes">
                    <label class="cs-form-control" for="input_CustomsPurchasedAbroadYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsPurchasedAbroadNo" name="cs_customs_purchased_abroad" value="No">
                    <label class="cs-form-control" for="input_CustomsPurchasedAbroadNo">
                        No
                    </label>
                </div>

                <!------------------| Question Seven |------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        Do you or will you have any goods that belong to another person in your possession?
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsAnotherPersonYes" name="cs_customs_another_person_goods" value="yes">
                    <label class="cs-form-control" for="input_CustomsAnotherPersonYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsAnotherPersonNo" name="cs_customs_another_person_goods" value="No">
                    <label class="cs-form-control" for="input_CustomsAnotherPersonNo">
                        No
                    </label>
                </div>

                <!------------------| Question Eight |------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        Will you be bringing more than your duty-free alcohol allowance, which is either
                        4 liters of someone with an alcohol problem beverages less than 16% ABV OR 2 liters above 16%
                        ABV and 2 liters below 16% ABV?
                        Note: passengers below the age of 18 cannot bring alcohol into the country.
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsFreeAlcoholYes" name="cs_customs_free_alcohol" value="yes">
                    <label class="cs-form-control" for="input_CustomsFreeAlcoholYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsFreeAlcoholNo" name="cs_customs_free_alcohol" value="No">
                    <label class="cs-form-control" for="input_CustomsFreeAlcoholNo">
                        No
                    </label>
                </div>

                <!------------------| Question Eight |------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        Will you be bringing more than your duty-free tobacco allowance,
                        which is either 200 cigarettes OR 100 cigarillos OR 50 cigars OR 200g of tobacco product?
                        Note: passengers below the age of 18 cannot bring tobacco into the country.
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsFreeTobaccoYes" name="cs_customs_free_tobacco" value="yes">
                    <label class="cs-form-control" for="input_CustomsFreeTobaccoYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsFreeTobaccoNo" name="cs_customs_free_tobacco" value="No">
                    <label class="cs-form-control" for="input_CustomsFreeTobaccoNo">
                        No
                    </label>
                </div>

                <!------------------| Question Nine |------------------------->
                <div class="cs-qna-radio mb-3">
                    <p>
                        Will you be bringing more than your duty-free perfume allowance,
                        which is a maximum of a 200ml bottle of perfume?
                    </p>

                    <!-- Yes -->
                    <input type="radio" id="input_CustomsFreePerfumeYes" name="cs_customs_free_perfume" value="yes">
                    <label class="cs-form-control" for="input_CustomsFreePerfumeYes">
                        Yes
                    </label>

                    <!-- No -->
                    <input type="radio" id="input_CustomsFreePerfumeNo" name="cs_customs_free_perfume" value="No">
                    <label class="cs-form-control" for="input_CustomsFreePerfumeNo">
                        No
                    </label>
                </div>


            </div>

        </div>


        <!-- Prev/Next (<_>) Button Wrapper -->

        <div class="cs-button-wrapper">
            <button type="button" class="border-0 bg-transparent pr-3" id="btn_CustomsInfoPrev">
                <span class="dashicons dashicons-arrow-left-alt2"></span>
                Previous
            </button>
            <button type="button" class="btn btn-info" id="btn_CustomsInfoContinue">Continue</button>
        </div>


    </section>

    <script>
        const customs = document.querySelectorAll('#six_Customs .question-wrapper label input');

        customs.forEach((item) => {
            item.addEventListener('change', function(e) {
                const label = this.parentNode;

                // Find the parent question container
                const questionContainer = label.closest('.cs-qna-radio');

                // Remove 'qna-active' class from siblings within the same question container
                const siblings = questionContainer.querySelectorAll('.cs-form-control');
                siblings.forEach((sibling) => {
                    sibling.classList.remove('qna-active');
                });

                // Add 'qna-active' class to the selected answer's label
                label.classList.add('qna-active');
            });
        });
    </script>

</div>