<section id="medicalProtection" class="processingPeriod ">
    <!-- medicalProtection -->
    <div class="cs-container">

        <div class="bs-heading">
            <h1 class="mb-2">24/7 Medical Protection</h1>
            <p class="mb-4">
                Get medical help fast, day or night. A private visit can be very expensive and hard to arrange. With Doctors 24/7 a clinician comes to your hotel, villa or boat on any island in Seychelles.
                <br><br>
                This is medical assistance, not insurance so no approval for a claim is needed. Get help fast w h e n you n e e d it. This is not a requirement for travel to the Seychelles.
            </p>
        </div>

        <div class="question-wrapper">
            <div class="cs-qna-radio row">

                <!-- I am the APPLICANT -->
                <div class="col-md-6 mb-2">
                    <input type="radio" id="input_BasicProtection" name="radio_medical_protection"
                        value="basic_protection" checked>
                    <label class="cs-form-control" for="input_BasicProtection">
                        <div class="main-svg-wrap">
                            <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_88_17" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="2" width="51" height="56">
                                    <path d="M7.375 11.3772L29.5111 4.91675L51.625 11.3772V24.6252C51.6241 31.4146 49.4873 38.0316 45.5171 43.5391C41.5469 49.0467 35.9447 53.1656 29.5037 55.3126C23.0603 53.1666 17.4558 49.0472 13.4841 43.5383C9.51241 38.0295 7.3751 31.4104 7.375 24.6191V11.3772Z" fill="#555555" stroke="white" stroke-width="4.91667" stroke-linejoin="round" />
                                    <path d="M18.4375 28.2708L27.0417 36.875L41.7917 22.125" stroke="white" stroke-width="4.91667" stroke-linecap="round" stroke-linejoin="round" />
                                </mask>
                                <g mask="url(#mask0_88_17)">
                                    <path d="M0 0H59V59H0V0Z" fill="currentColor" />
                                </g>
                            </svg>
                        </div>

                        <h4>ESSENTIAL PROTECTION</h4>
                        <div class="text-wrap">
                            <span>€<var class="d-inline" id="basic_protection_price"></var> </span> <span class="text-regular">/ day / Adult</span>
                        </div>


                        <?php
                        $text_items = [
                            "All pre-existing conditions covered.",
                            "Children under 10 are covered free.",
                            "24/7 medical hotline to assist, however small or serious the problem.",
                            "Guaranteed Same day International Doctor Assistance at your hotel, villa or boat on any island in Seychelles.",
                            "Services available: Serious injury, general illnesses, flu/fever, food poisoning, cuts and scrapes, jellyfish stings, insect bites, refill of medication, heat exhaustion, trauma, epidemic care or any other medical assistance required.",
                            "Doctor Following up and Monitoring.",
                            "Help with tests, medicines and hospital visits.",
                            "Medical certificates or Doctor letter for Insurance, Employers, Airlines and Hotels.",
                            "Airport VIP lounge following Medical Assistance.",
                            "Courtesy Electric Cars in Mahe following a medical issue when you need transport."
                        ];

                        ?>

                        <div class="text-items">
                            <?php foreach ($text_items as $text): ?>
                                <p>
                                    <svg
                                        width="19"
                                        height="19"
                                        viewBox="0 0 19 19"
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.083 1.58325C9.4033 1.58325 7.79239 2.25051 6.60466 3.43824C5.41693 4.62597 4.74967 6.23688 4.74967 7.91659C4.74967 9.59629 5.41693 11.2072 6.60466 12.3949C7.79239 13.5827 9.4033 14.2499 11.083 14.2499C12.7627 14.2499 14.3736 13.5827 15.5614 12.3949C16.7491 11.2072 17.4163 9.59629 17.4163 7.91659H15.833C15.833 10.5449 13.7113 12.6666 11.083 12.6666C9.82323 12.6666 8.61505 12.1661 7.72425 11.2753C6.83345 10.3845 6.33301 9.17636 6.33301 7.91659C6.33301 6.65681 6.83345 5.44863 7.72425 4.55783C8.61505 3.66703 9.82323 3.16659 11.083 3.16659C11.4234 3.16659 11.7638 3.20617 12.0884 3.27742L13.363 2.01075C12.6347 1.72575 11.8747 1.58325 11.083 1.58325ZM16.3001 2.83409L11.083 8.05117L9.19884 6.167L8.08259 7.29117L11.083 10.2916L17.4163 3.95825M3.90259 4.60742C3.17879 5.20114 2.59542 5.94775 2.19437 6.79365C1.79332 7.63955 1.58453 8.56376 1.58301 9.49992C1.58301 11.1796 2.25027 12.7905 3.438 13.9783C4.62573 15.166 6.23664 15.8333 7.91634 15.8333C8.42301 15.8333 8.92176 15.7699 9.40467 15.6512C8.01134 15.3424 6.72884 14.6458 5.67592 13.6878C4.91774 13.2823 4.28386 12.6785 3.84189 11.941C3.39992 11.2034 3.16644 10.3598 3.16634 9.49992C3.16634 9.26242 3.19009 9.03284 3.22176 8.79534C3.19009 8.50242 3.16634 8.2095 3.16634 7.91659C3.16634 6.77659 3.41967 5.6445 3.90259 4.60742Z"
                                            fill="currentColor" />
                                    </svg>
                                    <?= htmlspecialchars($text) ?>
                                </p>
                            <?php endforeach; ?>
                        </div>




                    </label>
                </div>

                <!-- I am NOT the APPLICANT -->
                <div class="col-md-6 mb-2">
                    <input type="radio" id="input_TotalProtection" name="radio_medical_protection"
                        value="total_protection">
                    <label class="cs-form-control" for="input_TotalProtection">
                        <div class="main-svg-wrap">
                            <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_88_17" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="2" width="51" height="56">
                                    <path d="M7.375 11.3772L29.5111 4.91675L51.625 11.3772V24.6252C51.6241 31.4146 49.4873 38.0316 45.5171 43.5391C41.5469 49.0467 35.9447 53.1656 29.5037 55.3126C23.0603 53.1666 17.4558 49.0472 13.4841 43.5383C9.51241 38.0295 7.3751 31.4104 7.375 24.6191V11.3772Z" fill="#555555" stroke="white" stroke-width="4.91667" stroke-linejoin="round" />
                                    <path d="M18.4375 28.2708L27.0417 36.875L41.7917 22.125" stroke="white" stroke-width="4.91667" stroke-linecap="round" stroke-linejoin="round" />
                                </mask>
                                <g mask="url(#mask0_88_17)">
                                    <path d="M0 0H59V59H0V0Z" fill="currentColor" />
                                </g>
                            </svg>
                        </div>

                        <h4>TOTAL PROTECTION</h4>


                        <div class="text-wrap">
                            <span>€<var class="d-inline" id="total_protection_price"></var> </span> <span class="text-regular">/ day / Adult</span>
                        </div>


                        <?php
                        $text_items = [
                            "Phone Assistance within 10 minutes",
                            "Doctor Assistance within 90 Minutes",
                            "Medication and lab courier runs included",
                            "Access to same-day IV hydration, vitamin therapy, or oxygen support",
                            "Full private medical concierge Assistance",
                            "Concierge to rebook hotels, flights, ferries and tours during a medical issue",
                            "Hotel recovery package arranged by concierge",
                            "Liaison with emergency medical evacuation if necessary",
                            "Personal medical case manager assigned to each serious case until resolution",
                            "Eden Island VIP Lounge following Medical",
                            "Airport VIP lounge following Medical Assistance.",
                            "Courtesy Electric Cars in Mahe following a medical issue when you need transport."
                        ];
                        ?>

                        <div class="text-items">
                            <?php foreach ($text_items as $text): ?>
                                <p>
                                    <svg
                                        width="19"
                                        height="19"
                                        viewBox="0 0 19 19"
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.083 1.58325C9.4033 1.58325 7.79239 2.25051 6.60466 3.43824C5.41693 4.62597 4.74967 6.23688 4.74967 7.91659C4.74967 9.59629 5.41693 11.2072 6.60466 12.3949C7.79239 13.5827 9.4033 14.2499 11.083 14.2499C12.7627 14.2499 14.3736 13.5827 15.5614 12.3949C16.7491 11.2072 17.4163 9.59629 17.4163 7.91659H15.833C15.833 10.5449 13.7113 12.6666 11.083 12.6666C9.82323 12.6666 8.61505 12.1661 7.72425 11.2753C6.83345 10.3845 6.33301 9.17636 6.33301 7.91659C6.33301 6.65681 6.83345 5.44863 7.72425 4.55783C8.61505 3.66703 9.82323 3.16659 11.083 3.16659C11.4234 3.16659 11.7638 3.20617 12.0884 3.27742L13.363 2.01075C12.6347 1.72575 11.8747 1.58325 11.083 1.58325ZM16.3001 2.83409L11.083 8.05117L9.19884 6.167L8.08259 7.29117L11.083 10.2916L17.4163 3.95825M3.90259 4.60742C3.17879 5.20114 2.59542 5.94775 2.19437 6.79365C1.79332 7.63955 1.58453 8.56376 1.58301 9.49992C1.58301 11.1796 2.25027 12.7905 3.438 13.9783C4.62573 15.166 6.23664 15.8333 7.91634 15.8333C8.42301 15.8333 8.92176 15.7699 9.40467 15.6512C8.01134 15.3424 6.72884 14.6458 5.67592 13.6878C4.91774 13.2823 4.28386 12.6785 3.84189 11.941C3.39992 11.2034 3.16644 10.3598 3.16634 9.49992C3.16634 9.26242 3.19009 9.03284 3.22176 8.79534C3.19009 8.50242 3.16634 8.2095 3.16634 7.91659C3.16634 6.77659 3.41967 5.6445 3.90259 4.60742Z"
                                            fill="currentColor" />
                                    </svg>
                                    <?= htmlspecialchars($text) ?>
                                </p>
                            <?php endforeach; ?>
                        </div>


                        <!--           Alert Danger           -->
                        <!-- <span class="processing-alert hidden">
                            <div class="alert alert-danger" id="alert_StandardProcessing" role="alert">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                <p>
                                    <strong>Your trip starts very soon!</strong>
                                    We cannot guarantee your Travel Authorisation will be approved before your trip.
                                </p>
                            </div>
                        </span> -->

                    </label>
                </div>

            </div>
        </div>

        <!-- Prev/Next (<_>) Button Wrapper -->

        <div class="cs-button-wrapper text-right mt-4 me-1 float-left">
            <!-- <button type="button" class="border-0 bg-transparent pr-3" id="btn_ProcessingPeriodPrev">
                <span class="dashicons dashicons-arrow-left-alt2"></span>
                Previous
            </button> -->
            <button type="button" class="btn btn-info" id="btn_MedicalProtectionContinue">Continue</button>
        </div>

    </div>

</section>