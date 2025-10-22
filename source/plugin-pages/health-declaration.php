<!-- Health Declaration -->

<div id="basicInfoOne">

    <section id="five_HealthDeclaration" class="hidden">
        <div class="cs-container">


            <!-- <p>List any country you have
            or will be traveling to in the 14 days prior to arrival in Seychelles.</p> -->

            <!--            <div class="country-select-shadow">-->
            <div class="country-select-shadow">
                <div class="cs-country-select health_country_search" id="multiCountryWrap1">
                    <div class="cs-country-container">

                    </div>
                </div>
            </div>
            <!--            </div>-->

            <!-- QNA Starts here -->
            <div class="question-wrapper health_declaration_qr">
                <div class="cs-qna-radio">
                    <p>Have you had any of the following symptoms (cough; fever; flu-like symptoms; shortness of breath;
                        joint pain, loss of taste or smell, diarrhea) at any time during the past 14 days?</p>

                    <input type="radio" id="input_HealthSymptomsYes" name="cs_health_symptoms" value="yes">
                    <label class="cs-form-control" for="input_HealthSymptomsYes">
                        Yes
                    </label>

                    <input type="radio" id="input_HealthSymptomsNo" name="cs_health_symptoms" value="No">
                    <label class="cs-form-control" for="input_HealthSymptomsNo">
                        No
                    </label>
                </div>
            </div>

        </div>


        <!-- Prev/Next (<_>) Button Wrapper -->

        <div class="cs-button-wrapper">
            <button type="button" class="border-0 bg-transparent pr-3" id="btn_HealthInfoPrev">
                <span class="dashicons dashicons-arrow-left-alt2"></span>
                Previous
            </button>
            <button type="button" class="btn btn-info" id="btn_HealthInfoContinue">Continue</button>
        </div>


    </section>

    <script>
        const allItems1 = document.querySelectorAll('#five_HealthDeclaration .question-wrapper label input');

        allItems1.forEach((item) => {
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
    </script>

</div>