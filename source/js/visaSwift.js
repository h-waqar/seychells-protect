class VisaSwift {
  /**
   * If this variable is true means application is booking for a single person
   * Else if this is false means group application is booking
   */

  /**
   * These are the global variables
   */

  // Width of the screen
  _viewWidth = null;
  btn_PaymentOptionContinue = null;

  // Production Variables
  _applicantId = null;
  _applicationSingle = false;
  _selectedCountry = null;
  _seychellesCitizen = false;

  /**
   * These are Javascript variables that contain  html elements
   */

  _pageOne = null;
  _pageTwo = null;
  _pageThree = null;
  _pageFour = null;
  _pageFive = null;

  _btnPageOneContinue = null;
  _btnPageTwoContinue = null;
  _btnPageTwoPrev = null;
  _btnPageThreeContinue = null;
  _btnPageFourContinue = null;
  _readAndAgreedcheckbox = null;
  _btnPageThreePrev = null;

  _containerUploadPassport = null;
  _bsContainer = null;
  _btnPageFourPrev = null;
  btn_GoBackHome = null;

  _closeSummaryTotal = null;
  // bg_Summary = null;
  btn_ViewSummary = null;
  btn_RequiredDocsContinue = null;
  btn_AddStayingAddress = null;
  container_GroupPassportUpload = null;
  /**
   *  Group Response BTN what to show in popup
   */

  _radioTripCitizen = null;
  _radioTripNotCitizen = null;

  _btnGroupTakeSelfie = null;
  _btnGroupHealthDeclaration = null;
  _btnGroupOptDocs = null;

  _groupResSelfie = null;
  _groupUploadSelfie = null;
  _groupHealthDeclaration = null;
  _groupOptDocs = null;
  _PopUp = null;
  _closePopup = null;

  /**
   * Ids of HTML Elements
   */
  _PageStart = null;
  _idPageOne = "container_PageOne";
  _idPageTwo = "container_PageTwo";

  _singleOrGroupRadioButtons = null;

  sb_PassportInformation = null;

  // sidebar_ProgressBar = null;

  sb_SelfiePhoto = null;
  sb_ContactInformation = null;
  sb_TripInformation = null;
  sb_HealthDeclaration = null;
  sb_CustomsDeclaration = null;
  sb_RequiredDocuments = null;
  sb_OptionalDocuments = null;
  sb_ConfirmProceed = null;
  sb_PaymentOptions = null;

  img_SelfieResponseSrc = null;
  btn_HealthInfoPrev = null;

  /**
   * This is For the btn to go Previous
   */
  btn_PassportInfoPrev = null;
  // btn_PassportResponsePrev = null;
  btn_PageFiveContinue = null;
  btn_PageFivePrev = null;
  one_UploadPassport = null;

  btn_SelfiePhotoPrev = null;
  btn_TripInfoPrev = null;
  btn_TripInfoContinue = null;
  /**
   * This is for the Continue/Next -->
   */
  btn_PassportInfoContinue = null;
  btn_PassportResponseContinue = null;
  btn_SelfiePhotoContinue = null;
  sec_TripInfo = null;
  input_SelfiePhoto = null;
  selfiePhotoResponse = null;
  img_SelfiePhoto = null;
  two_SelfiePhoto = null;
  six_Customs = null;
  seven_RequiredDocs = null;
  sb_groupPassportInfo = null;
  btn_SelfieResponseContinue = null;

  three_ContactInfo = null;
  _bsTitle = null;
  _bsSubTitle = null;
  btn_ContactInfoContinue = null;
  five_HealthDeclaration = null;
  btn_HealthInfoContinue = null;
  eight_OptionalDocs = null;
  ten_PaymentOptions = null;
  page_ThanYou = null;
  one_PassportResponse = null;
  btn_CustomsInfoContinue = null;

  nine_Proceed = null;
  input_UploadAirlineDocs = null;
  btn_ProceedContinue = null;
  input_ConfirmNotes = null;
  input_UploadAccomodationDocs = null;
  input_UploadOptionalDocs = null;
  btn_OptionalDocsContinue = null;
  btn_PaymentOptionPrev = null;
  btn_ProceedPrev = null;
  btn_OptionalDocsPrev = null;
  btn_ContactInfoPrev = null;
  btn_ContactInfoContinue = null;
  btn_CustomsInfoPrev = null;
  btn_RequiredDocsPrev = null;
  btn_SelfieResponsePrev = null;
  input_ContactHomeAddress = null;
  group_PassportResponse = null;

  /**
   * Inputs
   */

  _inputPassportInfo = null;

  // javascript global object
  $ = null;

  constructor($) {
    // init Jquery
    this.$ = $;
    this.init();
  }

  init() {
    this._pageOne = document.getElementById(this._idPageOne);
    this._pageTwo = document.getElementById(this._idPageTwo);
    this._pageThree = this.$("#container_PageThree").get(0);
    this._pageFour = this.$("#page_four").get(0);
    this._pageFive = this.$("#container_PageFive").get(0);
    this.sb_TripInformation = this.$("#sb_TripInformation").get(0);

    this._btnPageOneContinue = document.getElementById("btn_PageOneContinue");

    this._btnPageTwoPrev = this.$("#btn_PageTwoPrev").get(0);
    this._btnPageTwoContinue = this.$("#btn_PageTwoContinue").get(0);
    this._btnPageThreeContinue = this.$("#btn_PageThreeContinue").get(0);
    this._btnPageFourContinue = this.$("#btn_PageFourContinue").get(0);
    this._PageStart = this.$("#container_StartTrip").get(0);

    this._inputPassportInfo = this.$("#input_PassportInfo").get(0);

    this._readAndAgreedcheckbox = this.$("#checkbox_PageTwoAgreed").get(0);

    this._btnPageThreePrev = this.$("#btn_PageThreePrev").get(0);
    this.btn_GoBackHome = this.$("#btn_GoBackHome").get(0);
    this._containerUploadPassport = this.$("#one_UploadPassport").get(0);
    this._bsContainer = this.$("#bsContainer").get(0);
    this._btnPageFourPrev = this.$("#btn_PageFourPrev").get(0);

    this.sb_PassportInformation = this.$("#sb_PassportInformation").get(0);
    this.sb_SelfiePhoto = this.$("#sb_SelfiePhoto").get(0);
    this.sb_ContactInformation = this.$("#sb_ContactInformation").get(0);
    this.sb_TripInformation = this.$("#sb_TripInformation").get(0);
    this.sb_HealthDeclaration = this.$("#sb_HealthDeclaration").get(0);
    this.sb_CustomsDeclaration = this.$("#sb_CustomsDeclaration").get(0);
    this.sb_RequiredDocuments = this.$("#sb_RequiredDocuments").get(0);
    this.sb_OptionalDocuments = this.$("#sb_OptionalDocuments").get(0);
    this.sb_ConfirmProceed = this.$("#sb_ConfirmProceed").get(0);
    this.sb_PaymentOptions = this.$("#sb_PaymentOptions").get(0);
    this.input_SelfiePhoto = this.$("#input_SelfiePhoto").get(0);
    this.selfiePhotoResponse = this.$("#selfiePhotoResponse").get(0);
    this.img_SelfiePhoto = this.$("#img_SelfiePhoto").get(0);
    this.img_SelfieResponseSrc = this.$("#img_SelfieResponseSrc").get(0);
    this.sb_HealthDeclaration = this.$("#sb_HealthDeclaration").get(0);
    this.btn_PaymentOptionContinue = this.$("#btn_PaymentOptionContinue").get(
      0
    );
    this._radioTripCitizen = document.querySelector(
      'label[for="radio_StartTripCitizen"]'
    );
    this._radioTripNotCitizen = document.querySelector(
      'label[for="radio_StartTripTourist"]'
    );

    this.two_SelfiePhoto = this.$("#two_SelfiePhoto").get(0);
    this.btn_SelfieResponseContinue = this.$("#btn_SelfieResponseContinue").get(
      0
    );
    this.three_ContactInfo = this.$("#three_ContactInfo").get(0);
    this._bsTitle = this.$("#bsTitle").get(0);
    this._bsSubTitle = this.$("#bsSubTitle").get(0);
    this.btn_ContactInfoContinue = this.$("#btn_ContactInfoContinue").get(0);
    this.one_UploadPassport = this.$("#one_UploadPassport").get(0);

    this._closeSummaryTotal = this.$("#close_SummaryTotal").get(0);
    this._bgSummary = this.$("#bg_Summary").get(0);
    this.btn_ViewSummary = this.$("#btn_ViewSummary").get(0);
    this.five_HealthDeclaration = this.$("#five_HealthDeclaration").get(0);
    this.btn_HealthInfoContinue = this.$("#btn_HealthInfoContinue").get(0);
    this.six_Customs = this.$("#six_Customs").get(0);
    this.seven_RequiredDocs = this.$("#seven_RequiredDocs").get(0);
    this.eight_OptionalDocs = this.$("#eight_OptionalDocs").get(0);
    this.ten_PaymentOptions = this.$("#ten_PaymentOptions").get(0);
    this.one_PassportResponse = this.$("#one_PassportResponse").get(0);
    this.btn_CustomsInfoContinue = this.$("#btn_CustomsInfoContinue").get(0);
    this.input_UploadAirlineDocs = this.$("#input_UploadAirlineDocs").get(0);
    this.btn_ProceedContinue = this.$("#btn_ProceedContinue").get(0);
    this.input_ConfirmNotes = this.$("#input_ConfirmNotes").get(0);

    this.btn_RequiredDocsContinue = this.$("#btn_RequiredDocsContinue").get(0);
    this.input_UploadOptionalDocs = this.$("#input_UploadOptionalDocs").get(0);
    this.btn_OptionalDocsContinue = this.$("#btn_OptionalDocsContinue").get(0);
    this.btn_PaymentOptionPrev = this.$("#btn_PaymentOptionPrev").get(0);
    this.btn_ProceedPrev = this.$("#btn_ProceedPrev").get(0);
    this.btn_OptionalDocsPrev = this.$("#btn_OptionalDocsPrev").get(0);
    this.btn_CustomsInfoPrev = this.$("#btn_CustomsInfoPrev").get(0);
    this.btn_RequiredDocsPrev = this.$("#btn_RequiredDocsPrev").get(0);
    this.btn_HealthInfoPrev = this.$("#btn_HealthInfoPrev").get(0);
    this.btn_ContactInfoPrev = this.$("#btn_ContactInfoPrev").get(0);
    this.btn_ContactInfoContinue = this.$("#btn_ContactInfoContinue").get(0);
    // this.btn_TripInfoContinue = this.$("#btn_TripInfoContinue").get(0);
    this.btn_SummaryPrev = this.$("#btn_SummaryPrev").get(0);
    this.btn_SummaryContinue = this.$("#btn_SummaryContinue").get(0);
    this.btn_SelfieResponsePrev = this.$("#btn_SelfieResponsePrev").get(0);
    this.input_ContactHomeAddress = this.$("#input_ContactHomeAddress").get(0);
    this.input_UploadAccomodationDocs = this.$(
      "#input_UploadAccomodationDocs"
    ).get(0);
    this._btnGroupTakeSelfie = this.$("#btn_TakeASelfie").get(0);
    this._btnGroupHealthDeclaration = this.$("#btn_HealthDeclaration").get(0);
    this._btnGroupOptDocs = this.$("#btn_OptDocs").get(0);

    this._groupResSelfie = this.$("#group_ResSelfie").get(0);
    this._groupUploadSelfie = this.$("#group_UploadSelfie").get(0);
    this._groupHealthDeclaration = this.$("#group_HealthDeclaration").get(0);
    this._groupOptDocs = this.$("#group_OptDocs").get(0);
    this._PopUp = this.$("#selfie_PopUp").get(0);
    this._closePopup = this.$("#close_Popup").get(0);
    this._viewWidth = this.$(window).width();
    this.btn_AddStayingAddress = this.$("#btn_AddStayingAddress").get(0);
    this.container_GroupPassportUpload = this.$(
      "#container_GroupPassportUpload"
    ).get(0);
    this.group_PassportResponse = this.$("#group_PassportResponse").get(0);
    this.page_ThanYou = this.$("#page_ThanYou").get(0);
    // this.anotherButton = this.$('#anotherButton').get(0);

    /**
     * This is for Prev
     */
    this.btn_PassportInfoPrev = this.$("#btn_PassportInfoPrev").get(0);
    this.btn_PageFiveContinue = this.$("#btn_PageFiveContinue").get(0);
    this.btn_PageFivePrev = this.$("#btn_PageFivePrev").get(0);

    // this.btn_PassportResponsePrev = this.$('#btn_PassportResponsePrev').get(0);
    this.btn_SelfiePhotoPrev = this.$("#btn_SelfiePhotoPrev").get(0);

    this.sec_TripInfo = this.$("#four_TripInfo").get(0);
    this.four_summary = this.$("#four_summary").get(0);
    this.btn_TripInfoPrev = this.$("#btn_TripInfoPrev").get(0);
    this.btn_TripInfoContinue = this.$("#btn_TripInfoContinue").get(0);
    this.nine_Proceed = this.$("#nine_Proceed").get(0);
    this.sb_groupPassportInfo = this.$("#sb_groupPassportInfo").get(0);

    /**
     * This is for Continue
     */
    this.btn_PassportInfoContinue = this.$("#btn_PassportInfoContinue").get(0);
    this.btn_SelfiePhotoContinue = this.$("#btn_SelfiePhotoContinue").get(0);
    this.btn_PassportResponseContinue = this.$(
      "#btn_PassportResponseContinue"
    ).get(0);

    // Get all radio buttons with the name 'cs_radio_location_card'
    this._singleOrGroupRadioButtons = document.querySelectorAll(
      'input[name="radio_single_or_group_application"]'
    );

    // Add a change event listener to each radio button
    this._singleOrGroupRadioButtons.forEach(function (radioButton) {
      radioButton.addEventListener("change", function () {
        // Check which radio button is selected

        if (radioButton.checked) {
          // this.handle_SingleOrGroupApplication(radioButton.value);
          if (radioButton.value === "single") {
            window._visaSwift._applicationSingle = true;
          } else {
            window._visaSwift._applicationSingle = false;
            // this._applicationSingle = false;
          }
        }
      });
    });

    /**
     * Add On Click Listeners to buttons
     */

    // Add a click listener to the button
    if (this._btnPageOneContinue) {
      this._btnPageOneContinue.addEventListener(
        "click",
        this.handle_btnPageOneContinue.bind(this)
      );
    }

    if (this._btnPageTwoPrev) {
      this._btnPageTwoPrev.addEventListener(
        "click",
        this.handlePageTwoPrev.bind(this)
      );
    }

    if (this._btnPageTwoContinue) {
      this._btnPageTwoContinue.addEventListener(
        "click",
        this.handle_btnPageTwoContinue.bind(this)
      );
    }

    if (this.btn_RequiredDocsContinue) {
      this.btn_RequiredDocsContinue.addEventListener(
        "click",
        this.handle_btnRequiredDocsContinue.bind(this)
      );
    }

    if (this._btnPageThreeContinue) {
      this._btnPageThreeContinue.addEventListener(
        "click",
        this.handle_btnPageThreeContinue.bind(this)
      );
    }

    if (this._btnPageFourContinue) {
      this._btnPageFourContinue.addEventListener(
        "click",
        this.handle_btnPageFourContinue.bind(this)
      );
    }

    if (this._inputPassportInfo) {
      this._inputPassportInfo.addEventListener(
        "change",
        this.handle_passportUpload.bind(this)
      );
    }

    if (this.btn_GoBackHome) {
      this.btn_GoBackHome.addEventListener(
        "click",
        this.handle_btn_GoBackHome.bind(this)
      );
    }

    if (this._readAndAgreedcheckbox) {
      this._readAndAgreedcheckbox.addEventListener(
        "change",
        this.handle_btnReadAndAgreed.bind(this)
      );
    }

    if (this._btnPageThreePrev) {
      this._btnPageThreePrev.addEventListener(
        "click",
        this.handle_PageThreePrev.bind(this)
      );
    }

    if (this._btnPageFourPrev) {
      this._btnPageFourPrev.addEventListener(
        "click",
        this.handle_PageFourPrev.bind(this)
      );
    }

    if (this.btn_PassportInfoPrev) {
      this.btn_PassportInfoPrev.addEventListener(
        "click",
        this.handle_btnPassportInfoPrev.bind(this)
      );
    }

    if (this.btn_PageFiveContinue) {
      this.btn_PageFiveContinue.addEventListener(
        "click",
        this.handle_btnPageFiveContinue.bind(this)
      );
    }

    if (this.btn_PageFivePrev) {
      this.btn_PageFivePrev.addEventListener(
        "click",
        this.handle_btnPageFivePrev.bind(this)
      );
    }

    if (this.btn_SelfieResponseContinue) {
      this.btn_SelfieResponseContinue.addEventListener(
        "click",
        this.handle_btnSelfieResponseContinue.bind(this)
      );
    }

    if (this.btn_ViewSummary) {
      this.btn_ViewSummary.addEventListener(
        "click",
        this.handle_btnViewSummary.bind(this)
      );
    }

    if (this._closeSummaryTotal) {
      this._closeSummaryTotal.addEventListener(
        "click",
        this.handle_closeSummaryTotal.bind(this)
      );
    }

    if (this._btnGroupTakeSelfie) {
      this._btnGroupTakeSelfie.addEventListener(
        "click",
        this.handle_btnGroupTakeSelfie.bind(this)
      );
    }

    if (this._btnGroupHealthDeclaration) {
      this._btnGroupHealthDeclaration.addEventListener(
        "click",
        this.handle_btnGroupHealthDeclaration.bind(this)
      );
    }

    if (this._btnGroupOptDocs) {
      this._btnGroupOptDocs.addEventListener(
        "click",
        this.handle_btnGroupOptDocs.bind(this)
      );
    }

    if (this._closePopup) {
      this._closePopup.addEventListener(
        "click",
        this.handle_closePopup.bind(this)
      );
    }

    /**
     * This is for Previous OnClick
     */

    if (this.input_SelfiePhoto) {
      this.input_SelfiePhoto.addEventListener(
        "change",
        this.handle_inputSelfiePhoto.bind(this)
      );
    }

    // if (this.btn_TripInfoContinue) {
    //   this.btn_TripInfoContinue.addEventListener(
    //     "click",
    //     this.handle_btnTripInfoContinue.bind(this)
    //   );
    // }

    /**
     * This is for Continue OnClick
     */

    if (this.btn_PassportInfoContinue) {
      this.btn_PassportInfoContinue.addEventListener(
        "click",
        this.handle_btnPassportInfoContinue.bind(this)
      );
    }

    if (this.btn_PassportResponseContinue) {
      this.btn_PassportResponseContinue.addEventListener(
        "click",
        this.handle_btnPassportResponseContinue.bind(this)
      );
    }

    // if (this.btn_ContactInfoContinue) {
    //   this.btn_ContactInfoContinue.addEventListener(
    //     "click",
    //     this.handle_btnContactInfoContinue.bind(this)
    //   );
    // }

    if (this.btn_HealthInfoContinue) {
      this.btn_HealthInfoContinue.addEventListener(
        "click",
        this.handle_btnHealthInfoContinue.bind(this)
      );
    }

    if (this.btn_CustomsInfoContinue) {
      this.btn_CustomsInfoContinue.addEventListener(
        "click",
        this.handle_btnCustomsInfoContinue.bind(this)
      );
    }

    if (this.input_UploadAirlineDocs) {
      this.input_UploadAirlineDocs.addEventListener(
        "change",
        this.handle_inputUploadAirlineDocs.bind(this)
      );
    }

    if (this.btn_ProceedContinue) {
      this.btn_ProceedContinue.addEventListener(
        "click",
        this.handle_btnProceedContinue.bind(this)
      );
    }

    if (this.input_ConfirmNotes) {
      this.input_ConfirmNotes.addEventListener(
        "click",
        this.handle_inputConfirmNotes.bind(this)
      );
    }

    // if (this.btn_SelfiePhotoContinue) {
    // 	this.btn_SelfiePhotoContinue.addEventListener('click',
    // 	this.handle_btnSelfiePhotoContinue.bind(this));
    // }

    if (this.btn_AddStayingAddress) {
      this.btn_AddStayingAddress.addEventListener(
        "click",
        this.handle_btnAddStayingAddress.bind(this)
      );
    }

    if (this.btn_OptionalDocsContinue) {
      this.btn_OptionalDocsContinue.addEventListener(
        "click",
        this.handle_btnOptionalDocsContinue.bind(this)
      );
    }

    if (this.input_UploadOptionalDocs) {
      this.input_UploadOptionalDocs.addEventListener(
        "change",
        this.handle_inputUploadOptionalDocs.bind(this)
      );
    }

    if (this.input_UploadAccomodationDocs) {
      this.input_UploadAccomodationDocs.addEventListener(
        "change",
        this.handle_inputUploadAccomodationDocs.bind(this)
      );
    }

    if (this.btn_PaymentOptionContinue) {
      this.btn_PaymentOptionContinue.addEventListener(
        "click",
        this.handle_btnPaymentOptionContinue.bind(this)
      );
    }

    // if (this._radioTripCitizen) {
    //     this._radioTripCitizen.addEventListener('click', this.handle_radioTripType.bind(this));
    // }

    if (this._radioTripNotCitizen) {
      this._radioTripNotCitizen.addEventListener(
        "click",
        this.handle_radioTripType.bind(this)
      );
    }
  }

  handle_btnPaymentOptionContinue(e) {
    /**
     * Handle Payment
     */

    if (!_swiftFV.payment()) return;
    let _pageData = _swiftStorage.paymentInfo();

    let _data = {
      action: "cybersource_sy",
      data: _pageData,
      applicantId: this._applicantId,
      amount: _swiftStorage._swiftGrandTotal,
      processing_period: this._processingPlan,
    };

    this.runSpinner(true);
    _ajaxRequest
      .call(_data, "json", "post")
      .error((error) => {
        console.log(error);
      })
      .then((response) => {
        this.runSpinner(false);

        if (response.success) {
          _swiftUiManager.handle_PaymentSuccessful();
        } else {
          _visaSwift.alertDanger("Sorry! Operation Failed", response.message);
        }
      });
  }

  handle_btnAddStayingAddress(event) {
    let iN = this.$("#tripInfoWrap .tripInfoWrap").length;
    iN++;

    let html = `
        <div class="tripInfoWrap">

                    <div class="cs-address-where-staying">

                        <h5>
                            Address in Seychelles
                            <span onclick="_swiftFV.removeStayingAddress(this)">
                                <i class="fa fa-trash"></i>
                                remove
                            </span>
                        </h5>

                        <div class="mb-2 address-in-seychelles">
                            <label class="cs-form-outline d-flex" for="text_TripInfoAddress">
                                <div>
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                                <div class="w-100">
                                    <input type="text" class="remove-input-style trip_address" name="cs_trip_info_address"
                                           placeholder="Where are you staying in the Seychelles?">
                                </div>
                            </label>
                        </div>

                        <div class="row mb-2 trip-from-to">

                            <!-- Date Staying FROM -->
                            <div class="col-md-6">
                                <div class="p-0 mb-2 cs-form-outline">
                                    <label class="p-3 d-block m-0 d-flex" for="date_TripInfoStayingFrom${iN}">
                                        <i class="fa fa-calendar-o m-0" aria-hidden="true"></i>
                                    </label>
                                    <div class="w-100 overflow-hidden">
                                        <input type="text" class="datepicker-field remove-input-style ms-3" name="cs_trip_info_date_from"
                                               placeholder="From Date" id="date_TripInfoStayingFrom${iN}" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Date Staying TO -->
                            <div class="col-md-6">
                                <div class="p-0 mb-2 cs-form-outline">
                                    <label class="p-3 d-block m-0 d-flex" for="date_TripInfoStayingTo${iN}">
                                        <i class="fa fa-calendar-o m-0" aria-hidden="true"></i>
                                    </label>
                                    <div class="w-100 overflow-hidden">
                                        <input id="date_TripInfoStayingTo${iN}" type="text" class="datepicker-field remove-input-style ms-3" name="cs_trip_info_date_to"
                                               placeholder="To Date" readonly>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
        `;

    this.$("#tripInfoWrap").append(html);
  }

  handle_btnAddMonetaryAmount(event) {
    let iN = this.$("#tripInfoWrap .tripInfoWrap").length;
    iN++;

    let html = `
        <div class="row add-monetary-instrument">

                        <h6 class="text-dark">
                            <strong>Select Form</strong>
                            <span class="remove-button" onclick="_swiftFV.removeContact(this)"><i class="fa fa-trash"></i>remove</span>
                        </h6>

                        <div class="col-md-6">

                            <div class="mb-2">
                                <select name="cs_trip_info_select_country_end"
                                        class="form-select">
                                    <option class="hidden">Select Monetary Instrument</option>

                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Bill of exchange">Bill of exchange</option>
                                    <option value="Promissory note">Promissory note</option>
                                    <option value="Traveler's cheque">Traveler's cheque</option>
                                    <option value="Bearer bond">Bearer bond</option>
                                    <option value="Money Order">Money Order</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-3 px-md-0">

                            <div class="mb-2">
                                <select name="cs_trip_info_select_country_end"
                                        class="form-select">
                                    <option class="hidden">Select Currency</option>
                                    <optgroup label="Frequently Selected">
                                        <option value="SCR">SCR</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="GBP">GBP</option>
                                        <option value="AED">AED</option>
                                    </optgroup>

                                    <optgroup label="All Currencies">
                                        <option value="CHF">CHF</option>
                                        <option value="RUB">RUB</option>
                                        <option value="ILS">ILS</option>
                                        <option value="AUD">AUD</option>
                                        <option value="JPY">JPY</option>
                                        <option value="CAD">CAD</option>
                                        <option value="INR">INR</option>
                                        <option value="INR">INR</option>
                                        <option value="ZAR">ZAR</option>
                                        <option value="MUR">MUR</option>
                                        <option value="SAR">SAR</option>
                                    </optgroup>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="mb-2">
                                <input type="text" name="text_DeparturePrivateFlightNo" class="form-control"
                                       id="number_MonetaryCurrencyAmount"
                                       placeholder="Amount" style="padding: 0.6rem;"
                                >
                            </div>

                        </div>

                    </div>
        `;

    this.$("#monetaryInstrument").append(html);
  }

  handle_btnOptionalDocsContinue(event) {
    this.$("#sb_OptionalDocuments").removeClass("cs_disabled");
    this.$("#sb_ConfirmProceed").removeClass("cs_disabled");
    _swiftNavigation.confirmAndProceed();
  }

  handle_inputUploadOptionalDocs(event) {
    let selectedFile = event.target.files[0];

    if (selectedFile) {
      this.runSpinner(true);

      let _data = new FormData();
      _data.append("action", "optional_document_sy");
      _data.append("optional_document", selectedFile);
      _data.append("applicantId", this._applicantId);

      _data.append("documentNumber", _swiftStorage._documentNumber);
      _data.append("applicationSingle", _visaSwift._applicationSingle);

      _ajaxRequest
        .imageCall(_data, "json", "post")
        .error((error) => {
          console.log(error);
        })
        .then((response) => {
          this.runSpinner(false);

          if (response.success) {
            this.$("#sb_OptionalDocuments").removeClass("cs_disabled");
            _swiftStorage.saveOptinalDoc(response);
            this.display_OptionalDocument(response);
          }

          if (!_visaSwift._applicationSingle) {
            // validate multipassport
            _swiftMP.validate();
          }
        });
    }
  }

  display_OptionalDocument(data) {
    let html = `<div class="cs-view-docs">

		
		<div class="w-100">
			<p class="file-name">${data.filename}</p>
		</div>

		<div data-file-url="${data.file_url}" onclick="_visaSwift.handle_popupShowFile(this)">
			<i class="fa fa-eye"></i>
		</div>

		<div>
			<i data-id="${data.attachment_id}" data-doc-name="optional" onclick="_visaSwift.delAccDocument(this)" class="fa fa-trash"></i>
		</div>

		
	</div>`;

    if (_visaSwift._applicationSingle) this.$("#optionalDocs").append(html);
    else this.$("#groupOptionalDocs").append(html);
  }

  handle_inputUploadAccomodationDocs(event) {
    let selectedFile = event.target.files[0];

    if (selectedFile) {
      this.runSpinner(true);

      let _data = new FormData();
      _data.append("action", "accommodation_booking_document_sy");
      _data.append("accommodation_booking_doc", selectedFile);
      _data.append("applicantId", this._applicantId);
      _data.append("documentNumber", _swiftStorage._documentNumber);

      _ajaxRequest.imageCall(_data, "json", "post").then((response) => {
        this.runSpinner(false);

        if (response.success) {
          this.display_AccomodationDocument(response);

          // Get the computed style of the element
          var computedStyle = window.getComputedStyle(
            this.$(".cs-accomodation-confirm")[0]
          );

          // Check if the computed border property matches the expected value
          if (
            computedStyle.getPropertyValue("border") ===
            "1px solid rgb(255, 0, 0)"
          ) {
            // Remove the inline border style property from elements with class cs-accomodation-confirm
            this.$(".cs-accomodation-confirm").removeAttr("style");
          }
        }
      });
    }
  }

  display_AccomodationDocument(data) {
    let html = `<div class="cs-view-docs">

    		<div class="w-100">
			    <p class="file-name">${data.filename}</p>
		    </div>

		    <div data-file-url="${data.file_url}" onclick="_visaSwift.handle_popupShowFile(this)">
			    <i class="fa fa-eye"></i>
		    </div>

		    <div>
		    	<i data-id="${data.attachment_id}" data-doc-name="accomodation" onclick="_visaSwift.delAccDocument(this)" class="fa fa-trash"></i>
	    	</div>

    	</div>`;

    this.$("#accomodationDocs").append(html);
  }

  // Delete Document Code

  delAccDocument(e) {
    let id = e.getAttribute("data-id");
    let docName = e.getAttribute("data-doc-name");

    if (!this._applicantId || this._applicantId == 0 || id <= 0) {
      alert("Something went wrong here");
      return;
    }

    if (confirm("Are you sure? you want to delete the document?")) {
      let _data = {
        action: "delete_document_sy",
        applicantId: this._applicantId,
        doc_id: id,
        docName: docName,
      };

      this.runSpinner(true);

      _ajaxRequest
        .call(_data, "json", "post")
        .error((error) => {
          console.log(error);
        })
        .then((response) => {
          this.runSpinner(false);

          if (response.success) {
            _swiftUiManager.deleteDocumentWithId(id, docName);
            // _swiftNavigation.paymentOptions();
          } else {
            alert("Operation Failed");
          }
        });
    } // confirm if ends
    // function ends
  }

  handle_popupShowFile(e) {
    let fileUrl = e.getAttribute("data-file-url");
    console.log(fileUrl);

    let html = `
        <div class="cs-pop-up-view-docs" onclick="this.style.display = 'none'; document.body.style.overflow = ''; ">
            
            <div class="cs-iframe-wrapper">            
                <iframe width="100%" height="100%"  src="${fileUrl}" scrolling="yes"></iframe>             
            </div>            
               
        </div>`;

    this.$("body").append(html);
    this.$("body").css("overflow", "hidden");
  }

  handle_btnRequiredDocsContinue(event) {
    let _validStatus = _swiftFV.requiredDocs();

    if (_validStatus) {
      if (_visaSwift._applicationSingle) {
        if (!_visaSwift._seychellesCitizen) {
          _swiftNavigation.optionalDocs();
        } else {
          _swiftNavigation.confirmAndProceed();
          this.$("#sb_RequiredDocuments").addClass("cs-checked");
        }

        this.$("#sb_OptionalDocuments").removeClass("cs_disabled");
      } else {
        _swiftNavigation.confirmAndProceed();

        this.$("#sb_RequiredDocuments").removeClass("cs_disabled");
        this.$("#sb_RequiredDocuments").addClass("cs-arrow");
        this.$("#sb_ConfirmProceed").removeClass("cs_disabled");
      }
      this.$("#sb_RequiredDocuments").removeClass("cs_disabled");
    }
  }

  handle_inputConfirmNotes(event) {}

  handle_btnProceedContinue(event) {
    if (!this._applicantId || this._applicantId == 0) {
      alert("Applicant Id is empty");
      return;
    }

    /**
     * If validation becomes false dont move just return
     * proceedContinue function should display errors
     */

    if (!_swiftFV.proceedContinue()) return;

    // all the inputs that contain the data of
    let _pageData = _swiftStorage.proceedContinueData();

    let _data = {
      action: "proceed_continue_sy",
      data: _pageData,
      applicantId: this._applicantId,
    };

    this.runSpinner(true);

    _ajaxRequest
      .call(_data, "json", "post")
      .error((error) => {
        console.log(error);
      })
      .then((response) => {
        this.runSpinner(false);

        if (response.success) {
          this.$("#sb_ConfirmProceed").removeClass("cs_disabled");
          // this.$("#sb_PaymentOptions").removeClass('cs_disabled');

          _swiftNavigation.hide_SinglePassportNavigationOne();
          _swiftNavigation.display_SinglePassportNavigationTwo();
          _swiftNavigation.moveToProcessingPeriod();

          this.$("#sb_groupPassportInfo").addClass("hidden");
          this.$("#sb_GroupContactInformation").addClass("hidden");

          // // Navigate to Processing Period
          // _swiftNavigation.paymentOptions();
        } else {
          alert("Operation Failed");
        }
      });
  }

  handle_radioTripType(even) {
    this._PageStart.classList.add("hidden");
    this._pageOne.classList.remove("hidden");
  }

  setCitizenType() {
    var selectedValue = this.$('input[name="cs_trip_type"]:checked').val();
    if (selectedValue == "seychelles-citizen")
      _visaSwift._seychellesCitizen = true;
    else if (selectedValue == "not-seychelles-citizen")
      _visaSwift._seychellesCitizen = false;
  }

  handle_inputUploadAirlineDocs(event) {
    let selectedFile = event.target.files[0];

    if (selectedFile) {
      this.runSpinner(true);

      let _data = new FormData();
      _data.append("action", "airline_document_sy");
      _data.append("airline_booking_doc", selectedFile);
      _data.append("applicantId", this._applicantId);

      _ajaxRequest
        .imageCall(_data, "json", "post")
        .error((error) => {
          console.log(error);
        })
        .then((response) => {
          this.runSpinner(false);

          if (response.success) {
            this.display_AirlineDocument(response);

            // Get the computed style of the element
            var computedStyle = window.getComputedStyle(
              this.$(".cs-airline-confirm")[0]
            );

            // Check if the computed border property matches the expected value
            if (
              computedStyle.getPropertyValue("border") ===
              "1px solid rgb(255, 0, 0)"
            ) {
              // Remove the inline border style property from elements with class cs-accomodation-confirm
              this.$(".cs-airline-confirm").removeAttr("style");
            }
          } else {
            alert("Operation Failed");
          }
        });
    }
  }

  display_AirlineDocument(data) {
    let html = `<div class="cs-view-docs">

		<div class="w-100">
			<p class="file-name">${data.filename}</p>
		</div>

		<div data-file-url="${data.file_url}" onclick="_visaSwift.handle_popupShowFile(this)">
			<i class="fa fa-eye"></i>
		</div>

		<div>
			<i data-id="${data.attachment_id}" data-doc-name="airline"  onclick="_visaSwift.delAccDocument(this)" class="fa fa-trash"></i>
		</div>

	</div>`;

    this.$("#airlineDocs").append(html);
  }

  // handle_inputUploadAirlineDocs(event) {
  // 	console.log('handle_inputUploadAirlineDocs called');

  // 	let selectedFile = event.target.files[0];

  // 	if (selectedFile) {
  // 		this.runSpinner(true);

  // 		let _data = new FormData();
  // 		_data.append('action', 'accommodation_booking_document');
  // 		_data.append('accommodation_booking_doc', selectedFile);
  // 		_data.append('applicantId', this._applicantId);
  // 		// _data.append('documentNumber', _swiftStorage._documentNumber);

  // 		// console.log(_data);

  // 		_ajaxRequest
  // 			.imageCall(_data, 'json', 'post')
  // 			.error((error) => {
  // 				console.log(error);
  // 			})
  // 			.then((response) => {
  // 				this.runSpinner(false);

  // 				if (response.success) {
  // 					//selfie url is stored in this variable
  // 					// response.selfieUrl
  // 					// Giving the html element a Source, so we can see the pic
  // 					// this.$(this.img_SelfieResponseSrc).attr('src', response.selfieUrl);
  // 					// /**
  // 					//  * Display Selfie to the user
  // 					//  */
  // 					// this.$(this.two_SelfiePhoto).addClass('hidden');
  // 					// this.$(this.selfiePhotoResponse).removeClass('hidden');
  // 					// this.$(this.img_SelfiePhoto).attr('src', response.selfieUrl);
  // 				}
  // 			});
  // 	}
  // }

  checkApplicant() {
    if (!this._applicantId || this._applicantId == 0) {
      alert("Applicant Id is empty");
      this.alertDanger(
        "Form Incomplete",
        "Please fill the required fields before advancing"
      );
    }
  }

  handle_btnCustomsInfoContinue(event) {
    this.checkApplicant();

    if (_swiftFV.customDeclaration() == false) {
      // validation Failed
      this.alertDanger(
        "Form Incomplete",
        "Please fill the required fields before advancing"
      );
      return false;
    }

    // all the inputs that contain the data of
    let _pageData = _swiftStorage.customDeclarationData();

    let _data = {
      action: "custom_declaration_sy",
      data: _pageData,
      applicantId: this._applicantId,
    };

    // return;
    this.runSpinner(true);

    _ajaxRequest
      .call(_data, "json", "post")
      .error((error) => {
        console.log(error);
      })
      .then((response) => {
        this.runSpinner(false);

        if (response.success) {
          // this.tra

          this.$("#sb_CustomsDeclaration").removeClass("cs_disabled");
          this.$("#sb_RequiredDocuments").removeClass("cs_disabled");
          // this.$("#sb_ConfirmProceed").removeClass("cs_disabled");

          _swiftNavigation.requiredDocs();
          if (_visaSwift._seychellesCitizen)
            // if person is seychelles citizen then display him only citizenship required docs form
            _swiftUiManager.enableProofofCitizenship();
        } else {
          alert("Operation Failed");
        }
      });
  }

  handle_btnHealthInfoContinue(event) {
    if (!this._applicantId || this._applicantId == 0) {
      alert("Applicant Id is empty");
      return;
    }

    let _validStatus = _swiftFV.healthDeclaration();

    if (!_validStatus) {
      // validation Failed
      this.alertDanger("Oops!", "Please complete the mandatory fields.");
      return false;
    }

    // all the inputs that contain the data of
    let _pageData = _swiftStorage.healthDeclarationData();

    console.log(_pageData);

    let _data = {
      action: "health_declaration_sy",
      page_data: _pageData,
      applicantId: this._applicantId,
      applicationSingle: this._applicationSingle,
      documentNumber: _swiftStorage._documentNumber,
    };

    // return;
    this.runSpinner(true);

    _ajaxRequest
      .call(_data, "json", "post")
      .error((error) => {
        console.log(error);
      })
      .then((response) => {
        this.runSpinner(false);

        console.log(response);

        if (response.success) {
          // _swiftStorage.setTripInfo(response);
          //

          if (_visaSwift._applicationSingle) {
            // Only perform this action if the Passport application is single

            this.$("#sb_HealthDeclaration").removeClass("cs_disabled");
            this.$("#sb_CustomsDeclaration").removeClass("cs_disabled");

            _swiftNavigation.customDeclaration();
          } else {
            // Code Here To Display the documents dialog
            _swiftMP.handle_btnOptDocs.bind(_swiftMP);

            _swiftMP.validate();
          }
        } else {
          alert("Operation Failed");
        }
      });
  }

  _processingPlan() {
    // Get all radio buttons with the name "cs_processing_period"
    const radioButtons = document.getElementsByName("cs_processing_period");

    // Loop through radio buttons to find the selected one
    for (const radioButton of radioButtons) {
      if (radioButton.checked) {
        // Return the value of the selected radio button
        return radioButton.value;
      }
    }

    // Return null if no radio button is selected
    return null;
  }

  // handle_btnTripInfoContinue(event) {
  //   if (_visaSwift._applicationSingle) {
  //     if (!this._applicantId || this._applicantId == 0) {
  //       alert("Applicant Id is empty");
  //       return;
  //     }
  //   }

  //   if (!_swiftFV.tripInfo()) return;

  //   let _pageData = _swiftStorage.tripInfoData();

  //   let _data = {
  //     action: "trip_info_sy",
  //     page_data: _pageData,
  //     applicantId: this._applicantId,
  //     applicationSingle: this._applicationSingle,
  //     selectedCountry: this._selectedCountry,
  //   };

  //   this.runSpinner(true);

  //   _ajaxRequest
  //     .call(_data, "json", "post")
  //     .error((error) => {
  //       console.log(error);
  //     })
  //     .then((response) => {
  //       this.runSpinner(false);

  //       if (response.success) {
  //         _swiftUiManager.ShowSummaryData();

  //         if (this._applicationSingle) {
  //           this.$("#sb_HealthDeclaration").removeClass("cs_disabled");
  //           // _swiftNavigation.healthDeclaration();

  //           // Write the quotation
  //           this.$("#sb_ConfirmProceed").removeClass("cs_disabled");
  //           // this.$("#sb_PaymentOptions").removeClass('cs_disabled');

  //           _swiftNavigation.hide_SinglePassportNavigationOne();
  //           _swiftNavigation.display_SinglePassportNavigationTwo();
  //           // _swiftNavigation.moveToProcessingPeriod();

  //           this.$("#sb_groupPassportInfo").addClass("hidden");
  //           this.$("#sb_GroupContactInformation").addClass("hidden");

  //           _swiftNavigation.handle_btnProcessingPeriodContinue();
  //           this.$("#sb_ProcessingPeriod").addClass("hidden");
  //         } else {
  //           this._applicantId = response.applicantId;
  //           _swiftNavigation.groupPassport();

  //           this.$("#sb_TripInformation").addClass("cs-checked");
  //           this.$("#sb_groupPassportInfo").removeClass("cs_disabled");
  //           this.$("#sb_groupPassportInfo").addClass("cs-arrow");
  //         }
  //       } else {
  //         alert("Operation Failed");
  //       }
  //     });
  // }

  handle_btnContactInfoContinue(event) {
    if (!_swiftFV.contactInfo()) return;

    let _pageData = _swiftStorage.contactInfoData();

    let _data = {
      action: "contact_info_sy",
      page_data: _pageData,
      applicantId: this._applicantId,
    };

    this.runSpinner(true);
    _ajaxRequest
      .call(_data, "json", "post")
      .error((error) => {
        console.log(error);
      })
      .then((response) => {
        this.runSpinner(false);

        if (response.success) {
          // _swiftStorage.illegalPages = _swiftStorage.illegalPages.filter(page => page !== 'sb_ContactInformation');

          if (_visaSwift._applicationSingle) {
            this.$("#sb_TripInformation").removeClass("cs_disabled");
            this.$("#sb_ContactInformation").removeClass("cs_disabled");
            _swiftNavigation.tripInfo();
          } else {
            // _swiftNavigation.customDeclaration();
            this.$("#sb_GroupContactInformation").removeClass("cs-arrow");
            this.$("#sb_GroupContactInformation").addClass("cs-checked");
            this.$("#sb_GroupContactInformation").removeClass("cs_disabled");

            _swiftNavigation.hide_SinglePassportNavigationOne();
            _swiftNavigation.display_SinglePassportNavigationTwo();
            // _swiftNavigation.moveToProcessingPeriod();

            this.$("#sb_groupPassportInfo").addClass("hidden");
            this.$("#sb_GroupContactInformation").addClass("hidden");

            _swiftNavigation.handle_btnProcessingPeriodContinue();
            this.$("#sb_ProcessingPeriod").addClass("hidden");
          }
        } else {
          alert("Operation Failed");
        }
      });
  }

  handle_btnSelfieResponseContinue(event) {
    this.$(this.selfiePhotoResponse).addClass("hidden");
    this.$(this.three_ContactInfo).removeClass("hidden");

    this.showTitle(
      "Contact Information",
      "We require this information to process your application and get in contact with you if we have any question or need more information."
    );

    this.sb_SelfiePhoto.classList.remove("cs-arrow");
    this.sb_SelfiePhoto.classList.add("cs-checked");
    this.sb_ContactInformation.classList.add("cs-arrow");
  }

  showTitle(title, subTitle) {
    this.$(this._bsTitle).text(title);
    this.$(this._bsSubTitle).text(subTitle);
  }

  handle_inputSelfiePhoto(event) {
    let selectedFile = event.target.files[0];

    if (selectedFile) {
      var fileImage = new FormData();
      fileImage.append("selfie_img", selectedFile);

      // Start the runSpinner here
      _visaSwift.runSpinner(true);

      let _data = new FormData();

      _data.append("action", "selfie_upload_sy");
      _data.append("selfieImg", selectedFile);
      _data.append("applicationSingle", _visaSwift._applicationSingle);
      _data.append("applicantId", _visaSwift._applicantId);
      _data.append("documentNumber", _swiftStorage._documentNumber);

      _ajaxRequest
        .imageCall(_data, "json", "post")
        .error((error) => {
          console.log(error);
        })
        .then((response) => {
          _visaSwift.runSpinner(false);

          // console.log(response);

          if (!response.face_compare) {
            console.log("this if executed");
            _visaSwift.alertDanger(
              "Invalid Selfie",
              "Please Upload right selfie that match to your passport"
            );
            return;
          }

          if (response.success) {
            //selfie url is stored in this variable
            let selfieUrl = response.selfieUrl;

            _swiftStorage.setSelfieUrl(
              _swiftStorage._documentNumber,
              selfieUrl
            );

            // Giving the html element a Source, so we can see the pic
            if (_visaSwift._applicationSingle) {
              this.$(_visaSwift.img_SelfieResponseSrc).attr("src", selfieUrl);

              /**
               * Display Selfie to the user
               */

              this.$("#sb_PassportInformation").removeClass("cs_disabled");
              this.$("#sb_SelfiePhoto").removeClass("cs_disabled");
              this.$("#sb_ContactInformation").removeClass("cs_disabled");
              this.$(_visaSwift.two_SelfiePhoto).addClass("hidden");
              this.$(_visaSwift.selfiePhotoResponse).removeClass("hidden");
              this.$(_visaSwift.img_SelfiePhoto).attr("src", selfieUrl);
            } else {
              /**
               * Multi Passport is Active
               */
              _swiftUiManager.displayGroupSelfie(_swiftStorage._documentNumber);
            }
          }
        });
    }
  }

  handle_btnPageFiveContinue(event) {
    this.$(this._pageFive).addClass("hidden");
    this.$(this._pageFour).removeClass("hidden");
  }

  handle_btnPageFivePrev(event) {
    this.$(this._pageFive).addClass("hidden");
    this.$(this._pageThree).removeClass("hidden");
  }

  // Class Functions Starts

  // handle_btnTripInfoPrev(e) {
  // 	this.$(this._pageFour).removeClass('hidden');
  // 	this.$(this.sec_TripInfo).addClass('hidden');
  // 	// hide the main container _bsContainer
  // 	this.$(this._bsContainer).removeClass('d-flex');
  // 	this.$(this._bsContainer).addClass('hidden');
  // }

  handle_btnPassportInfoPrev(e) {
    this.$("#page_four").removeClass("hidden");
    this.$(this._containerUploadPassport).addClass("hidden");
    this.$(this._bsContainer).removeClass("d-flex");
    this.$(this._bsContainer).addClass("hidden");
  }

  handle_PageFourPrev(e) {
    this.$("#page_four").addClass("hidden");
    if (this._applicationSingle)
      this.$("#container_PageThree").removeClass("hidden");
    else this.$("#container_PageFive").removeClass("hidden");
  }

  // Class function Starts
  // handle_SingleOrGroupApplication(selectedValue) {
  //     // Perform your logic based on the selected radio button's value
  //     console.log("Selected option: " + selectedValue);
  // }
  // function ends

  handle_PageThreePrev(e) {
    this._btnPageTwoContinue.disabled = true;
    this._readAndAgreedcheckbox.checked = false;

    this.$("#container_PageTwo").removeClass("hidden");
    this.$("#container_PageThree").addClass("hidden");
  }

  handle_btnReadAndAgreed(e) {
    if (e.target.checked) {
      // Checkbox is checked, enable the button
      this._btnPageTwoContinue.disabled = false;
    } else {
      // Checkbox is unchecked, disable the button
      this._btnPageTwoContinue.disabled = true;
    }
  }

  handle_passportUpload(event) {
    // check the if data exists
    if (_visaSwift._selectedCountry == null) {
      alert("Please select your country first");
      return;
    }

    let selectedFile = event.target.files[0];
    if (selectedFile) {
      var fileImage = new FormData();
      fileImage.append("passport_img", selectedFile);

      // Start the runSpinner here
      _visaSwift.runSpinner(true);
      let _data = new FormData();
      _data.append("action", "validate_passport_sy");
      _data.append("passportImg", selectedFile);
      _data.append("applicationSingle", _visaSwift._applicationSingle);
      _data.append("postId", _visaSwift._applicantId);
      _data.append("country", _visaSwift._selectedCountry);

      _ajaxRequest
        .imageCall(_data, "json", "post")
        .error((error) => {
          console.log(error);
        })
        .then((response) => {
          _visaSwift.runSpinner(false);

          if (response.success) {
            if (!_visaSwift._applicationSingle) {
              // Group Passport

              if (response.record_exists == true) {
                _visaSwift.alertDanger(
                  "Passport Already Exists!",
                  "Please Upload each applicant passport only once. Thanks for understanding"
                );

                return;
              } else {
                _swiftUiManager.removePassUpload();
                _swiftUiManager.addGroupPassportResponseSection(response);
                _swiftUiManager.showGroupPassportInfo(response);

                // create Multi Country First Time Only
                if (Object.keys(_swiftStorage.passports).length === 0)
                  _swiftMP.activeGroupCountry();
              }
            } else {
              /**
               * Single Passport Uploading
               */

              // The Response is true
              let user_id = response.user_id;

              _visaSwift._applicantId = user_id;

              _visaSwift
                .$(_visaSwift.btn_PassportInfoContinue)
                .removeAttr("disabled");
              // Displaying the DATA of the PASSPORT Not Checked

              const res_PImg = document.getElementById("res_PImg");
              const res_FullName = document.getElementById("res_FullName");
              const res_DocNo = document.getElementById("res_DocNo");
              const res_DoB = document.getElementById("res_DoB");
              const res_Valid = document.getElementById("res_Valid");

              res_PImg.src = response.passportUrl;
              res_FullName.innerText = response.data.fields.fullName;
              res_DocNo.innerText = response.data.fields.documentNumber;
              res_DoB.innerText = response.data.fields.dateOfBirth;
              res_Valid.innerText = response.data.fields.dateOfExpiry;
              _visaSwift.$("#btn_PassportInfoContinue").removeAttr("disabled");
              this.$("#sb_SelfiePhoto").removeClass("cs_disabled");
            }

            // localStorage.setItem('bs_UserId', response.user_id);
            // Save Data in Storage Class
            _swiftStorage.savePassportData(response);
            _swiftNavigation.move_NextFromPassportPage();

            /**
             * Checking if the user Checked the Review Option or not
             */
          } else {
            // if response is not successful

            if (!response.passport_status) {
              _visaSwift.alertDanger("Passport is Invalid", response.message);

              return;
            }

            _visaSwift.alertDanger("Passport is Invalid", response.message);
          }
        });
    }
  } // main passport upload function ends

  handle_createCustomPostType(e) {
    /**
     * Create a new Custom Post Type via AJAX
     */
    let emailValue = document.getElementById("input_ContactYourEmail").value;
    let customPostData = {
      post_title: `${emailValue} has made a booking`,
      post_content: "",
      post_type: "protection",
      post_status: "private",
    };

    let _data = {
      action: "create_custom_post_sy", // This will match the PHP handler (add_action in WP)
      data: customPostData,
      applicantId: this._applicantId || null, // Optional extra data
      country: this._selectedCountry || null, // Optional extra data
    };

    this.runSpinner(true);

    _ajaxRequest
      .call(_data, "json", "post")
      .error((error) => {
        console.log(error);
      })
      .then((response) => {
        _visaSwift.runSpinner(false);

        if (response.success && response.user_id) {
          console.log("Created Post ID:", response.user_id);
          _visaSwift._applicantId = response.user_id;
        } else {
          _visaSwift.alertDanger(
            "Post Creation Failed",
            "User ID not found. Custom post was not created."
          );
        }
      });
  }

  handle_btnPageFourContinue(event) {
    // // Prepare UI for Seychlles citizen
    _swiftUiManager.handle_contentForCitizen();
    this.$(this._pageFour).addClass("hidden");
    this.$(this._bsContainer).removeClass("hidden");
    this.$(this._bsContainer).addClass("d-flex");
    _swiftNavigation.prepareSidebar();

    if (this._applicationSingle) {
      _swiftNavigation.handle_sbTripInformation();
      _swiftNavigation.contactInfo();

      _visaSwift.sb_ContactInformation.classList.remove("cs_disabled");

      _visaSwift.handle_createCustomPostType();

      _visaSwift.showTitle(
        "Passport Information",
        "Please provide a photo or scan of the biographic data page of your passport. This is the page featuring your photo, name, etc."
      );

      // Single Passport Application
      // this.sb_PassportInformation.classList.add('cs-arrow');

      // this.$(this._containerUploadPassport).removeClass('hidden');

      // this.$("#sb_PassportInformation").removeClass('cs_disabled');

      this.$("#sb_GroupContactInformation").addClass("hidden");

      if (_visaSwift._seychellesCitizen)
        this.$("#sb_OptionalDocuments").addClass("hidden");
    } else {
      // Group Application Selection
      // this.sb_PassportInformation.classList.add("cs-arrow");
      this.$(this.sec_TripInfo).removeClass("hidden");
      this.$("#sb_TripInformation").removeClass("cs_disabled");
      this.$("#sb_TripInformation").addClass("cs-arrow");

      this.$("#sb_groupPassportInfo").removeClass("hidden");
      // this.$("#sb_PassportInformation").addClass("hidden");

      // Hide the contact information
      this.$("#sb_ContactInformation").addClass("hidden");
      this.$("#sb_GroupContactInformation").removeClass("hidden");

      // Show Title
      _visaSwift.showTitle(
        "Trip Information",
        "Provide details about your trip"
      );
    }
  }

  handle_btnPageThreeContinue(event) {
    // if (_swiftFV.pageThree()) {

    /**
     * If user chooses application for a group, we have to display the different page
     */

    _swiftNavigation.prepareSidebar();

    if (this._applicationSingle) {
      this.$(this._pageThree).addClass("hidden");
      this.$(this._pageFour).removeClass("hidden");
    } else {
      // single application false means a user wants to register multiple users

      this.$(this._pageThree).addClass("hidden");
      this.$(this._pageFive).removeClass("hidden");
    }

    // }
  }

  handle_btnPageTwoContinue(event) {
    const checkbox = document.getElementById("checkbox_PageTwoAgreed");

    if (!checkbox.checked) {
      alert("Please accept the agreement first to move forward");
      return;
    }

    this.$(this._pageTwo).addClass("hidden");
    this.$(this._pageThree).removeClass("hidden");
  }

  handlePageTwoPrev(event) {
    this.$(this._pageOne).removeClass("hidden");
    this.$("#container_PageTwo").addClass("hidden");
  }

  handle_btnViewSummary(event) {
    this.$(this._bgSummary).removeClass("d-none");
  }

  handle_closeSummaryTotal(event) {
    this.$(this._bgSummary).addClass("d-none");
  }

  /**
   * This is the function for form CONTINUE
   */

  // handle_btnSelfiePhotoPrev(event) {
  // 	this.$('#introStepTwoContainer').addClass('hidden');
  // 	this.$('#one_PassportResponse').removeClass('hidden');

  // 	// Side Bar
  // 	this.sb_SelfiePhoto.classList.remove('cs-arrow');
  // 	this.sb_PassportInformation.classList.remove('cs-checked');
  // 	this.sb_PassportInformation.classList.add('cs-arrow');
  // }

  /**
   * This is the function for form CONTINUE
   */

  handle_btnPassportInfoContinue(event) {
    this.$(this._containerUploadPassport).addClass("hidden");
    this.$("#one_PassportResponse").removeClass("hidden");

    if (!this._applicationSingle)
      this.$("#btn_PResAddPassport").removeClass("hidden");
    else this.$("#btn_PResAddPassport").addClass("hidden");
  }

  handle_btnPassportResponseContinue(event) {
    /**
     * Code that was edited by me before but i am reverting it
     * because we want to upload selfie as well
     */
    // this.$('#one_PassportResponse').addClass('hidden');
    // this.sb_PassportInformation.classList.remove('cs-arrow');
    // this.sb_PassportInformation.classList.add('cs-checked');
    // this.$("#sb_ContactInformation").removeClass("cs_disabled");
    // this.handle_btnSelfieResponseContinue();

    /**
     * Resited code from visa-swift
     */

    this.$("#one_PassportResponse").addClass("hidden");
    this.$("#two_SelfiePhoto").removeClass("hidden");

    // Side Bar
    this.sb_PassportInformation.classList.remove("cs-arrow");
    this.sb_PassportInformation.classList.add("cs-checked");
    this.sb_SelfiePhoto.classList.add("cs-arrow");
  }

  /** --------------------> Later
     handle_btnSelfiePhotoContinue(event) {
     this.$(this.btn_SelfiePhotoContinue).addClass('hidden');
     this.$('#introStepTwoContainer').removeClass('hidden');
     }
     */

  /**
   * Function to handle
   */

  // meh

  /*
        this._groupResSelfie

        this._groupUploadSelfie
        this._groupHealthDeclaration
        this._groupOptDocs
    */

  handle_btnGroupTakeSelfie(event) {
    if (!_swiftStorage.selfieExists()) {
      this._groupUploadSelfie.classList.remove("hidden");
      this.$("#group_UseThisSelfie").addClass("hidden");

      // set default selfie icon
      this.$("#img_GroupSelfie").attr("src", _swiftStorage._selfieIcon);
    } else {
      // selfie exists already
      this.$(this._groupResSelfie).removeClass("hidden");
      this.$(_swiftUiManager._groupFRetryUploadSelfie).removeClass("hidden");

      // hide the selfie upload part
      this._groupUploadSelfie.classList.add("hidden");
      this.$("#group_UseThisSelfie").removeClass("hidden");
    }

    this._groupResSelfie.classList.remove("hidden");

    this._groupHealthDeclaration.classList.add("hidden");
    this._groupOptDocs.classList.add("hidden");

    // Pop Up
    if (this._viewWidth < 768) {
      this._PopUp.classList.add("slide-top");
      this._PopUp.classList.remove("slide-bottom");
    } else {
      this._PopUp.style.display = "block";
    }
  }

  handle_btnGroupHealthDeclaration(event) {
    this._groupResSelfie.classList.remove("hidden");
    this._groupHealthDeclaration.classList.remove("hidden");
    this._groupUploadSelfie.classList.add("hidden");
    this._groupOptDocs.classList.add("hidden");

    // Pop Up
    if (this._viewWidth < 768) {
      this._PopUp.classList.add("slide-top");
      this._PopUp.classList.remove("slide-bottom");
    } else {
      this._PopUp.style.display = "block";
    }
  }

  handle_btnGroupOptDocs(event) {
    this._groupResSelfie.classList.remove("hidden");
    this._groupOptDocs.classList.remove("hidden");
    this._groupUploadSelfie.classList.add("hidden");
    this._groupHealthDeclaration.classList.add("hidden");

    // Pop Up
    if (this._viewWidth < 768) {
      this._PopUp.classList.add("slide-top");
      this._PopUp.classList.remove("slide-bottom");
    } else {
      this._PopUp.style.display = "block";
    }
  }

  handle_closePopup(event) {
    if (this._viewWidth < 768) {
      this._PopUp.classList.add("slide-bottom");
      this._PopUp.classList.remove("slide-top");
    } else {
      this._PopUp.style.display = "none";
    }
    // validate multipassport
    _swiftMP.validate();
  }

  // runSpinner function
  runSpinner(runSpinner) {
    const paymentForm = document.getElementById("payment-form");
    const spinnerWrapper = document.getElementById("spinner-wrapper");
    const parentForm = document.getElementById("cs_ParentForm");

    if (runSpinner == true) {
      paymentForm.classList.add("payment-form");
      spinnerWrapper.classList.add("spinner-wrapper");
      parentForm.classList.add("cs_ParentForm");
    } else {
      paymentForm.classList.remove("payment-form");
      spinnerWrapper.classList.remove("spinner-wrapper");
      parentForm.classList.remove("cs_ParentForm");
    }
  } // This function need only one (param) if its true Spinner runs

  handle_btnPageOneContinue(event) {
    this._btnPageTwoContinue.disabled = true;
    this._readAndAgreedcheckbox.checked = false;

    this.$(this._pageOne).addClass("hidden");
    this.$("#container_PageTwo").removeClass("hidden");
  }

  handle_btn_GoBackHome() {
    console.log("Hello World");

    this.page_ThanYou.classList.add("hidden");
    this._bsContainer.classList.remove("d-flex");
    this._bsContainer.classList.add("hidden");

    this._PageStart.classList.remove("hidden");
  }

  // hideAlertDanger(){

  // }

  ajax() {
    // send demo ajax Request
    let _data = {
      action: "get_demo_sy",
      name: "demo-name",
    };
    _ajaxRequest
      .get(_data, "json", "get")
      .error((error) => {
        console.log(error);
      })
      .then((response) => {
        console.log(response.success);
      });
  }

  /**
   *
   * This is the code creating the alert-box with PARAM's
   *
   * @param {*} heading
   * @param {*} text
   * @param {*} insert
   */
  alertDanger(heading, text) {
    let html = `
            
                <section class="alert_ValidPassport" id="alert_ValidPassport">
        <div class="cs-container">
            <div class="cs-alert-danger">

                <div class="icon-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 57 57" preserveAspectRatio="xMidYMid meet" focusable="false">
                        <g id="Error" transform="translate(-167 -573)">
                            <g id="Ellipse_107" data-name="Ellipse 107" transform="translate(167 573)" fill="#cb002c" stroke="#fff" stroke-width="2">
                                <circle cx="28.5" cy="28.5" r="28.5" stroke="none"></circle>
                                <circle cx="28.5" cy="28.5" r="27.5" fill="none"></circle>
                            </g>
                            <g id="Group_11147" data-name="Group 11147" transform="translate(173.466 675.788)">
                                <path id="Path_1906" data-name="Path 1906" d="M34.132-67.181,23.43-85.72a2.193,2.193,0,0,0-1.9-1.1,2.193,2.193,0,0,0-1.9,1.1L8.851-67.048a2.192,2.192,0,0,0,0,2.192,2.193,2.193,0,0,0,1.9,1.1H32.318a2.191,2.191,0,0,0,2.192-2.192,2.19,2.19,0,0,0-.378-1.229Zm-12.6-13.187a1.224,1.224,0,0,1,1.224,1.224l-.313,7.306a.908.908,0,0,1-.911.911.865.865,0,0,1-.911-.911l-.313-7.306A1.224,1.224,0,0,1,21.534-80.368ZM22.64-67.221a1.566,1.566,0,0,1-1.106.457,1.577,1.577,0,0,1-1.108-.457,1.582,1.582,0,0,1-.457-1.109,1.571,1.571,0,0,1,.457-1.106,1.579,1.579,0,0,1,1.108-.46,1.569,1.569,0,0,1,1.106.46,1.571,1.571,0,0,1,.46,1.106A1.573,1.573,0,0,1,22.64-67.221Z" transform="translate(0 0)" fill="#fff"></path>
                            </g>
                        </g>
                    </svg>
                </div>

                <div class="content-wrapper">
                    <h4>${heading}</h4>
                    <p>${text}</p>
                </div>

                <hr>

                <div class="cs-button-wrapper float-end">
                <span class="btn btn-info"  onclick="_visaSwift.hideAlertDanger(this)">Close</span>
                </div>

            </div>
        </div>
    </section>                

            `;

    this.$(this._bsContainer).append(html);
  }

  /**
   * This is the function for hiding the Alert Box on button click
   */
  hideAlertDanger(e) {
    // const btn_Retry = e.parentElement.parentElement.parentElement.parentElement;

    // btn_Retry.style.display = 'none';

    // console.log("hideAlertDanger called");

    // console.log(this);
    this.$(".alert_ValidPassport").remove();

    // this.$("#alert_ValidPassport").hide();
    // console.log(this.$('#alert_ValidPassport'));
  }

  // Class methods go here
}

jQuery(document).ready(() => {
  window._visaSwift = new VisaSwift(jQuery);
});
