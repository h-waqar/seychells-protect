<!-- Required Documents Page -->
<div id="gpOne">

    <section id="seven_RequiredDocs" class="cs_docs hidden">
        <div class="cs-container">

            <!-- Accommodation Booking Confirmation -->

            <div class="cs-accomodation-confirm cs-select-file mb-3">
                <h4 id="title_ProofOfCitezenShip">Accommodation Booking Confirmations</h4>

                <p id="para_ProofOfCitezenShip">Upload your booking confirmation(s) for each location of your stay in Seychelles. This must include
                    the name of the hotel/guesthouse, boat charter name or name of employer. If you’re visiting friends
                    and family, provide a letter of invitation.</p>

                <!-- Upload btn -->
                <div class="cs-button-wrapper text-end float-none">
                    <label for="input_UploadAccomodationDocs" class="cs-primary-button">
                        <i class="fa fa-upload"></i>

                        Select File
                    </label>
                    <input type="file" id="input_UploadAccomodationDocs" class="d-none"
                           name="required_accomodation_docs" accept=".pdf">
                </div>


                <!-- This is The DIV WHERE FILES ARE STORED -->
                <div id="accomodationDocs"></div>


            </div>


            <!-- Airline Booking Confirmation -->

            <div class="cs-airline-confirm cs-select-file" id="container_AirlineDocs">
                <h4>Airline Booking Confirmation</h4>

                <p>Upload your airline booking confirmation, which clearly shows your international arrival and departure
                    flight details.</p>

                <!-- Upload btn -->
                <div class="cs-button-wrapper text-end float-none">
                    <label for="input_UploadAirlineDocs" class="cs-primary-button">
                        <i class="fa fa-upload"></i>
                        Select File
                    </label>
                    <input type="file" id="input_UploadAirlineDocs" class="d-none" name="required_airline_docs"
                           accept=".pdf">
                </div>

                <!-- This is The DIV WHERE FILES ARE STORED -->
                <div id="airlineDocs"></div>

            </div>

        </div>


        <!-- Prev/Next (<_>) Button Wrapper -->

        <div class="cs-button-wrapper text-right mt-4 me-1 float-end">
            <button type="button" class="border-0 bg-transparent pr-3" id="btn_RequiredDocsPrev">
                <span class="dashicons dashicons-arrow-left-alt2"></span>
                Previous
            </button>
            <button type="button" class="btn btn-info" id="btn_RequiredDocsContinue">Continue</button>
        </div>

    </section>

</div>