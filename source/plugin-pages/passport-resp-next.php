<section id="selfie_PopUp" class="cs-slide-popup">

    <div class="cs-close-popup">
    <span>
      <i id="close_Popup" class="fa fa-times" aria-hidden="true"></i>
    </span>
    </div>


    <div class="cs-popup-body">

        <!--        HEAD        -->

        <!-- This is the Passport INfo @ the top of PopUp -->
        <div id="group_ResSelfie" class="hidden">
			<?php require_once( 'group-pass-res-selfie.php' ) ?>
        </div>

        <!--        BODY        -->

        <!-- This should appear when the user clicks on the Take a Selfie -->
        <div id="group_UploadSelfie" class="hidden">
			<?php require_once( 'group-upload-selfie.php' ); ?>
        </div>

        <!-- This should appear when the user clicks on the Use This Photo -->
        <div id="group_UseThisSelfie" class="hidden">
			<?php require_once( 'group-use-this-selfie.php' ); ?>
        </div>

        <!-- OnClick Health Declaration  -->
        <div id="group_HealthDeclaration" class="">
			<?php require_once( 'group-health-declaration.php' ); ?>
        </div>

        <!-- This should appear onclick of Optional Documents -->
        <div id="group_OptDocs" class="hidden">
			<?php require_once( 'group-opt-docs.php' ); ?>
        </div>

    </div>

    <!--        FOOTER        -->

    <div class="cs-popup-footer">
        <hr>

        <!--    This is for UPLOAD YOUR SELFIE    -->
        <div id="groupF_UploadSelfie" class="btn-upload-your-selfie">
            <div class="cs-group-pop-up-btn">
                <div class="cs-button-wrapper">
                    <button type="button" class="btn btn-info w-100" id="btn_GroupUseThisPhoto">Use This
                        Photo
                    </button>
                </div>
            </div>
        </div>

        <!--        This is for the Retry/Upload Selfie         -->

        <div id="groupF_RetryUploadSelfie" class="btn-retry-upload-selfie hidden">
            <div class="cs-outlined-button">
                <button type="button" class="btn btn-outline-success w-100" id="btn_GroupRetryPhoto">Retry</button>
            </div>
            <div class="cs-button-wrapper">
                <button type="button" class="btn btn-info  w-100" id="btn_GroupUseThisPhotoConfirm">Use This Photo
                </button>
            </div>
        </div>

        <!--        This is for the Health Declaration         -->

        <div id="groupF_HealthDeclaration" class="btn-group-health-declaration hidden">
            <div class="cs-outlined-button">
                <button type="button" class="btn btn-outline-success w-100" id="btn_GroupHealthSaveExit">Exit
                </button>
            </div>
            <div class="cs-button-wrapper">
                <button type="button" class="btn btn-info  w-100" id="btn_GroupHealthContinue">Save</button>
            </div>
        </div>

        <!--        This is for the document         -->

        <div id="groupF_Document" class="btn-group-document hidden">
            <div class="cs-outlined-button">
                <button type="button" class="btn btn-outline-success w-100" id="btn_GroupDocsSaveExit">Save & Exit
                </button>
            </div>
            <div class="cs-button-wrapper">
                <button type="button" class="btn btn-info  w-100" id="btn_GroupDocsContinue">Continue</button>
            </div>
        </div>

    </div>


</section>