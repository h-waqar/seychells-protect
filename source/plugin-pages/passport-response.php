<div id="introStepOneContainer">

    <section id="one_PassportResponse" class="hidden">

        <div class="cs-container">

            <div class="row">

                <div class="col-md-6">
                    <div class="image-wrapper">
                        <img id="res_PImg"
                             src=""
                             alt="your-image">
                    </div>
                </div>

                <div class="col-md-6 cs-user-info">
                    <div class="user-bio">
                        <p class="lead m-0">FULL NAME</p>
                        <p><strong id="res_FullName">--A-----</strong></p>
                    </div>

                    <div class="user-bio">
                        <p class="lead m-0">DOCUMENT NUMBER</p>
                        <p><strong id="res_DocNo">---S----</strong></p>
                    </div>

                    <div class="user-bio">
                        <p class="lead m-0">DATE OF BIRTH</p>
                        <p><strong id="res_DoB">---D----</strong></p>
                    </div>

                    <div class="user-bio">
                        <p class="lead m-0">VALIDITY</p>
                        <p><strong id="res_Valid">----F---</strong></p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-check">

                        <input class="form-check-input" type="checkbox" id="checkbox_PageOnePassport"
                               name="checkbox_PageOnePassport">

                        <label class="form-check-label d-flex mt-4" for="checkbox_PageOnePassport">
                            I have reviewed the name and date of birth as scanned from this identity document along with
                            its number and expiry date and confirm that it is correct.
                        </label>

                    </div>
                </div>

                <div id="btn_PResAddPassport" class="mt-3 cs-outlined-button hidden">
                    <button type="button" class="btn btn-outline-success w-100" id="btn_MultiPassport"><i>+</i>Add
                        Another Individual
                    </button>
                </div>


            </div>

        </div>


        <!-- Prev/Next (<_>) Button Wrapper -->
        <div class="cs-button-wrapper">
            <button type="button" class="border-0 bg-transparent pr-3" id="btn_PassportResponsePrev">
                <span class="dashicons dashicons-arrow-left-alt2"></span>
                Previous
            </button>
            <button type="button" class="btn btn-info" id="btn_PassportResponseContinue" disabled>Continue</button>
        </div>

    </section>

</div>