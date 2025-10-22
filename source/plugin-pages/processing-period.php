<section id="processingPeriod" class="processingPeriod hidden">

    <div class="cs-container">
        <div class="question-wrapper">
            <div class="cs-qna-radio">

                <!-- I am the APPLICANT -->
                <div class="mb-2">
                    <input type="radio" id="input_StandardProcessing" name="cs_processing_period"
                           value="standard" checked >
                    <label class="cs-form-control" for="input_StandardProcessing">
                        <h4>Standard Processing <span>€10.00</span></h4>
                        <p>- Your application will be processed in 24 hours or less.</p>
                        <p>- Basic support</p>

                        <!--           Alert Danger           -->
                        <span class="processing-alert hidden" >
                            <div class="alert alert-danger" id="alert_StandardProcessing" role="alert">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                <p>
                                    <strong>Your trip starts very soon!</strong>
                                    We cannot guarantee your Travel Authorisation will be approved before your trip.
                                </p>
                            </div>
                        </span>

                    </label>
                </div>

                <!-- I am NOT the APPLICANT -->
                <!-- <div class="mb-2">
                    <input type="radio" id="input_PremiumProcessing" name="cs_processing_period"
                           value="premium">
                    <label class="cs-form-control" for="input_PremiumProcessing">
                        <h4>Premium Processing <span>€30.00</span></h4>
                        <div class="mb-1">
                                <span class="btn-best-value">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                BEST VALUE
                            </span>
                        </div>
                        <p>- Your application will be processed in 6 hours or less.</p>
                        <p>- Dedicated application agent for queries and support.</p>
                        <p>- Premium support including email, WhatsApp and live chat.</p>
                        <p>- Flexibility to change your travel dates up to 5 days if your plans change</p>

               
                        <span class="processing-alert hidden">
                            <div class="alert alert-danger" id="alert_StandardProcessing" role="alert">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                <p>
                                    <strong>Your trip starts very soon!</strong>
                                    We cannot guarantee your Travel Authorisation will be approved before your trip.
                                </p>
                            </div>
                        </span>

                    </label>
                </div> -->

                <!-- I am NOT the APPLICANT -->
                <!-- <div class="mb-2">
                    <input type="radio" id="input_UrgentProcessing" name="cs_processing_period"
                           value="urgent">
                    <label class="cs-form-control" for="input_UrgentProcessing">
                        <h4>Urgent Processing <span>€70.00</span></h4>
                        <p>- Your application will be processed in 60 minutes or less.</p>
                        <p>- Premium support including email, WhatsApp, live chat and direct telephone support.</p>
                        <p>- Flexibility to change your travel dates up to 5 days if your plans change</p>

                        <span class="processing-alert hidden">
                            <div class="alert alert-success" id="alert_StandardProcessing" role="alert">
                                <i class="fa fa-check-circle me-2" aria-hidden="true"></i>

                                <p>
                                    <strong>Your trip starts very soon!</strong>
                                    We cannot guarantee your Travel Authorisation will be approved before your trip.
                                </p>
                            </div>
                        </span>

                    </label>
                </div> -->

            </div>
        </div>

        <!-- Prev/Next (<_>) Button Wrapper -->

        <div class="cs-button-wrapper text-right mt-4 me-1 float-end">
            <!-- <button type="button" class="border-0 bg-transparent pr-3" id="btn_ProcessingPeriodPrev">
                <span class="dashicons dashicons-arrow-left-alt2"></span>
                Previous
            </button> -->
            <button type="button" class="btn btn-info" id="btn_ProcessingPeriodContinue">Continue</button>
        </div>

    </div>

</section>


<script>
    const processing_period = document.querySelectorAll('#processingPeriod .question-wrapper .cs-qna-radio label input');

    processing_period.forEach((item) => {
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