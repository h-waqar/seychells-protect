class SwiftUiManager {
  $ = null;
  img_GroupSelfie = null;
  res_PImg = null;
  _btnGroupUseThisPic = null;
  _groupUseThisSelfie = null;
  summaryTotal = null;
  monetaryInstrument = null;
  btn_AddAnotherMonetary = null;
  viewSummaryTotal = null;
  timeout = null;
  targetAddressInput = null;

  constructor($) {
    // Constructor code here
    this.$ = $;
    this.init();

    this.summaryTotal = this.$("#summaryTotal").get(0);
    this.monetaryInstrument = this.$("#monetaryInstrument").get(0);
    this.btn_AddAnotherMonetary = this.$("#btn_AddAnotherMonetary").get(0);
    this.viewSummaryTotal = this.$("#viewSummaryTotal").get(0);

    if (this.btn_AddAnotherMonetary) {
      this.btn_AddAnotherMonetary.addEventListener(
        "click",
        this.handle_btnAddAnotherMonetary.bind(this)
      );
    }

    // Attach a change event handler to the radio buttons
    this.$('input[name="cs_customs_transporting_currency"]').on(
      "change",
      this.handle_CustomsTransportingCurrency.bind(this)
    );

    this.$("#tripInfoWrap").on(
      "input",
      ".trip_address",
      this.handle_getEstablishment.bind(this)
    );

    this.$("#tripInfoWrap").on(
      "click",
      ".cs-suggested-hotel",
      this.handle_hotelClick.bind(this)
    );

    this.addListnerDragAndDrop();
  }

  handle_hotelClick(e) {
    this.$(this.targetAddressInput).val(e.target.innerHTML);
    _swiftUiManager
      .$(_swiftUiManager.targetAddressInput)
      .closest(".address-in-seychelles")
      .find(".cs-hotel-autocomplete")
      .remove();
  }

  handle_getEstablishment(e) {
    this.targetAddressInput = e.target;

    this.est_debounce(e.target.value, 250);
  }

  est_debounce(query, delay) {
    clearTimeout(_swiftUiManager.timeout);

    _swiftUiManager.timeout = setTimeout(() => {
      // debounce ajax start

      let _data = {
        action: "get_establishment",
        query: query,
      };

      _ajaxRequest
        .call(_data, "json", "post")
        .error((error) => {
          console.log(error);
        })
        .then((response) => {
          // console.log(response);
          _swiftUiManager.$("#tripInfoWrap .cs-hotel-autocomplete").remove();
          if (response.success)
            _swiftUiManager.generateSuggestionsHTML(response.suggestions);
        });

      // debounce ends
    }, delay);
  }

  generateSuggestionsHTML(suggestions) {
    var html = '<div class="cs-hotel-autocomplete">';
    // var html = '';

    if (suggestions.length > 0) {
      html +=
        '<p class="cs-suggested-hotel">' +
        _swiftUiManager.formatHotelInfo(suggestions[0]) +
        "</p>";

      for (var i = 1; i < suggestions.length; i++) {
        html +=
          '<p class="cs-suggested-hotel">' +
          _swiftUiManager.formatHotelInfo(suggestions[i]) +
          "</p>";
      }
    } else {
      // Handle case when there are no suggestions
      html += '<p class="cs-suggested-hotel">No suggestions found</p>';
    }

    html += "</div>";

    _swiftUiManager
      .$(_swiftUiManager.targetAddressInput)
      .closest(".address-in-seychelles")
      .find(".cs-hotel-autocomplete")
      .remove();

    _swiftUiManager
      .$(_swiftUiManager.targetAddressInput)
      .closest(".address-in-seychelles")
      .append(html);
  }

  formatHotelInfo(hotel) {
    return (
      hotel.Establishment +
      ", " +
      hotel.Address +
      ", " +
      hotel.Island +
      ", Seychelles"
    );
  }

  handle_btnAddAnotherMonetary(e) {
    var sectionToMove = this.$("#content_MonetaryInstrument").get(0);
    var targetDiv = this.$("#wrapMonetary");
    targetDiv.append(sectionToMove.innerHTML);
  }

  enableProofofCitizenship() {
    this.$("#container_AirlineDocs").addClass("hidden");
    this.$("#title_ProofOfCitezenShip").text("Proof of Citizenship");
    this.$("#para_ProofOfCitezenShip").text(
      "Upload proof of your Seychelles citizenship. This can be in the form of a Seychelles passport (expired passports are acceptable), National Identity card, letter confirming citizenship, your birth certificate or of your parents indicating citizenship of Seychelles. Copies of GOPs, residency or any other permits are NOT considered as valid proof of citizenship. Failure to submit one of the acceptable forms of proof of citizenship can lead to your application being denied. You will be required to submit a new application, subject to a higher application fee."
    );
  }

  handle_CustomsTransportingCurrency(e) {
    // Check the value of the selected radio button
    var selectedValue = this.$(
      'input[name="cs_customs_transporting_currency"]:checked'
    ).val();

    // Display a message based on the selected value
    if (selectedValue === "yes") {
      this.$(this.monetaryInstrument).removeClass("hidden");
    } else if (selectedValue === "No") {
      this.$(this.monetaryInstrument).addClass("hidden");
    }
  }

  processingFee() {
    let total = 0;
    var processing = this.$('input[name="cs_processing_period"]:checked').val();

    // Display a message based on the selected value
    if (processing === "standard") {
      total += _swiftStorage.standardProcessingFee;
      _swiftStorage._processingFeeToBeCharged =
        _swiftStorage.standardProcessingFee;
    } else if (processing === "premium") {
      total += _swiftStorage.premiumProcessingFee;
      _swiftStorage._processingFeeToBeCharged =
        _swiftStorage.premiumProcessingFee;
    } else if (processing === "urgent") {
      total += _swiftStorage.urgentProcessingFee;
      _swiftStorage._processingFeeToBeCharged =
        _swiftStorage.urgentProcessingFee;
    }

    return total * Object.keys(_swiftStorage.passports).length;
  }

  displayPassportsSummary() {
    this.$("#csSummaryPersons").empty();

    // Loop through document numbers
    for (var documentNumber in _swiftStorage.passports) {
      // Access the full name for each passport
      var fullName = _swiftStorage.passports[documentNumber].fullName;

      var html = `
                <p>${fullName}
                    <span>
                         ${
                           _swiftStorage.currency +
                           "" +
                           _swiftStorage._processingFeeToBeCharged
                         }
                    </span>
                </p>`;
      this.$("#csSummaryPersons").append(html);
    }
  }

  calculateMedicalProtection() {
    // let totalPassports = Object.keys(_swiftStorage.passports).length;
    // let totalPassports = Object.keys(_swiftStorage.passports).length;
    let totalPassports =
      parseInt(document.getElementById("input_NumberOfPersons").value) || 0;
    document.getElementById("totalNumberOfPersons").textContent =
      totalPassports;

    if (_visaSwift._applicationSingle == false) {
      // Group passport is active
      _visaSwift.$("#divTotalPassports").removeClass("hidden");
      _visaSwift.$("#summaryTotalPassports").text(totalPassports); // This will set the text inside the span to "5"
    }

    var arrivalDateStr = this.$("#input_TripArrivalDate").val();
    var returnDateStr = this.$("#date_TripReturn").val();
    var protectionType = this.$(
      "input[name='radio_medical_protection']:checked"
    ).val();
    var protectionCost = 0;

    if (arrivalDateStr && returnDateStr && protectionType) {
      var arrivalDate = new Date(arrivalDateStr);
      var returnDate = new Date(returnDateStr);

      var daysDifference = Math.ceil(
        (returnDate - arrivalDate) / (1000 * 60 * 60 * 24)
      );

      if (protectionType === "basic_protection") {
        protectionCost =
          daysDifference * _swiftStorage._basicProtectionPerDayPrice;

        this.$("#protectionPerDayPrice").text(
          _swiftStorage.currency +
            "" +
            _swiftStorage._basicProtectionPerDayPrice
        );
        document.getElementById("smp_protection").innerText =
          "Basic Protection";
      } else if (protectionType === "total_protection") {
        document.getElementById("smp_protection").innerText =
          "Total Protection";

        protectionCost =
          daysDifference * _swiftStorage._totalProtectionPerDayPrice;

        this.$("#protectionPerDayPrice").text(
          _swiftStorage.currency +
            "" +
            _swiftStorage._totalProtectionPerDayPrice
        );
      }
    }

    let tc = protectionCost * totalPassports;

    this.$("#MedicalProtectionFee").text(
      _swiftStorage.currency + "" + tc.toFixed(2)
    );

    return tc;
  }

  setBankFee() {
    // Calculate the total amount with a 4% bank fee
    _swiftStorage._swiftBankFee =
      (_swiftStorage._bankFeeInPercentage / 100) *
      _swiftStorage._swiftGrandTotal;
  }

  prepareSummary() {
    let total = 0;

    // total = this.processingFee();
    // this.displayPassportsSummary();

    let protectionCost = 0;

    protectionCost = this.calculateMedicalProtection();
    // Object.keys(_swiftStorage.passports).length
    _swiftStorage._swiftGrandTotal = protectionCost;
    total += protectionCost;
    // Add bank fee in total

    // calculate bank fee
    this.setBankFee();

    total += _swiftStorage._swiftBankFee;

    this.$("#bankFee").text(
      _swiftStorage.currency + "" + _swiftStorage._swiftBankFee.toFixed(2)
    );

    // _swiftGrandTotal Variable will be used by payment Gateway
    _swiftStorage._swiftGrandTotal = total;

    this.$(this.summaryTotal).text(
      _swiftStorage.currency + "" + _swiftStorage._swiftGrandTotal.toFixed(2)
    );
    this.$(this.viewSummaryTotal).text(
      _swiftStorage.currency + "" + _swiftStorage._swiftGrandTotal.toFixed(2)
    );
  }

  handle_dragover(e) {
    e.preventDefault();
    e.stopPropagation(); // Ens

    e.target.classList.add("cs-dragover"); // Add a visual indicator when dragging over the area
  }

  handle_dragleave(e) {
    e.preventDefault();
    e.stopPropagation(); // Ens

    e.target.classList.remove("cs-dragover");
  }

  handle_selfieDrop(e) {
    e.preventDefault();
    e.stopPropagation(); // Ens
    e.target.classList.remove("cs-dragover"); // Remove the visual indicator when dropping

    // Update the corresponding input field with the dropped file
    var inputSelfieInfo = this.$(e.target).find(".input_selfie_photo");

    inputSelfieInfo.files = e.dataTransfer.files;

    var customEvent = {};
    customEvent.target = inputSelfieInfo;

    _visaSwift.handle_inputSelfiePhoto(customEvent);
  }

  handle_drop(e) {
    e.preventDefault();
    e.stopPropagation(); // Ens
    e.target.classList.remove("cs-dragover"); // Remove the visual indicator when dropping

    console.log(e);
    // Get the dropped file
    var file = e.dataTransfer.files[0];

    // Update the corresponding input field with the dropped file
    var inputPassportInfo = this.$(e.target).find(".input-passport-info");
    console.log(inputPassportInfo);
    inputPassportInfo.files = e.dataTransfer.files;

    var customEvent = {};
    customEvent.target = inputPassportInfo;

    _visaSwift.handle_passportUpload(customEvent);
  }

  deleteDocumentWithId(documentId, docName) {
    var elementToDelete = null;

    // Find the element with the specified data-id

    if (docName == "accomodation" || docName == "airline") {
      elementToDelete = this.$(`.cs_docs [data-id="${documentId}"]`);
    } else {
      if (_visaSwift._applicationSingle)
        elementToDelete = this.$(`.cs_docs [data-id="${documentId}"]`);
      else elementToDelete = this.$(`.cs_group_docs [data-id="${documentId}"]`);
    }

    // Find the nearest ancestor with class cs-view-docs and remove it
    const nearestCsViewDocs = elementToDelete.closest(".cs-view-docs");

    if (nearestCsViewDocs.length > 0) {
      nearestCsViewDocs.remove();
    } else {
      console.log('No parent with class "cs-view-docs" found.');
    }
  }

  addListnerDragAndDrop() {
    /**
     * Drag over and leave
     */
    // this.$("#wrap_MultiplPassports").on("dragover", ".cs-dotted-container", this.handle_dragover.bind(this));
    // this.$("#wrap_MultiplPassports").on("dragleave", ".cs-dotted-container", this.handle_dragleave.bind(this));
    // this.$("#wrap_MultiplPassports").on("drop", ".cs-dotted-container", _swiftUiManager.handle_drop(e));
    //  Drag Leave Listner
    // // Get references to the drop area and the file input
    // var dropArea = document.getElementById("dropArea");
    // var inputPassportInfo = document.getElementById("input_PassportInfo");
    // // Add event listeners to handle drag and drop functionality
    // dropArea.addEventListener("dragover", );
    // dropArea.addEventListener("dragleave", function () {
    //     dropArea.classList.remove("cs-dragover"); // Remove the visual indicator when leaving the area
    // });
    // dropArea.addEventListener("drop", function (e) {
    //
    // });
  }

  // Class methods go here
  init() {
    this.img_GroupSelfie = this.$("#img_GroupSelfie").get(0);
    this.res_PImg = this.$("#res_PImg").get(0);
    this._groupUseThisSelfie = this.$("#group_UseThisSelfie").get(0);

    // 1
    this._btnGroupUseThisPic = this.$("#btn_GroupUseThisPhoto").get(0);

    // 2
    this._btnGroupRetryPhoto = this.$("#btn_GroupRetryPhoto").get(0);
    this._btnGroupUseThisPicConfirm = this.$(
      "#btn_GroupUseThisPhotoConfirm"
    ).get(0);

    // 3
    this._btnGroupHealthSaveExit = this.$("#btn_GroupHealthSaveExit").get(0);
    this._btnGroupHealthContinue = this.$("#btn_GroupHealthContinue").get(0);

    // 4
    this._btnGroupDocsSaveExit = this.$("#btn_GroupDocsSaveExit").get(0);
    this._btnGroupDocsContinue = this.$("#btn_GroupDocsContinue").get(0);

    // Btn wrapper <-_->
    this._groupFUploadSelfie = this.$("#groupF_UploadSelfie").get(0);
    this._groupFRetryUploadSelfie = this.$("#groupF_RetryUploadSelfie").get(0);
    this._groupFHealthDeclaration = this.$("#groupF_HealthDeclaration").get(0);
    this._groupFDocument = this.$("#groupF_Document").get(0);

    /*
            Handlers Starts here
         */

    // 1
    if (this._btnGroupUseThisPic) {
      this._btnGroupUseThisPic.addEventListener(
        "click",
        this.handle_btnGroupUseThisPic.bind(this)
      );
    }

    // 2
    if (this._btnGroupRetryPhoto) {
      this._btnGroupRetryPhoto.addEventListener(
        "click",
        this.handle_btnGroupRetryPhoto.bind(this)
      );
    }
    if (this._btnGroupUseThisPicConfirm) {
      this._btnGroupUseThisPicConfirm.addEventListener(
        "click",
        this.handle_btnGroupUseThisPicConfirm.bind(this)
      );
    }

    // 3
    if (this._btnGroupHealthSaveExit) {
      this._btnGroupHealthSaveExit.addEventListener(
        "click",
        this.handle_btnGroupHealthSaveExit.bind(this)
      );
    }

    // if (this._btnGroupHealthContinue) {
    //     this._btnGroupHealthContinue.addEventListener('click', this.handle_btnGroupHealthContinue.bind(this));
    // }

    if (this._btnGroupHealthContinue) {
      this._btnGroupHealthContinue.addEventListener(
        "click",
        _visaSwift.handle_btnHealthInfoContinue.bind(_visaSwift)
      );
    }

    // handle_btnHealthInfoContinue

    // 4
    if (this._btnGroupDocsSaveExit) {
      this._btnGroupDocsSaveExit.addEventListener(
        "click",
        this.handle_btnGroupDocsSaveExit.bind(this)
      );
    }
    if (this._btnGroupDocsContinue) {
      this._btnGroupDocsContinue.addEventListener(
        "click",
        this.handle_btnGroupDocsContinue.bind(this)
      );
    }
  }

  removeMonetary(e) {
    const elementToRemove = e.closest(".add-monetary-instrument");
    // Perform further actions with the "contactDetails" element if needed.
    if (elementToRemove) {
      // Remove the "contactDetails" element.
      elementToRemove.remove();
    } else {
      console.log("no element found");
    }
  }

  generateOptDocumentHTML() {
    const container = this.$("#groupOptionalDocs"); // Replace 'documentContainer' with the ID or selector of the container where you want to append the documents

    this.$(container).empty();
    for (const documentNumber in _swiftStorage.passports) {
      if (
        _swiftStorage.passports.hasOwnProperty(documentNumber) &&
        documentNumber == _swiftStorage._documentNumber
      ) {
        const dData = _swiftStorage.passports[documentNumber].files;

        if (dData) {
          dData.forEach((documentData) => {
            const documentDiv = this.$("<div>").addClass("cs-view-docs");
            const div1 = this.$("<div>").addClass("w-100");
            const p = this.$("<p>")
              .addClass("file-name")
              .text(documentData.filename);

            div1.append(p);

            const div2 = this.$("<div>");

            this.$(div2).attr("data-file-url", documentData.file_url);

            this.$(div2).attr(
              "onclick",
              "_visaSwift.handle_popupShowFile(this)"
            );

            const i1 = this.$("<i>").addClass("fa fa-eye");

            div2.append(i1);

            const div3 = this.$("<div>");

            const i2 = this.$("<i>")
              .attr("data-id", documentData.attachment_id)
              .attr("data-doc-name", "optional")
              .addClass("fa fa-trash");

            this.$(i2).attr("onclick", "_visaSwift.delAccDocument(this)");

            div3.append(i2);

            documentDiv.append(div1, div2, div3);

            container.append(documentDiv);
          });
        }
      }
    }
  }

  // // Call the function to generate the HTML for the documents
  // generateDocumentHTML();

  displayGroupSelfie(documentNumber) {
    _visaSwift._groupResSelfie.classList.remove("hidden");
    _visaSwift._groupHealthDeclaration.classList.add("hidden");
    _visaSwift._groupUploadSelfie.classList.add("hidden");
    _visaSwift._groupOptDocs.classList.add("hidden");
    _swiftUiManager._groupUseThisSelfie.classList.remove("hidden");

    const selfieUrl = _swiftStorage.getSelfieUrl(documentNumber);
    this.img_GroupSelfie.src = selfieUrl;
    _swiftMP.img_GroupSelfieResp.src = selfieUrl;

    // show the buttons
    this.$(this._groupFRetryUploadSelfie).removeClass("hidden");

    // Pop Up
    const screenWidth = _swiftUiManager.getScreenWidth();
    if (screenWidth < 768) {
      _visaSwift._PopUp.classList.add("slide-top");
      _visaSwift._PopUp.classList.remove("slide-bottom");
    } else {
      _visaSwift._PopUp.style.display = "block";
    }
  }

  getScreenWidth() {
    return this.$(window).width();
  }

  // 1
  handle_btnGroupUseThisPic() {
    this._groupUseThisSelfie.classList.remove("hidden");

    this._groupFUploadSelfie.classList.add("hidden");
    this._groupFRetryUploadSelfie.classList.remove("hidden");
    this._groupFHealthDeclaration.classList.add("hidden");
    this._groupFDocument.classList.add("hidden");

    _visaSwift._groupHealthDeclaration.classList.add("hidden");
    _visaSwift._groupUploadSelfie.classList.add("hidden");
    _visaSwift._groupOptDocs.classList.add("hidden");
  }

  // 2
  handle_btnGroupRetryPhoto() {
    this._groupUseThisSelfie.classList.add("hidden");
    _visaSwift._groupUploadSelfie.classList.remove("hidden");

    this._groupFUploadSelfie.classList.remove("hidden");
    this._groupFRetryUploadSelfie.classList.add("hidden");
    this._groupFHealthDeclaration.classList.add("hidden");
    this._groupFDocument.classList.add("hidden");

    _visaSwift._groupHealthDeclaration.classList.add("hidden");
    _visaSwift._groupOptDocs.classList.add("hidden");
  }

  handle_btnGroupUseThisPicConfirm() {
    // set Selected Countries for passport
    // _swiftMP.setHealthCountries();
    // set radio selection for selected passport
    // _swiftMP.setRadioSymptoms();

    this._groupUseThisSelfie.classList.add("hidden");

    this._groupFUploadSelfie.classList.add("hidden");
    this._groupFRetryUploadSelfie.classList.add("hidden");

    // this._groupFHealthDeclaration.classList.remove("hidden");
    this._groupFDocument.classList.add("hidden");
    // work99
    // _visaSwift._groupHealthDeclaration.classList.remove("hidden");
    _visaSwift._groupUploadSelfie.classList.add("hidden");
    _visaSwift._groupOptDocs.classList.add("hidden");
    _visaSwift.handle_closePopup();
  }

  // 3
  handle_btnGroupHealthSaveExit() {
    _visaSwift.handle_closePopup();
    this._groupFUploadSelfie.classList.remove("hidden");
    this._groupFRetryUploadSelfie.classList.add("hidden");
    this._groupFHealthDeclaration.classList.add("hidden");
    this._groupFDocument.classList.add("hidden");

    // PENDING SAVE DATA HERE

    _visaSwift._groupHealthDeclaration.classList.add("hidden");
    this._groupUseThisSelfie.classList.add("hidden");
    _visaSwift._groupUploadSelfie.classList.add("hidden");
    _visaSwift._groupOptDocs.classList.add("hidden");

    // Test Validation For
    _swiftMP.validate();
  }

  handle_btnGroupHealthContinue() {
    // _visaSwift._groupOptDocs.classList.remove('hidden');
    // this._groupFUploadSelfie.classList.add('hidden');
    // this._groupFRetryUploadSelfie.classList.add('hidden');
    // this._groupFHealthDeclaration.classList.add('hidden');
    // this._groupFDocument.classList.remove('hidden');
    // this._groupUseThisSelfie.classList.add('hidden');
    // _visaSwift._groupHealthDeclaration.classList.add('hidden');
    // _visaSwift._groupUploadSelfie.classList.add('hidden');
  }

  // 4
  handle_btnGroupDocsSaveExit() {
    _visaSwift.handle_closePopup();
    this._groupFUploadSelfie.classList.remove("hidden");
    this._groupFRetryUploadSelfie.classList.add("hidden");
    this._groupFHealthDeclaration.classList.add("hidden");
    this._groupFDocument.classList.add("hidden");

    // PENDING SAVE DATA HERE

    // save the DOCUMENT HERE

    _visaSwift._groupHealthDeclaration.classList.add("hidden");
    this._groupUseThisSelfie.classList.add("hidden");
    _visaSwift._groupUploadSelfie.classList.add("hidden");
    _visaSwift._groupOptDocs.classList.add("hidden");

    // validate multipassport
    _swiftMP.validate();
  }

  handle_btnGroupDocsContinue() {
    _visaSwift.handle_closePopup();
    this._groupFUploadSelfie.classList.remove("hidden");
    this._groupFRetryUploadSelfie.classList.add("hidden");
    this._groupFHealthDeclaration.classList.add("hidden");
    this._groupFDocument.classList.add("hidden");

    // PENDING SAVE DATA HERE

    // save the DOCUMENT HERE

    _visaSwift._groupHealthDeclaration.classList.add("hidden");
    this._groupUseThisSelfie.classList.add("hidden");
    _visaSwift._groupUploadSelfie.classList.remove("hidden");
    _visaSwift._groupOptDocs.classList.add("hidden");

    this.$("#sb_GroupContactInformation").removeClass("cs_disabled");
    this.$("#sb_GroupContactInformation").addClass("cs-arrow");

    // validate multipassport
    _swiftMP.validate();
  }

  removePassUpload() {
    this.$("#wrap_MultiplPassports .group_passport").remove();
  }

  addGroupPassportResponseSection(response) {
    // passport already exists
    if (response.record_exists) return;

    var sectionToMove = this.$("#group_PassportResHtml").get(0);
    var targetDiv = this.$(this.wrap_MultiplPassports);
    targetDiv.append(sectionToMove.innerHTML);
  }

  delPassportContent() {
    const documentNumber = _swiftStorage._documentNumber;
    // Find all <section> elements within the specified container by ID
    var sections = this.$("#wrap_MultiplPassports").find(
      "section[data-document-number]"
    );

    sections.each(function () {
      // Get the data-document-number attribute value of the current section
      var sectionDocumentNumber = _swiftUiManager
        .$(this)
        .data("document-number");

      // Check if the current section's data-document-number matches the parameter
      if (sectionDocumentNumber === documentNumber) {
        // Remove the section if there's a match
        _swiftUiManager.$(this).remove();
      }
    });
  }

  showGroupPassportInfo(response) {
    // passport is already uploaded so we dont need to create new UI
    if (response.record_exists) return;

    var documentNumber = response.data.fields.documentNumber;
    var fullName = response.data.fields.fullName;
    var dateOfBirth = response.data.fields.dateOfBirth;
    var dateOfExpiry = response.data.fields.dateOfExpiry;

    // Get the first element with the class "group_p_response"
    this.$(".group_p_response")
      .first()
      .attr("data-document-number", documentNumber);

    // Find the first <section> with the specified data-document-number

    var targetSection = this.$(
      "section[data-document-number='" + documentNumber + "']:first"
    );

    targetSection.find(".group_ResFullName").text(fullName);
    targetSection.find(".group_ResDocNo").text(documentNumber);
    targetSection.find(".group_ResDoB").text(dateOfBirth);
    targetSection.find(".group_ResValid").text(dateOfExpiry);

    targetSection.find(".res_PImg").attr("src", response.passportUrl);
  }

  handle_contentForCitizen() {
    _visaSwift.setCitizenType();

    if (_visaSwift._seychellesCitizen == true) {
      this.hideElementsByClass("citizen-view");
    } else {
      this.showElementsByClass("citizen-view");
    }
  }

  hideElementsByClass(className) {
    const elements = document.getElementsByClassName(className);

    for (let i = 0; i < elements.length; i++) {
      elements[i].style.display = "none";
    }
  }

  showElementsByClass(className) {
    const elements = document.getElementsByClassName(className);

    for (let i = 0; i < elements.length; i++) {
      elements[i].style.display = "block";
    }
  }

  handle_PaymentSuccessful() {
    this.$("#bsContainer").addClass("hidden");
    this.$("#bsContainer").removeClass("d-flex");
    this.$("#page_ThanYou").removeClass("hidden");
    this.$("#ten_PaymentOptions").addClass("hidden");
  }

  ShowSummaryData() {
    // Get values from input fields
    var arrivalDateStr = this.$("#input_TripArrivalDate").val();
    var returnDateStr = this.$("#date_TripReturn").val();

    // Convert strings to JavaScript Date objects
    var arrivalDate = new Date(arrivalDateStr);
    var returnDate = new Date(returnDateStr);

    // Check if the input is valid
    if (isNaN(arrivalDate) || isNaN(returnDate)) {
      alert("Please enter valid dates.");
      return;
    }

    // Calculate the difference in days
    var timeDifference = returnDate.getTime() - arrivalDate.getTime();
    var daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

    // Display the result
    // alert('Number of days between the dates: ' + daysDifference);

    this.$("#summaryTotalDays").html(daysDifference);
  }
}

jQuery(document).ready(() => {
  window._swiftUiManager = new SwiftUiManager(jQuery);
});
