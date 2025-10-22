class SwiftMultiPassport {


    $ = null;
    btn_GroupPassportInfoContinue = null;
    wrap_MultiplPassports = null;
    group_PassportResponse = null;
    container_GroupPassportUpload = null;
    anotherButton = null;
    input_SelfiePhoto = null;
    tv_PassportName = null;
    tv_DocumentNumber = null;
    tv_PassportValidity = null;
    group_PassportHtml = null;
    img_GroupSelfieResp = null;
    btn_GroupHealthContinue = null;

    input_GroupUploadOptionalDocs = null;

    constructor($) {
        // Constructor code here
        this.$ = $;
        this.init();
    }


    // Class methods go here
    init() {

        this.btn_GroupPassportInfoContinue = this.$('#btn_GroupPassportInfoContinue').get(0);
        this.group_PassportResponse = this.$('#group_PassportResponse').get(0);
        this.container_GroupPassportUpload = this.$('#container_GroupPassportUpload').get(0);
        this.wrap_MultiplPassports = this.$('#wrap_MultiplPassports').get(0);
        this.anotherButton = this.$('#anotherButton').get(0);
        this.input_SelfiePhoto = this.$('#input_SelfiePhoto').get(0);
        this.tv_PassportName = this.$('#tv_PassportName').get(0);
        this.tv_DocumentNumber = this.$('#tv_DocumentNumber').get(0);
        this.tv_PassportValidity = this.$('#tv_PassportValidity').get(0);
        this.input_GroupUploadOptionalDocs = this.$('#input_GroupUploadOptionalDocs').get(0);
        this.group_PassportHtml = this.$('#group_PassportHtml').get(0);
        this.img_GroupSelfieResp = this.$('#img_GroupSelfieResp').get(0);


        // Attach a click event listener to a parent element
        this.$("#wrap_MultiplPassports").on("click", ".btn_TakeASelfie", this.handle_TakeSelfie.bind(this));



        this.$("#wrap_MultiplPassports").on("click", ".btn_HealthDeclaration", this.handle_btnHealthDeclaration.bind(this));


        this.$("#wrap_MultiplPassports").on("click", ".btn_OptDocs", this.handle_btnOptDocs.bind(this));


        this.$("#wrap_MultiplPassports").on("click", ".del_Passport", this.handle_delPassport.bind(this));


        this.$(this.container_GroupPassportUpload).on("change", ".input_GroupPassport", _visaSwift.handle_passportUpload.bind(this));

        this.$("#wrap_MultiplPassports").on("change", ".input_GroupPassport", _visaSwift.handle_passportUpload.bind(_visaSwift));





        this.$("#wrap_MultiplPassports").on("change", "input[type='checkbox']", this.validate.bind(this));

        this.$("#wrap_MultiplPassports").on("change", "input[type='radio']", this.setHealthRadioValue.bind(this));



        // this.$(document).on('change', '#wrap_MultiplPassports input[type="radio"]', function () {
        //     this.validate();
        // });










        // Delegate the datepicker initialization to a container (dateFieldsContainer)
        this.$('#tripInfoWrap').on('focus', '.datepicker-field', function () {
            _swiftMP.$(this).datepicker({
                format: 'yyyy-mm-dd', // Specify the date format as needed
                autoclose: true, // Close the datepicker when a date is selected
                keyboardNavigation: true, // Allow keyboard navigation
                minDate: 0,
                startDate: new Date()
            });
        });






        if (this.btn_GroupPassportInfoContinue) {
            this.btn_GroupPassportInfoContinue.addEventListener('click', this.display_GroupPassportInfo.bind(this));
        }



        if (this.anotherButton) {
            this.anotherButton.addEventListener('click', this.handle_anotherButton.bind(this));
        }


        if (this.input_SelfiePhoto) {
            this.input_SelfiePhoto.addEventListener('change', _visaSwift.handle_inputSelfiePhoto.bind(this));
        }


        if (this.input_GroupUploadOptionalDocs) {
            this.input_GroupUploadOptionalDocs.addEventListener('change', _visaSwift.handle_inputUploadOptionalDocs.bind(_visaSwift));
        }



        if (this.btn_GroupHealthContinue) {
            this.btn_GroupHealthContinue.addEventListener('click', _visaSwift.handle_btnHealthInfoContinue.bind(_visaSwift));
        }




    }




    setHealthRadioValue() {
        var selectedValue = this.$('input[name="cs_group_health_symptoms"]:checked').val();
        

        console.log("setHealthRadioValue called");
        // Check if the document exists
        if (_swiftStorage.passports[_swiftStorage._documentNumber]) {
            // Add a new key 'group_health_symptoms' with the selected value
            _swiftStorage.passports[_swiftStorage._documentNumber].group_health_symptoms = selectedValue;

        }
    }


    handle_selfieDragover(e) {
        e.preventDefault();
        e.stopPropagation(); // Ens

        e.target.classList.add('cs-dragover'); // Add a visual indicator when dragging over the area
    }

    handle_selfieDragleave(e) {

        e.preventDefault();
        e.stopPropagation(); // Ens

        e.target.classList.remove('cs-dragover');

    }


    handle_selfieDrop(e) {

        e.preventDefault();
        e.stopPropagation(); // Ens
        e.target.classList.remove("cs-dragover"); // Remove the visual indicator when dropping


        var file = e.dataTransfer.files[0];


        // Update the corresponding input field with the dropped file
        var inputSelfieInfo = this.$(e.target).find(".input_selfie_info");

        inputSelfieInfo.files = e.dataTransfer.files;

        var customEvent = {};
        customEvent.target = inputSelfieInfo;

        _visaSwift.handle_inputSelfiePhoto(customEvent);

    }




    handle_delPassport(event) {


        if (confirm("Are you sure you want to delete the passport")) {

            /**
             * Active Document Number is used to identify the document user on which working
             */
            this.setActiveDocumentNumber(event);

            var sectionElement = this.$(event.target).closest('section[data-document-number]');
            if (sectionElement.length > 0) {
                var documentNumber = sectionElement.attr('data-document-number');
            } else {
                alert("document number not found for this passport");
            }


            if (!_visaSwift._applicantId || _visaSwift._applicantId == 0) {
                alert('Applicant Id is empty');
                return;
            }


            let _data = {
                action: 'delete_passport_sy',
                applicantId: _visaSwift._applicantId,
                applicationSingle: _visaSwift._applicationSingle,
                documentNumber: documentNumber,
            };

            // return;
            _visaSwift.runSpinner(true);

            _ajaxRequest
                .call(_data, 'json', 'post')
                .error((error) => {
                    console.log(error);
                })
                .then((response) => {
                    _visaSwift.runSpinner(false);

                    if (response.success) {

                        _swiftUiManager.delPassportContent();
                        _visaSwift.alertDanger(
                            "Passport Deleted",
                            "The passport you added has been deleted"
                        );

                    } else {
                        _visaSwift.alertDanger("Operation Failed",
                            "There is some error, we are unable to delete your passport");
                    }
                });


        }


    }

    // handle_inputSelfiePhoto(event){


    // }


    handle_passportUpload(e) {
        console.log("test function is called");
    }


    handle_btnOptDocs(event) {


        this.setActiveDocumentNumber(event);
        this.$("#group_UseThisSelfie").addClass('hidden');
        _visaSwift.handle_closePopup();

        _swiftUiManager.generateOptDocumentHTML();
        _swiftStorage.loadPassportInfo();

        _swiftUiManager._groupFUploadSelfie.classList.add('hidden');
        _swiftUiManager._groupFRetryUploadSelfie.classList.add('hidden');
        _swiftUiManager._groupFHealthDeclaration.classList.add('hidden');
        _swiftUiManager._groupFDocument.classList.remove('hidden');

        _visaSwift.handle_btnGroupOptDocs();

        // do validation for multipassport
        _swiftMP.validate();
    }



    setHealthCountries() {



        // Assuming 'passportData' contains your JavaScript object
        // var healthFlagCountries = passportData.FC1875731.health_flag_countries;

        // Assuming 'documentNumber' contains the document number you want to search for

        this.$('#selectedCountry2').empty();
        // Find the relevant document based on the document number
        var selectedDocument = _swiftStorage.passports[_swiftStorage._documentNumber];

        // Check if the document exists and has health_flag_countries
        if (selectedDocument && selectedDocument.health_flag_countries) {
            var selectedCountriesHTML = '';

            // Iterate through health_flag_countries and create HTML for each country
            for (var i = 0; i < selectedDocument.health_flag_countries.length; i++) {
                var countryInfo = selectedDocument.health_flag_countries[i];
                selectedCountriesHTML += '<div class="sel_country">';
                selectedCountriesHTML += '<img src="' + countryInfo.flag + '" alt="' + countryInfo.country + ' flag" style="width: 30px; height: 20px;">';
                selectedCountriesHTML += '<p>' + countryInfo.country + '</p>';
                selectedCountriesHTML += '<i class="fa fa-times deselect_country" data-country="' + countryInfo.country + '" aria-hidden="true"></i>';
                selectedCountriesHTML += '</div>';
            }

            // Append the generated HTML to the element with ID 'selectedCountry2'
            this.$('#selectedCountry2').html(selectedCountriesHTML);
        }











    }


    setRadioSymptoms() {

    }

    handle_btnHealthDeclaration(event) {

        this.setActiveDocumentNumber(event);


        // set Selected Countries for passport
        this.setHealthCountries();



        // set radio selection for selected passport
        this.setRadioSymptoms();


        this.$("#group_UseThisSelfie").addClass('hidden');




        // write your code to change hide and display the button
        _visaSwift.handle_closePopup();
        _swiftUiManager._groupFUploadSelfie.classList.add('hidden');
        _swiftUiManager._groupFRetryUploadSelfie.classList.add('hidden');
        _swiftUiManager._groupFHealthDeclaration.classList.remove('hidden');
        _swiftUiManager._groupFDocument.classList.add('hidden');


        _swiftStorage.loadPassportInfo();
        _visaSwift.handle_btnGroupHealthDeclaration();


    }


    handle_anotherButton(event) {

        this.setPassportInputUniqueId(true);


        var sectionToMove = this.$("#group_PassportHtml").get(0);
        var targetDiv = this.$("#wrap_MultiplPassports");
        targetDiv.append(sectionToMove.innerHTML);
        this.setPassportInputUniqueId(false);
    }


    setPassportInputUniqueId(a) {

        const newIdNumber = this.getNewPassportNumber();

        // Generate the new id based on the number
        var newId = "input_GroupPassport" + newIdNumber;

        var groupPassportDiv = this.$(this.group_PassportHtml);

        // Find the <input> element within the <div>
        var $inputElement = this.$(groupPassportDiv).find(".input_GroupPassport");


        // Set the new id for the <input>
        if (a == true)
            $inputElement.attr("id", newId);
        else
            $inputElement.attr("id", "");


        // Find the <label> that corresponds to the <input>
        var $labelElement = this.$(groupPassportDiv).find("label[for='input_GroupPassport']");


        // Set the new 'for' attribute for the <label>
        if (a == true)
            $labelElement.attr("for", newId);
        else
            $labelElement.attr("for", "");

    }


    getNewPassportNumber() {

        // Find the <div> with the id "wrap_MultiplPassports"
        var $wrapMultiplPassports = this.$("#wrap_MultiplPassports");

        // Find the <section> elements with the class "group_PRes" inside the <div>
        var $sections = $wrapMultiplPassports.find("section.group_passport");

        // Count the number of matching <section> elements
        var sectionCount = $sections.length;

        // Increment the count by 1
        var incrementedCount = sectionCount + 1;

        return incrementedCount;


    }

    activeGroupCountry() {
        window._swiftGroupCS = new swiftCountrySelect(this.$, "group_HealthDeclaration", false, 2);

    }


    display_GroupPassportInfo(e) {


        this.activeGroupCountry();
        var sectionToMove = this.$(".group_PRes").get(0);
        var targetDiv = this.$(this.wrap_MultiplPassports);
        targetDiv.append(sectionToMove.outerHTML);
        this.$(this.group_PassportResponse).removeClass('hidden');
        this.$(this.container_GroupPassportUpload).addClass('hidden');

    }


    setActiveDocumentNumber(e) {


        const section = e.target.closest('.group_PRes');
        // Get the data-document-number attribute value
        const documentNumber = section.getAttribute('data-document-number');

        _swiftStorage._documentNumber = documentNumber;


    }


    handle_TakeSelfie(e) {


        this.$(_swiftUiManager._btnGroupUseThisPic).addClass('hidden');



        this.setActiveDocumentNumber(e);


        _visaSwift.handle_closePopup();



        _swiftUiManager._groupFUploadSelfie.classList.remove('hidden');
        _swiftUiManager._groupFRetryUploadSelfie.classList.add('hidden');
        _swiftUiManager._groupFHealthDeclaration.classList.add('hidden');
        _swiftUiManager._groupFDocument.classList.add('hidden');

        // Find the nearest ancestor with the data-document-number attribute

        // this.setPassportInfoToHeader(documentNumber);
        _swiftStorage.loadPassportInfo();

        _visaSwift.handle_btnGroupTakeSelfie();


    }


    setPassportInfoToHeader(documentNumber) {
        this.$(this.tv_PassportName).text(_swiftStorage.passports[documentNumber].fullName);
        this.$(this.tv_PassportValidity).text(_swiftStorage.passports[documentNumber].dateOfExpiry);
        this.$(this.tv_DocumentNumber).text(documentNumber);
    }


    validateCheckBoxes() {
        let valid = true;
        // Select all checkboxes under the element with id wrap_MultiplPassports
        var checkboxes = this.$('#wrap_MultiplPassports input[type="checkbox"]');
        checkboxes.each(function () {
            if (!_swiftMP.$(this).prop('checked')) {
                valid = valid && false; // Exit the loop early
            }
        });
        return valid;
    }




    // validateSelfies() {




    //     let allPassportsContainSelfie = true;

    //     // Assuming this.passports is your object
    //     Object.keys(_swiftStorage.passports).forEach(function (documentNumber) {
    //         if (!_swiftStorage.passports[documentNumber].hasOwnProperty('selfieUrl')) {
    //             // The passport with documentNumber doesn't contain 'selfieUrl'
    //             allPassportsContainSelfie = false;
    //         }
    //     });


    //     return allPassportsContainSelfie;






    // }


    notOnePass() {
        return Object.keys(_swiftStorage.passports).length > 1;

    }

    passportCount() {
        return Object.keys(_swiftStorage.passports).length > 1;
    }



    validatePassportSelfies() {


        let valid = true;


        // Loop through the passports and check if each passport contains a selfieUrl
        for (let passportNumber in _swiftStorage.passports) {
            if (_swiftStorage.passports.hasOwnProperty(passportNumber)) {
                let passport = _swiftStorage.passports[passportNumber];

                // Check if selfieUrl exists in the passport
                if (passport.selfieUrl) {
                    // console.log(`Passport ${passportNumber} contains a selfieUrl: ${passport.selfieUrl}`);
                    valid = valid && true;
                } else {
                    // console.log(`Passport ${passportNumber} does not contain a selfieUrl.`);
                    valid = valid && false;

                }
            }
        }

        return valid;


    }



    validateHealthCountries() {
        // Loop through all passports
        for (let passportNumber in _swiftStorage.passports) {
            if (_swiftStorage.passports.hasOwnProperty(passportNumber)) {
                let passport = _swiftStorage.passports[passportNumber];

                // Check if the passport has at least one country in health_countries
                if (!passport.health_countries || passport.health_countries.length === 0) {
                    // Return false if any passport doesn't have a country in health_countries
                    return false;
                }
            }
        }

        // If all passports have at least one country in health_countries, return true
        return true;
    }


    validate() {


        // Also Validate User Must Upload Two passports



        let valid = true;




        // Done checking the Group Passport checkboxes
        let validateCheckBoxes = this.validateCheckBoxes();
        valid = valid && validateCheckBoxes;



        // Done Multipassports Testing
        let passportCount = this.passportCount();
        valid = valid && passportCount;




        // Done Selfie Testing
        // let validatePassportSelfies = this.validatePassportSelfies();
        // valid = valid && validatePassportSelfies;



        // Validate Health Countries true
        // let validateHealthCountries = this.validateHealthCountries();
        // valid = valid && validateHealthCountries;





        // console.log(`Value of valid is ${valid}`)

        // valid = this.validateSelfies();

        // valid = this.notOnePass();


        // console.log("value of" + valid);







        // If all radio buttons are checked, remove the disabled attribute from the button
        if (valid) {
            _swiftMP.$('#btn_GroupPassportResponseContinue').removeAttr('disabled');
        } else {
            // If not all radio buttons are checked, add the disabled attribute to the button
            _swiftMP.$('#btn_GroupPassportResponseContinue').attr('disabled', 'disabled');
        }



    }


}

jQuery(document).ready(() => {
    window._swiftMP = new SwiftMultiPassport(jQuery);
});
