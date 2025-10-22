<div id="container_StartTrip" class="container-fluid hidden" style="max-width: 100%;">
    <div class="cs-page-container">
        <div class="content-wrapper">
            <h1>Start your trip to Seychelles</h1>
            <p>
                All travelers to the Seychelles are required to submit Immigration forms in compliance with Immigration
                Decree Section 6 & 9 Form IMM/3A and Section 75(1) of the Anti-Money Laundering and Countering the
                Financing of Terrorism Act, 2020. Failure to comply may lead to a penalty fee upon arrival.
            </p>
        </div>

        <!-- Citizens | Tourist -> Radio Buttons -->
        <div class="cs-card-wrapper">
            <div class="row">

                <!-- 1st Radio Button -->


                <div class="col-md-6">
                    <div class="radio-card-wrapper">
                        <input type="radio" id="radio_StartTripCitizen" name="cs_trip_type" class="radio-btn"
                               value="seychelles-citizen">
                        <label for="radio_StartTripCitizen" class="radio-label">
                            <a href="https://seychelles.govtas.com" target="_blank" class="text-decoration-none">
                                <div class="cs-card">
                                    <div class="cs-icon-wrapper">
                                        <img src="<?php echo PLUGIN_BASEURL_SY . "source/svg/seychelles-flag.svg" ?>"
                                             alt="seychelles-img">
                                    </div>
                                    <div class="cs-content-wrapper">
                                        <h2>Seychelles Citizens</h2>
                                        <p>
                                            Choose this option if you are a Seychelles citizen.
                                            Dual nationals and those with lost
                                            or expired passports should apply as citizens.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </label>
                    </div>
                </div>


                <!-- 2nd Radio Button -->
                <div class="col-md-6">
                    <div class="radio-card-wrapper">
                        <input type="radio" id="radio_StartTripTourist" name="cs_trip_type" class="radio-btn"
                               value="not-seychelles-citizen">
                        <label for="radio_StartTripTourist" class="radio-label">
                            <div class="cs-card" style="background-color: #046055">
                                <div class="cs-icon-wrapper">
                                    <img src="<?php echo PLUGIN_BASEURL_SY . "source/svg/world-web.svg" ?>"
                                         alt="world-web-img">
                                </div>
                                <div class="cs-content-wrapper">
                                    <h2>Tourists, visitors, residents and workers</h2>
                                    <p>
                                        Choose this option if you are visiting Seychelles for tourism, business,
                                        are a permit
                                        holder,
                                        or visiting for any other reason
                                        to apply for a travel authorization.
                                    </p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>