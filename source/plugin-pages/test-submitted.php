<?php if ($form_success == true) {  ?>
    <div class="container-fluid" id="bsTestSubmitted">
        <section class="bs-test-submitted">
            <div class="bs-container">
                <h3>Your request for the TruCheck test has been submitted successfully.</h3>
                <p>We will now review your details to confirm your eligibility for the TruCheck test.
                    This is normally completed within 3 working days.
                    We will then contact you to schedule your blood draw.</p>
                <p>You will receive email updates at each stage.</p>
                <p>If you have any questions, then you can contact as at <a href="#">help@cancerscanuk.co.uk</a> or
                    <strong>+44 20 8133 8193.</strong>
                </p>
            </div>
        </section>
    </div>
<?php } else { ?>



    <div class="container-fluid" id="bsTestSubmitted">
        <section class="bs-test-submitted">
            <div class="bs-container">
                <h3><?php echo $error_message; ?></h3>

            </div>
        </section>
    </div>


<?php } ?>