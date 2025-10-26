<div id="introStepThreeContainer">

    <!-- Section for Contact Information -->
    <section id="three_ContactInfo" class="hidden">

        <div class="cs-container">

            <div class="bs-heading mb-4">
                <h1>Personal Information</h1>
                <p>
                    Please provide your details below so we can process your Seychelles Medical Protection application accurately and securely.
                </p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Phone Number Input -->
                    <div class="mb-3">
                        <label for="input_ContactYourNumber" class="form-label">Phone Number</label>
                        <input type="tel" id="input_ContactYourNumber" class="form-control d-block"
                            placeholder="Enter phone number" name="cs_contact_info_phone_no">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="input_ContactYourEmail" class="form-label">Your personal email address</label>
                        <input type="email" id="input_ContactYourEmail" class="form-control" placeholder="Enter Email"
                            name="cs_contact_info_email">
                    </div>
                </div>
            </div>

            <!-- Duplicate Emergency Contact Details -->
            <div id="contact_Duplicate">


                <div class="cs-contact-details cs-emergency-contact-numbers" id="customs_select_form">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Emergency Contact Name Input -->
                            <div class="mb-3">
                                <label for="emg_contact_name">Full Name</label>
                                <input type="text" class="form-control" onchange="_swiftFV.handle_emgContact(this)"
                                    name="emg_contact_name" placeholder="Enter full name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Emergency Contact Phone Number Input -->
                            <div class="mb-3">
                                <label>Date of birth</label>
                                <!-- <input type="text" onchange="_swiftFV.handle_emgTelephone(this)"
                                    class="form-control datepicker-dob d-block" placeholder="Date Of Birth" name=""> -->
                                <input type="date" onchange="_swiftFV.handle_emgTelephone(this)"
                                    class="form-control d-block" placeholder="Date Of Birth" name="emg_contact_dob">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Button to Add Emergency Contact -->
            <span id="btn_AddContact">
                <a class="fw-bold" style="text-decoration: underline;" href="#">+ Add More
                    Applicants</a></span>

        </div>

        <!-- Prev/Next (<_>) Button -->

        <div class="cs-button-wrapper">
            <button type="button" class="prev pr-3" id="btn_ContactInfoPrev">
                Previous
            </button>
            <button type="button" class="btn btn-info" id="btn_ContactInfoContinue">Continue</button>
        </div>

    </section>

    <!-- JavaScript Section for International Telephone Input -->
    <script>
        // This is some code to get the list of countries for the FLAG/Codes
        jQuery(document).ready(($) => {

            var input = document.querySelector("#input_ContactYourNumber");
            window.intlTelInput(input, {});
            var input2 = $('#customs_select_form input[name="cs_contact_info_emergency_no"]').get(0);

            window.intlTelInput(input2, {});

        });
    </script>

</div>