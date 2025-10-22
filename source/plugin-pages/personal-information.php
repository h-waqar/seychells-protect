<div id="introStepThreeContainer">

    <!-- Section for Contact Information -->
    <section id="three_ContactInfo" class="">

        <div class="cs-container">

            <div class="bs-headings">
                <h1>Personal Information</h1>
                <p>
                    Please provide a photo or scan of the biographic data page of our passport.
                    This is the page featuring your photo, name, etc.
                </p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Phone Number Input -->
                    <div class="mb-3">
                        <label for="input_ContactYourNumber" class="form-label">Phone Number</label>
                        <input type="tel" id="input_ContactYourNumber" class="form-control d-block"
                            placeholder="Phone Number" name="cs_contact_info_phone_no">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="input_ContactYourEmail" class="form-label">Email</label>
                        <input type="email" id="input_ContactYourEmail" class="form-control" placeholder="Email"
                            name="cs_contact_info_email">
                    </div>
                </div>
            </div>

            <!-- Confirm Email -->
            <!-- <div class="mb-3">
                <label for="input_ContactConfirmEmail" class="form-label">Confirm Email</label>
                <input type="email" id="input_ContactConfirmEmail" class="form-control" placeholder="Confirm Email"
                    name="cs_contact_info_confirm_email">
            </div> -->

            <!-- Home Address Input -->
            <!-- <div class="mb-3">
                <label for="input_ContactHomeAddress" class="form-label">Home Address</label>
                <input type="text" id="input_ContactHomeAddress" class="form-control" placeholder="Home Address"
                    name="cs_contact_info_email">
            </div> -->

            <!-- Select Occupation Dropdown -->
            <!-- <div class="mb-3 hidden">
                <label for="cs_contact_info_occupation" class="form-label">Select Occupation</label>
                <select name="cs_contact_info_occupation" id="cs_ContactInfoOccupation" class="form-select"
                    aria-label="Default select example">
                    <option value="" class="d-none">Select Occupation</option>
                    <option value="Employee (government entities)">Employee (government entities)</option>
                    <option value="Employee (private company)">Employee (private company)</option>
                    <option value="Self-employed">Self-employed</option>
                    <option value="Not working by choice">Not working by choice</option>
                    <option value="Retired">Retired</option>
                    <option value="Student">Student</option>
                    <option value="Other">Other</option>
                </select>
            </div> -->

            <!-- Emergency Contact Section -->
            <!-- <h5 class="m-0 pt-2 text-dark">Emergency Contacts (optional)</h5>
            <p class="m-0">Please specify at least one emergency contact.</p> -->


            <!-- Duplicate Emergency Contact Details -->
            <div id="contact_Duplicate">


                <div class="cs-contact-details cs-emergency-contact-numbers" id="customs_select_form">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Emergency Contact Name Input -->
                            <div class="mb-3">
                                <label for="emg_contact_name">Full Name</label>
                                <input type="text" class="form-control" onchange="_swiftFV.handle_emgContact(this)"
                                    name="emg_contact_name" placeholder="Full Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Emergency Contact Phone Number Input -->
                            <div class="mb-3">
                                <label>Date of birth</label>
                                <input type="date" onchange="_swiftFV.handle_emgTelephone(this)"
                                    class="form-control d-block" placeholder="Date Of Birth" name="">
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