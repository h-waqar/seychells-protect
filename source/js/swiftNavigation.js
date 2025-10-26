class SwiftNavigation {
  // javascript global object

  $ = null;
  btn_GroupPassportResponseContinue = null;
  sb_Array = null;
  // title_MsgNavAuthFailed = "Error";
  // desc_MsgNavAuthFailed = "Please fill the information of current pages to move on.";
  btn_GroupPassportInfoPrev = null;
  btn_ProcessingPeriodContinue = null;
  btn_MedicalProtectionContinue = null;
  sb_ProcessingPeriod = null;
  sb_MedicalProtection = null;
  // btn_ProcessingPeriodPrev = null;
  sb_CompleteYourApplication = null;

  constructor($) {
    // init Jquery
    this.$ = $;
    this.init();
  }

  init() {
    this.sb_Array = [
      _visaSwift.sb_PassportInformation,
      _visaSwift.sb_SelfiePhoto,
      _visaSwift.sb_ContactInformation,
      _visaSwift.sb_TripInformation,
      _visaSwift.sb_groupPassportInfo,
      _visaSwift.sb_HealthDeclaration,
      _visaSwift.sb_CustomsDeclaration,
      _visaSwift.sb_RequiredDocuments,
      _visaSwift.sb_OptionalDocuments,
      _visaSwift.sb_ConfirmProceed,
      _visaSwift.sb_PaymentOptions,
    ];

    this.btn_GroupPassportResponseContinue = this.$(
      "#btn_GroupPassportResponseContinue"
    ).get(0);
    this.btn_ProcessingPeriodContinue = this.$(
      "#btn_ProcessingPeriodContinue"
    ).get(0);
    this.btn_MedicalProtectionContinue = this.$(
      "#btn_MedicalProtectionContinue"
    ).get(0);
    this.sb_ProcessingPeriod = this.$("#sb_ProcessingPeriod").get(0);
    this.sb_MedicalProtection = this.$("#sb_MedicalProtection").get(0);
    this.sb_CompleteYourApplication = this.$("#sb_CompleteYourApplication").get(
      0
    );

    if (this.sb_Array) {
      this.sb_Array.forEach((sb_one) => {
        this.$(sb_one).on("click", () => {
          // Function to run when an element is clicked
          this.navigationClear(sb_one);
        });
      });
    }

    if (_visaSwift.sb_PassportInformation) {
      _visaSwift.sb_PassportInformation.addEventListener(
        "click",
        this.passport.bind(this)
      );
    }

    if (_visaSwift.sb_SelfiePhoto) {
      _visaSwift.sb_SelfiePhoto.addEventListener(
        "click",
        this.selfie.bind(this)
      );
    }

    if (_visaSwift.sb_ContactInformation) {
      _visaSwift.sb_ContactInformation.addEventListener(
        "click",
        this.contactInfo.bind(this)
      );
    }

    if (_visaSwift.btn_PaymentOptionPrev) {
      _visaSwift.btn_PaymentOptionPrev.addEventListener(
        "click",
        this.handle_PrevPaymentOptions.bind(this)
      );
    }

    if (_visaSwift.btn_ProceedPrev) {
      _visaSwift.btn_ProceedPrev.addEventListener(
        "click",
        this.handle_btnProceedPrev.bind(this)
      );
    }

    if (_visaSwift.btn_OptionalDocsPrev) {
      _visaSwift.btn_OptionalDocsPrev.addEventListener(
        "click",
        this.handle_btnOptionalDocsPrev.bind(this)
      );
    }

    if (_visaSwift.btn_CustomsInfoPrev) {
      _visaSwift.btn_CustomsInfoPrev.addEventListener(
        "click",
        this.handle_btnCustomsInfoPrev.bind(this)
      );
    }

    if (_visaSwift.btn_RequiredDocsPrev) {
      _visaSwift.btn_RequiredDocsPrev.addEventListener(
        "click",
        this.handle_btnRequiredDocsPrev.bind(this)
      );
    }

    if (_visaSwift.btn_HealthInfoPrev) {
      _visaSwift.btn_HealthInfoPrev.addEventListener(
        "click",
        this.handle_btnHealthInfoPrev.bind(this)
      );
    }

    if (_visaSwift.btn_TripInfoPrev) {
      _visaSwift.btn_TripInfoPrev.addEventListener(
        "click",
        this.handle_btnTripInfoPrev.bind(this)
      );
    }

    if (_visaSwift.btn_TripInfoContinue) {
      _visaSwift.btn_TripInfoContinue.addEventListener(
        "click",
        this.handle_btnTripInfoContinue.bind(this)
      );
    }

    if (_visaSwift.btn_SummaryPrev) {
      _visaSwift.btn_SummaryPrev.addEventListener(
        "click",
        this.handle_btnSummaryPrev.bind(this)
      );
    }

    if (_visaSwift.btn_SummaryContinue) {
      _visaSwift.btn_SummaryContinue.addEventListener(
        "click",
        this.handle_btnSummaryContinue.bind(this)
      );
    }

    if (_visaSwift.btn_ContactInfoPrev) {
      _visaSwift.btn_ContactInfoPrev.addEventListener(
        "click",
        this.handle_btnContactInfoPrev.bind(this)
      );
    }

    if (_visaSwift.btn_ContactInfoContinue) {
      _visaSwift.btn_ContactInfoContinue.addEventListener(
        "click",
        this.handle_btnContactInfoContinue.bind(this)
      );
    }

    if (_visaSwift.btn_SelfieResponsePrev) {
      _visaSwift.btn_SelfieResponsePrev.addEventListener(
        "click",
        this.handle_btnSelfieResponsePrev.bind(this)
      );
    }

    if (_visaSwift.btn_SelfiePhotoPrev) {
      _visaSwift.btn_SelfiePhotoPrev.addEventListener(
        "click",
        this.handle_btnSelfiePhotoPrev.bind(this)
      );
    }

    // if (_visaSwift.btn_PassportResponsePrev) {
    //     _visaSwift.btn_PassportResponsePrev.addEventListener('click', this.handle_btnPassportResponsePrev.bind(this));
    // }

    // if (_visaSwift.sb_TripInformation) {
    //     _visaSwift.sb_TripInformation.addEventListener('click', this.handle_btnHealthInfoPrev.bind(this));
    // }

    if (_visaSwift.sb_TripInformation) {
      _visaSwift.sb_TripInformation.addEventListener(
        "click",
        this.handle_sbTripInformation.bind(this)
      );
    }

    if (_visaSwift.sb_HealthDeclaration) {
      _visaSwift.sb_HealthDeclaration.addEventListener(
        "click",
        this.handle_btnCustomsInfoPrev.bind(this)
      );
    }

    if (this.btn_GroupPassportResponseContinue) {
      this.btn_GroupPassportResponseContinue.addEventListener(
        "click",
        this.contactInfo.bind(this)
      );
    }

    // if (this.btn_GroupPassportResponseContinue) {
    //     this.btn_GroupPassportResponseContinue.addEventListener('click', this.navigationClear.bind(this));
    // }

    if (this.btn_ProcessingPeriodContinue) {
      this.btn_ProcessingPeriodContinue.addEventListener(
        "click",
        this.handle_btnProcessingPeriodContinue.bind(this)
      );
    }

    if (this.btn_MedicalProtectionContinue) {
      this.btn_MedicalProtectionContinue.addEventListener(
        "click",
        this.handle_btnMedicalProtectionContinue.bind(this)
      );
    }

    if (this.sb_ProcessingPeriod) {
      this.sb_ProcessingPeriod.addEventListener(
        "click",
        this.moveToProcessingPeriod.bind(this)
      );
    }

    if (this.sb_MedicalProtection) {
      this.sb_MedicalProtection.addEventListener(
        "click",
        this.handle_btnProcessingPeriodContinue.bind(this)
      );
    }

    if (this.sb_CompleteYourApplication) {
      this.sb_CompleteYourApplication.addEventListener(
        "click",
        this.handle_btnMedicalProtectionContinue.bind(this)
      );
    }

    // if (this.btn_ProcessingPeriodPrev) {
    //     this.btn_ProcessingPeriodPrev.addEventListener('click', this.handle_btnProcessingPeriodPrev.bind(this));
    // }

    //
    this.btn_GroupPassportInfoPrev = this.$("#btn_GroupPassportInfoPrev").get(
      0
    );

    if (this.btn_GroupPassportInfoPrev) {
      this.btn_GroupPassportInfoPrev.addEventListener(
        "click",
        this.handle_btnGroupPassportInfoPrev.bind(this)
      );
    }
  }

  // handle_btnProcessingPeriodPrev(event){

  // }

  // !: TODO
  handle_btnMedicalProtectionContinue(event) {
    // validation form medical protection
    let valid = _swiftFV.medicalProtection();
    if (!valid) {
      // _visaSwift.alertDanger(
      //   "Selection Required",
      //   "Please choose one of the provided options to advance further."
      // );
      return;
    }

    this.prepareNavigation();
    this.$("#three_ContactInfo").removeClass("hidden");
    this.$("#bsNavBasicInfo").addClass("bs-active");

    _visaSwift.showTitle(
      "Complete your Application",
      "Pay safely and securely using one of the payment methods below. All application fees and donations are non-refundable and non-transferrable. Third party providers' terms & conditions and refund policies apply"
    );

    // set the per day price in protection
  }

  handle_btnContactInfoContinue(event) {
    let valid = _swiftFV.personalInformation();
    if (!valid) {
      // _visaSwift.alertDanger(
      //   "All Fields Required",
      //   "Please fill in all the highlighted  fields"
      // );
      return;
    }

    this.prepareNavigation();
    this.$("#four_TripInfo").removeClass("hidden");
    this.$("#bsNavYourGp").addClass("bs-active");

    _visaSwift.showTitle(
      "Selfie or Photo",
      "Please upload a selfie or passport-type photo."
    );
  }

  handle_btnTripInfoContinue(e) {
    let valid = _swiftFV.tripInformation();
    if (!valid) {
      // _visaSwift.alertDanger(
      //   "All Fields Required",
      //   "Please fill in all the highlighted fields"
      // );
      return;
    }

    _swiftUiManager.prepareSummary();

    this.prepareNavigation();
    this.$("#four_summary").removeClass("hidden");
    this.$("#bsNavReviewSubmit").addClass("bs-active");

    _visaSwift.showTitle(
      "Contact Information",
      "We require this information to process your application and get in contact with you if we have any question or need more information."
    );
  }

  handle_btnProcessingPeriodContinue(event) {
    if (!_swiftFV.processingPeriod()) return;

    this.prepareNavigation();
    this.$("#medicalProtection").removeClass("hidden");
    this.$("#sb_MedicalProtection").addClass("cs-arrow");
    this.$("#sb_MedicalProtection").removeClass("cs-checked");
    this.$("#sb_MedicalProtection").removeClass("cs_disabled");
    this.$("#sb_ProcessingPeriod").addClass("cs-checked");

    _visaSwift.showTitle(
      "24/7 Medical Protection",
      "Stay safe during your travels. A late-night private doctors visit to your hotel can be very expensive and difficult to book. Protect yourself with private medical assistance from Doctors 24/7 with international doctors who visit all hotels, boats & villas on any island in Seychelles. Enjoy your vacation with peace of mind. This is not health insurance, so no approval for a claim is needed and all pre-existing conditions are covered. This is not a requirement for travel to the Seychelles."
    );

    // Prepare Summary For User

    // save the processing period  in storage class
    _swiftStorage.processingPeriod = this.$(
      '#processingPeriod input[name="cs_processing_period"]:checked'
    ).val();
  }

  handle_btnGroupPassportInfoPrev(event) {
    this.prepareNavigation();
    this.$(_visaSwift.sec_TripInfo).removeClass("hidden");
    _visaSwift.sb_TripInformation.classList.remove("cs-arrow");

    this.$(_visaSwift._bsContainer).removeClass("d-flex");
    this.$(_visaSwift._bsContainer).addClass("hidden");
  }

  handle_sbTripInformation(event) {
    this.prepareNavigation();
    this.$(_visaSwift.sec_TripInfo).removeClass("hidden");
    _visaSwift.sb_TripInformation.classList.add("cs-arrow");

    _visaSwift.showTitle("Trip Information", "Provide details about your trip");
  }

  handle_btnPassportResponsePrev(event) {
    this.prepareNavigation();
    this.$(_visaSwift.one_UploadPassport).removeClass("hidden");
    _visaSwift.sb_PassportInformation.classList.add("cs-arrow");

    _visaSwift.showTitle("Passport Information", "");
  }

  groupPassport(event) {
    this.prepareNavigation();

    this.$(_visaSwift.container_GroupPassportUpload).removeClass("hidden");
    _visaSwift.sb_PassportInformation.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Passport Information for Your Group",
      "For each member of your group, please provide a photo or scan of the first page of their passport with their photo on it."
    );
  }

  handle_btnSelfiePhotoPrev(event) {
    this.prepareNavigation();
    this.$(_visaSwift.one_PassportResponse).removeClass("hidden");
    _visaSwift.sb_PassportInformation.classList.add("cs-arrow");

    _visaSwift.showTitle("Passport Information", "");
  }

  handle_btnSelfieResponsePrev(event) {
    this.prepareNavigation();
    this.$(_visaSwift.two_SelfiePhoto).removeClass("hidden");
    _visaSwift.sb_SelfiePhoto.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Selfie or Photo",
      "Please upload a selfie or passport-type photo."
    );
  }

  handle_btnContactInfoPrev(event) {
    this.prepareNavigation();
    this.$("#medicalProtection").removeClass("hidden");
    this.$("#bsNavBasicInfo").removeClass("bs-active");

    // this.$(_visaSwift.selfiePhotoResponse).removeClass("hidden");
    // _visaSwift.sb_SelfiePhoto.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Selfie or Photo",
      "Please upload a selfie or passport-type photo."
    );
  }

  handle_btnHealthInfoPrev(event) {
    this.prepareNavigation();

    this.$(_visaSwift.sec_TripInfo).removeClass("hidden");
    _visaSwift.sb_TripInformation.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Trip Information",
      "Provide details about your trip."
    );
  }

  handle_btnRequiredDocsPrev(event) {
    this.prepareNavigation();
    this.$(_visaSwift.six_Customs).removeClass("hidden");
    _visaSwift.sb_CustomsDeclaration.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Custom Declaration",
      "Answer a few questions related to biosecurity, customs and law enforcement."
    );
  }

  handle_btnCustomsInfoPrev(event) {
    this.prepareNavigation();
    this.$(_visaSwift.five_HealthDeclaration).removeClass("hidden");
    _visaSwift.sb_HealthDeclaration.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Health Declaration",
      "Answer a few questions related to your current health."
    );
  }

  handle_btnOptionalDocsPrev(event) {
    this.prepareNavigation();
    this.$(_visaSwift.seven_RequiredDocs).removeClass("hidden");
    _visaSwift.sb_RequiredDocuments.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Required Documents",
      "Please upload the required document(s) below."
    );
  }

  handle_btnProceedPrev(event) {
    this.prepareNavigation();
    this.$(_visaSwift.eight_OptionalDocs).removeClass("hidden");
    _visaSwift.sb_OptionalDocuments.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Optional Documents",
      "Please upload any additional documents that might help process your application."
    );
  }

  handle_PrevPaymentOptions(event) {
    this.prepareNavigation();
    this.$(_visaSwift.nine_Proceed).removeClass("hidden");
    _visaSwift.sb_ConfirmProceed.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Optional Documents",
      "Please upload any additional documents that might help process your application."
    );
  }

  paymentOptions() {
    this.prepareNavigation();
    this.$(_visaSwift.ten_PaymentOptions).removeClass("hidden");
    _visaSwift.sb_PaymentOptions.classList.add("cs-arrow");

    _visaSwift.sb_ConfirmProceed.classList.add("cs-checked");
    _visaSwift.sb_ConfirmProceed.classList.remove("cs-arrow");

    _visaSwift.showTitle("Confirm and Proceed", "");
  }

  optionalDocs() {
    this.prepareNavigation();
    this.$(_visaSwift.eight_OptionalDocs).removeClass("hidden");
    _visaSwift.sb_OptionalDocuments.classList.add("cs-arrow");

    _visaSwift.sb_RequiredDocuments.classList.add("cs-checked");
    _visaSwift.sb_RequiredDocuments.classList.remove("cs-arrow");

    _visaSwift.showTitle(
      "Optional Documents",
      "Please upload any additional documents that might help process your application."
    );
  }

  confirmAndProceed() {
    this.prepareNavigation();
    this.$(_visaSwift.nine_Proceed).removeClass("hidden");

    _visaSwift.sb_ConfirmProceed.classList.add("cs-arrow");

    this.$("#sb_ConfirmProceed").removeClass("cs_disabled");
    if (_visaSwift._applicationSingle) {
      _visaSwift.sb_OptionalDocuments.classList.add("cs-checked");
      _visaSwift.sb_OptionalDocuments.classList.remove("cs-arrow");
    } else {
    }

    _visaSwift.showTitle("Confirm and Proceed", "");
  }

  customDeclaration() {
    this.prepareNavigation();
    this.$(_visaSwift.six_Customs).removeClass("hidden");

    if (_visaSwift._applicationSingle) {
      _visaSwift.sb_HealthDeclaration.classList.add("cs-checked");
      _visaSwift.sb_HealthDeclaration.classList.remove("cs-arrow");
    } else {
      _visaSwift.sb_CustomsDeclaration.classList.add("cs-arrow");
      this.$("#sb_CustomsDeclaration").removeClass("cs_disabled");
    }

    _visaSwift.showTitle(
      "Custom Declaration",
      "Answer a few questions related to biosecurity, customs and law enforcement."
    );
  }

  healthDeclaration() {
    this.prepareNavigation();

    this.$(_visaSwift.five_HealthDeclaration).removeClass("hidden");

    _visaSwift.sb_TripInformation.classList.add("cs-checked");
    _visaSwift.sb_TripInformation.classList.remove("cs-arrow");
    _visaSwift.sb_HealthDeclaration.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Health Declaration",
      "Answer a few questions related to your current health."
    );
  }

  tripInfo(e) {
    this.prepareNavigation();

    this.$(_visaSwift.sec_TripInfo).removeClass("hidden");

    _visaSwift.sb_ContactInformation.classList.remove("cs-arrow");
    _visaSwift.sb_ContactInformation.classList.add("cs-checked");
    _visaSwift.sb_TripInformation.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Trip Information",
      "Provide details about your trip."
    );
  }

  requiredDocs() {
    this.prepareNavigation();
    this.$(_visaSwift.seven_RequiredDocs).removeClass("hidden");

    _visaSwift.sb_RequiredDocuments.classList.add("cs-arrow");

    _visaSwift.sb_CustomsDeclaration.classList.add("cs-checked");
    _visaSwift.sb_CustomsDeclaration.classList.remove("cs-arrow");

    _visaSwift.showTitle(
      "Required Documents",
      "Please upload the required document(s) below."
    );
  }

  contactInfo(e) {
    this.prepareNavigation();
    this.$(_visaSwift.three_ContactInfo).removeClass("hidden");

    if (_visaSwift._applicationSingle) {
      _visaSwift.sb_ContactInformation.classList.add("cs-arrow");
    } else {
      // Group Application
      this.$("#sb_ContactInformation").addClass("hidden");
      this.$("#sb_GroupContactInformation").removeClass("hidden");
      this.$("#sb_GroupContactInformation").removeClass("cs_disabled");
      this.$("#sb_GroupContactInformation").addClass("cs-arrow");
      this.$("#sb_groupPassportInfo").addClass("cs-checked");
      this.$("#sb_groupPassportInfo").removeClass("cs_disabled");
    }

    _visaSwift.showTitle(
      "Contact Information",
      "We require this information to process your application and get in contact with you if we have any question or need more information."
    );
  }

  moveToProcessingPeriod() {
    this.prepareNavigation();
    this.$("#processingPeriod").removeClass("hidden");
    this.$("#sb_ProcessingPeriod").removeClass("cs-checked");
    this.$("#sb_ProcessingPeriod").addClass("cs-arrow");
    this.$("#sb_ProcessingPeriod").removeClass("cs_disabled");

    _visaSwift.showTitle(
      "Processing Period",
      "Select the best option below based on your flight check-in time. Your airline may refuse to check you in without a valid Travel Authorisation. All prices are exclusive of bank fees."
    );
  }

  hide_SinglePassportNavigationOne() {
    this.$("#sb_PassportInformation").addClass("hidden");
    this.$("#sb_SelfiePhoto").addClass("hidden");
    this.$("#sb_ContactInformation").addClass("hidden");
    this.$("#sb_TripInformation").addClass("hidden");
    this.$("#sb_HealthDeclaration").addClass("hidden");
    this.$("#sb_CustomsDeclaration").addClass("hidden");
    this.$("#sb_RequiredDocuments").addClass("hidden");
    this.$("#sb_OptionalDocuments").addClass("hidden");
    this.$("#sb_ConfirmProceed").addClass("hidden");
    this.$("#sb_PaymentOptions").addClass("hidden");
  }

  display_SinglePassportNavigationTwo() {
    this.$("#sb_ProcessingPeriod").removeClass("hidden");
    this.$("#sb_MedicalProtection").removeClass("hidden");
    this.$("#sb_CompleteYourApplication").removeClass("hidden");
  }

  prepareNavigation() {
    /**
     * Check if user is eligible to navigate
     */

    /**
     * Hide all pages
     */

    this.$(_visaSwift.sec_TripInfo).addClass("hidden");
    this.$(_visaSwift.three_ContactInfo).addClass("hidden");
    this.$(_visaSwift.one_UploadPassport).addClass("hidden");
    this.$(_visaSwift.two_SelfiePhoto).addClass("hidden");
    this.$(_visaSwift.five_HealthDeclaration).addClass("hidden");
    this.$(_visaSwift.six_Customs).addClass("hidden");
    this.$(_visaSwift.seven_RequiredDocs).addClass("hidden");
    this.$(_visaSwift.eight_OptionalDocs).addClass("hidden");
    this.$(_visaSwift.nine_Proceed).addClass("hidden");
    this.$(_visaSwift.ten_PaymentOptions).addClass("hidden");
    this.$(_visaSwift.selfiePhotoResponse).addClass("hidden");
    this.$(_visaSwift.one_PassportResponse).addClass("hidden");
    this.$(_visaSwift.container_GroupPassportUpload).addClass("hidden");
    this.$(_visaSwift.four_summary).addClass("hidden");

    this.$("#processingPeriod").addClass("hidden");
    this.$("#medicalProtection").addClass("hidden");

    this.$("#group_PassportResponse").addClass("hidden");

    /**
     * Hide arrow from all sidebar items
     */

    this.$("#sidebar_ProgressBar li").removeClass("cs-arrow");
  }

  selfie(e) {
    this.prepareNavigation();
    this.$(_visaSwift.two_SelfiePhoto).removeClass("hidden");
    _visaSwift.sb_SelfiePhoto.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Selfie or Photo",
      "Please upload a selfie or passport-type photo."
    );
  }

  handle_btnTripInfoPrev(e) {
    this.prepareNavigation();
    this.$("#three_ContactInfo").removeClass("hidden");
    this.$("#bsNavYourGp").removeClass("bs-active");

    //   _visaSwift.sb_ContactInformation.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Contact Information",
      "We require this information to process your application and get in contact with you if we have any question or need more information."
    );
  }

  handle_btnSummaryPrev(e) {
    this.prepareNavigation();
    this.$("#four_TripInfo").removeClass("hidden");
    this.$("#bsNavReviewSubmit").removeClass("bs-active");

    //   _visaSwift.sb_ContactInformation.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Contact Information",
      "We require this information to process your application and get in contact with you if we have any question or need more information."
    );
  }

  handle_btnSummaryContinue(e) {
    this.prepareNavigation();
    this.$("#ten_PaymentOptions").removeClass("hidden");
    this.$("#bsNavCheckout").addClass("bs-active");

    //   _visaSwift.sb_ContactInformation.classList.add("cs-arrow");

    _visaSwift.showTitle(
      "Contact Information",
      "We require this information to process your application and get in contact with you if we have any question or need more information."
    );
  }

  passport(e) {
    this.prepareNavigation();

    this.$(_visaSwift.one_UploadPassport).removeClass("hidden");
    _visaSwift.sb_PassportInformation.classList.add("cs-arrow");

    _visaSwift.showTitle("Passport Information", "");
  }

  prepareSidebar() {
    if (_visaSwift._applicationSingle) {
      // Do active Sidebars for a group
      this.$(_visaSwift.sb_TripInformation).removeClass("hidden");
      this.$(_visaSwift.sb_PassportInformation).removeClass("hidden");
      this.$(_visaSwift.sb_ContactInformation).removeClass("hidden");
      // this.$(_visaSwift.sb_CustomsDeclaration).removeClass('hidden');
      // this.$(_visaSwift.sb_ConfirmProceed).removeClass('hidden');

      // this.$(_visaSwift.sb_SelfiePhoto).removeClass('hidden');
      // this.$(_visaSwift.sb_HealthDeclaration).removeClass('hidden');
      // this.$(_visaSwift.sb_RequiredDocuments).removeClass('hidden');
      // this.$(_visaSwift.sb_OptionalDocuments).removeClass('hidden');

      // show sidebar item code remove class
      this.$(_visaSwift.sb_groupPassportInfo).addClass("hidden");
      this.$(_visaSwift.sb_PaymentOptions).addClass("hidden");
    } else {
      // Create Sidebar
      this.$(_visaSwift.sb_TripInformation).removeClass("hidden");
      this.$(_visaSwift.sb_groupPassportInfo).removeClass("hidden");
      this.$(_visaSwift.sb_ContactInformation).removeClass("hidden");
      // this.$(_visaSwift.sb_CustomsDeclaration).removeClass('hidden');
      // this.$(_visaSwift.sb_RequiredDocuments).removeClass('hidden');
      // this.$(_visaSwift.sb_ConfirmProceed).removeClass('hidden');

      // show sidebar item code remove class
      this.$(_visaSwift.sb_groupPassportInfo).addClass("hidden");
      this.$(_visaSwift.sb_SelfiePhoto).addClass("hidden");
      this.$(_visaSwift.sb_HealthDeclaration).addClass("hidden");
      // this.$(_visaSwift.sb_RequiredDocuments).addClass('hidden');
      this.$(_visaSwift.sb_OptionalDocuments).addClass("hidden");
    }
  }

  move_NextFromPassportPage() {
    if (!_visaSwift._applicationSingle) {
      /**
       * Group Passport is Uploading
       */

      var sectionToMove = this.$(".group_p_response").get(0);
      var targetDiv = this.$("#wrap_MultiplPassports");
      targetDiv.append(sectionToMove.outerHTML);

      this.$(_visaSwift.group_PassportResponse).removeClass("hidden");
      this.$(_visaSwift.container_GroupPassportUpload).addClass("hidden");
    } else {
      /**
       * Single Passport Is Uploading
       */

      this.$(_visaSwift._containerUploadPassport).addClass("hidden");
      this.$("#one_PassportResponse").removeClass("hidden");

      if (!_visaSwift._applicationSingle)
        this.$("#btn_PResAddPassport").removeClass("hidden");
      else this.$("#btn_PResAddPassport").addClass("hidden");
    }
  }

  navigationClear(currentIdClick) {
    let checked = false;

    this.sb_Array.forEach((sb_one) => {
      console.log(sb_one + " This is the element");

      if (sb_one !== currentIdClick) {
        if (!checked) {
          this.$(sb_one).addClass("checked");
        } else {
          this.$(sb_one).removeClass("checked");
        }
      } else {
        checked = true;
      }
    });
  }
}

jQuery(document).ready(() => {
  window._swiftNavigation = new SwiftNavigation(jQuery);
});
