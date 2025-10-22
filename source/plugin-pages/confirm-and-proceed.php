<div id="clinicalQuestionOne">

    <section id="nine_Proceed" class="hidden">
        <div class="cs-container">

            <p class="mb-3">
                I hereby declare and confirm that I have filled the information required accurately,
                completely and correctly,
                and that I have not withheld any relevant medical information or made any misleading statements.
                In case any of the above information is found to be false or untrue or misleading or misrepresenting,
                I am aware that I shall be held liable for it.
                I understand
                and agree that this declaration is final and irrevocable and accept to digitally sign this request.
                The information provided can be reviewed and edited by clicking on the relevant sections.
                I have read and agreed to the Terms and Conditions of Use, as well as the Data Privacy Policy.
            </p>

            <!-- Question Wrapper -->
            <div class="question-wrapper">
                <div class="cs-qna-radio">

                    <!-- I am the APPLICANT -->
                    <input type="radio" id="input_Applicant" name="cs_applicant_agree" value="yes">
                    <label class="cs-form-control" for="input_Applicant">
                        I am the applicant, and I understand and agree that this declaration is final and irrevocable
                        and accept to digitally sign this request.
                    </label>
                    <!-- I am NOT the APPLICANT -->
                    <input type="radio" id="input_NotApplicant" name="cs_applicant_agree" value="No">
                    <label class="cs-form-control" for="input_NotApplicant">
                        I am NOT the applicant, and I am completing this form on behalf of someone, either as an agent,
                        as a legal guardian or as a parent of a child for whom I have legal authority. I do understand
                        and agree that this declaration is final and irrevocable and accept to digitally sign this
                        request.
                    </label>

                    <!-- Form inside the I AM NOT AN APPLICANT :D-->
                    <div id="proceed_NotApplicantContact" class="d-none">

                        <div class="cs-contact-details">

                            <!-- Not Applicant Contact Name Input -->
                            <div class="my-3">
                                <input type="text" class="form-control" name="proceed_contact_name"
                                       placeholder="Your Name">
                            </div>

                            <!-- Not Applicant Phone Number Input -->
                            <div class="mb-3 form-control-input">
                                <input type="tel" id="input_NotApplicantNumber" class="form-control d-block"
                                       placeholder="Phone Number" name="proceed_contact_number">
                            </div>

                            <!-- Not Applicant Email Address Input -->
                            <div class="mb-3">
                                <input type="email" class="form-control d-block" placeholder="Email Address"
                                       name="proceed_email">
                            </div>

                        </div>

                    </div>


                </div>
            </div>

            <!-- Additional Notes -->
            <div class="mb-2 cs-additional-notes">
                <h3>Additional Notes</h3>
                <textarea name="proceed_additional_notes" id="input_ConfirmNotes" cols="100" rows="4"></textarea>
            </div>


        </div>

        <!-- Prev/Next (<_>) Button Wrapper -->

        <div class="cs-button-wrapper text-right mt-4 me-1 float-end">
            <button type="button" class="border-0 bg-transparent pr-3" id="btn_ProceedPrev">
                <span class="dashicons dashicons-arrow-left-alt2"></span>
                Previous
            </button>
            <button type="button" class="btn btn-info" id="btn_ProceedContinue">Continue</button>
        </div>

    </section>

    <script>
        const nine_Proceed = document.querySelectorAll('#nine_Proceed .question-wrapper label input');

        nine_Proceed.forEach((item) => {
            item.addEventListener('change', function (e) {
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

        // This is for the country flags/codes in phone no
        // This is some code to get the list of countries for the FLAG/Codes
        var input = document.querySelector("#input_NotApplicantNumber");
        window.intlTelInput(input, {});


        const input_NotApplicant = document.getElementById('input_NotApplicant');
        const input_Applicant = document.getElementById('input_Applicant');
        const form_NotApplicantContact = document.getElementById('proceed_NotApplicantContact');

        input_NotApplicant.addEventListener("change", (event) => {
            if (input_NotApplicant.checked) {
                form_NotApplicantContact.classList.remove('d-none');
            }
        });

        input_Applicant.addEventListener("change", (event) => {
            if (input_Applicant.checked) {
                form_NotApplicantContact.classList.add('d-none');
            }
        });
    </script>

</div>