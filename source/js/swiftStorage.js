class SwiftStorage {
    // javascript global object

    _swiftGrandTotal = 0;
    _swiftBankFee = 0;

    $ = null;
    // _documentNumber = null;
    _documentNumber = 'FC1875731';
    _radioTripType = null;
    /**
     * This object is used to store data for passports
     */
    passports = {};

    currency = "€";
    standardProcessingFee = 10;
    premiumProcessingFee = 30;
    urgentProcessingFee = 70;
    _processingFeeToBeCharged = 0;
    _basicProtectionPerDayPrice = 3.95;
    _totalProtectionPerDayPrice = 6.95;
    _bankFeeInPercentage = 4;
    processingPeriod = null;

    _selfieIcon = "https://visitseychellesislands.com/wp-content/uploads/2023/11/user.png";


    // // legalPages Ono Production this array will remain full of pages
    // illegalPages = [
    //     'sb_PassportInformation',
    //     'sb_SelfiePhoto',
    //     'sb_ContactInformation',
    //     'sb_TripInformation',
    //     'sb_groupPassportInfo',
    //     'sb_HealthDeclaration',
    //     'sb_CustomsDeclaration',
    //     'sb_RequiredDocuments',
    //     'sb_OptionalDocuments',
    //     'sb_ConfirmProceed',
    //     'sb_PaymentOptions'
    // ];


    constructor($) {
        // init Jquery
        this.$ = $;
        this.init();


    }

    loadPassportInfo() {

        // this.passports[documentNumber]

        if (this.passports.hasOwnProperty(this._documentNumber)) {

            this.$(_swiftMP.tv_PassportName).text(this.passports[this._documentNumber].fullName);
            this.$(_swiftMP.tv_DocumentNumber).text(this.passports[this._documentNumber].issuingCountry + ' ' + this._documentNumber);
            this.$(_swiftMP.tv_PassportValidity).text(this.passports[this._documentNumber].dateOfExpiry);


            if (this.selfieExists()) {
                let selfieUrl = this.passports[this._documentNumber].selfieUrl;
                this.$('#img_GroupSelfie').attr('src', selfieUrl);
                this.$("#img_GroupSelfieResp").attr('src', selfieUrl);
            }


        }

    }


    getSelfieUrl(documentNumber) {
        if (this.passports.hasOwnProperty(documentNumber)) {
            return this.passports[documentNumber].selfieUrl;
        }

        return null;

    }


    init() {

        this._radioTripType = this.$('input[name="cs_trip_type"]:checked').val();

    }

    selfieExists() {
        return this.passports.hasOwnProperty(this._documentNumber) && this.passports[this._documentNumber].selfieUrl !== undefined
    }


    setSelfieUrl(documentNumber, selfieUrl) {

        if (this.passports.hasOwnProperty(documentNumber)) {
            this.passports[documentNumber].selfieUrl = selfieUrl;
        }

    }


    savePassportData(response) {

        this._documentNumber = response.data.fields.documentNumber;

      

        const documentNumber = response.data.fields.documentNumber;
        this.passports[documentNumber] = {
            fullName: response.data.fields.fullName,
            dateOfBirth: response.data.fields.dateOfBirth,
            dateOfExpiry: response.data.fields.dateOfExpiry,
            mrz_img_url: response.data.mrz_img_url,
            mrz_raw_text: response.data.mrz_raw_text,
            issuingCountry: response.data.fields.issuingCountry,
            nationality: response.data.fields.nationality,
            personalNumber: response.data.fields.personalNumber,
            files: []
        };
        // console.log(this.passports);
    }


    setTripInfo(data) {

        let applicantId = data.post_id;

        if (applicantId > 0) {
            _visaSwift._applicantId = data.applicantId;
        }

    }

    saveOptinalDoc(response) {

        const data = {
            filename: response.filename,
            attachment_id: response.attachment_id,
            file_url: response.file_url,
        };


        // Check if the document number key exists, if not, create it
        if (!this.passports[this._documentNumber]) {
            this.passports[this._documentNumber] = {
                files: []
            };
        }


        // Add the 'data' object to the files array
        this.passports[this._documentNumber].files.push(data);


    }


    contactInfoData() {

        var data = {};
        var repeaterData = [];

        this.$('#contact_Duplicate .cs-contact-details').each(function () {
            var contact = {};
            contact.name = _visaSwift.$(this).find('input[name="emg_contact_name"]').val();
            contact.phoneNumber = _visaSwift.$(this).find('input[name="cs_contact_info_emergency_no"]').val();
            repeaterData.push(contact);
        });


        data['phone'] = this.$('#input_ContactYourNumber').val();
        data['email'] = this.$('#input_ContactYourEmail').val();
        data['homeAddress'] = this.$('#input_ContactHomeAddress').val();
        // data['occupation'] = this.$('select[name="cs_contact_info_occupation"]').val();


        data['emergency_contacts'] = repeaterData;
        return data;
    }


    // tripInfoData() {
    //     var formData = {};
    
    //     // Get data from Purpose of travel dropdown
    //     formData.purposeOfTravel = this.$("#select_InfoTravelPurpose").val();
    
    //     // Get Arrival Details
    //     formData.arrivalDate = this.$("#input_TripArrivalDate").val();
    //     formData.startingCountry = this.$("#select_TripStartCountry").val();
    //     // formData.selectedAirline = this.$("#airlineSelect").val();
    //     // formData.selectedFlight = this.$("#flightSelect").val();
    
    //     // Get Departure Details
    //     formData.departureDate = this.$("#date_TripReturn").val();
    //     // formData.returnAirline = this.$("#return_airlineSelect").val();
    //     // formData.returnFlight = this.$("#return_flightSelect").val();
    //     formData.finalDestinationCountry = this.$("#select_TripEndCountry").val();
    
    //     // Get Where You Are Staying
    //     formData.whereStaying = this.$("#text_TripInfoAddress").val();
    //     formData.stayingFromDate = this.$("#date_TripInfoStayingFrom").val();
    //     formData.stayingToDate = this.$("#date_TripInfoStayingTo").val();
    
    //     // Get number of persons and number of children
    //     formData.numberOfPersons = this.$("#input_NumberOfPersons").val();
    //     formData.numberOfChildren = this.$("#input_NumberOfChildren").val();
    
    //     // Where is client staying (repeater)
    //     var repeaterData = [];
    //     this.$('.cs-address-where-staying').each(function () {
    //         var tripInfo = {};
    //         tripInfo.address = _swiftStorage.$(this).find('input[name="cs_trip_info_address"]').val();
    //         tripInfo.stayingFrom = _swiftStorage.$(this).find('input[name="cs_trip_info_date_from"]').val();
    //         tripInfo.stayingTo = _swiftStorage.$(this).find('input[name="cs_trip_info_date_to"]').val();
    
    //         repeaterData.push(tripInfo);
    //     });
    
    //     formData['trips'] = repeaterData;
    
    //     return formData;
    // }

    tripInfoData() {
        var formData = {};
    
        // Get data from Purpose of travel dropdown
        formData.purposeOfTravel = this.$("#select_InfoTravelPurpose").val();
    
        // Get Arrival Details
        formData.arrivalDate = this.$("#input_TripArrivalDate").val();
        formData.startingCountry = this.$("#select_TripStartCountry").val();
        // formData.selectedAirline = this.$("#airlineSelect").val();
        // formData.selectedFlight = this.$("#flightSelect").val();
    
        // Get Departure Details
        formData.departureDate = this.$("#date_TripReturn").val();
        // formData.returnAirline = this.$("#return_airlineSelect").val();
        // formData.returnFlight = this.$("#return_flightSelect").val();
        formData.finalDestinationCountry = this.$("#select_TripEndCountry").val();
    
        // Get Where You Are Staying
        formData.whereStaying = this.$("#text_TripInfoAddress").val();
        formData.stayingFromDate = this.$("#date_TripInfoStayingFrom").val();
        formData.stayingToDate = this.$("#date_TripInfoStayingTo").val();
    
        // Get number of persons and number of children
        formData.numberOfPersons = this.$("#input_NumberOfPersons").val();
        formData.numberOfChildren = this.$("#input_NumberOfChildren").val();
    
        // Where is client staying (repeater)
        var repeaterData = [];
        this.$('.cs-address-where-staying').each(function () {
            var tripInfo = {};
            tripInfo.address = _swiftStorage.$(this).find('input[name="cs_trip_info_address"]').val();
            tripInfo.stayingFrom = _swiftStorage.$(this).find('input[name="cs_trip_info_date_from"]').val();
            tripInfo.stayingTo = _swiftStorage.$(this).find('input[name="cs_trip_info_date_to"]').val();
    
            repeaterData.push(tripInfo);
        });
    
        formData['trips'] = repeaterData;
    
        return formData;
    }
    
    


    customDeclarationData() {


        var data = {};

        this.$('#six_Customs  input[type="radio"]').each(function () {
            // var name = _swiftStorage.$(this).attr("name");
            // var value = _swiftStorage.$(this).val();
            // radioButtonData[name] = value;

            var name = _swiftStorage.$(this).attr("name");
            var value = _swiftStorage.$(this).val();

            // Check if the radio button is checked
            if (_swiftStorage.$(this).prop("checked")) {
                data[name] = value;
            }


        });


        var repeaterData = [];

        this.$('#wrapMonetary .add-monetary-instrument').each(function () {
            var monetary = {};
            monetary.monetaryInstrument = _visaSwift.$(this).find('select[name="select_monetary_instrument"]').val();
            monetary.monetaryCurrency = _visaSwift.$(this).find('select[name="select_monetary_currency"]').val();
            monetary.currencyAmount = _visaSwift.$(this).find('input[name="number_MonetaryCurrencyAmount"]').val();
            repeaterData.push(monetary);
        });
        data['monetary'] = repeaterData;


        return data;


    }


    proceedContinueData() {
        var data = {};
        data.applicationBySelf = this.$('input[name="cs_applicant_agree"]:checked').val();
        data.contactName = this.$('#proceed_NotApplicantContact input[name="proceed_contact_name"]').val();
        data.contactNumber = this.$('#proceed_NotApplicantContact input[name="proceed_contact_number"]').val();
        data.emailAddress = this.$('#proceed_NotApplicantContact input[name="proceed_email"]').val();
        data.additionalNotes = this.$('#input_ConfirmNotes').val();
        return data;
    }

    healthDeclarationData() {

        let data = {};
        let healthSymptoms = null;


        if (_visaSwift._applicationSingle) {

            /**
             * Single Application
             */

            healthSymptoms = this.$("input[name='cs_health_symptoms']:checked").val();

            data.healthCounties = _swiftStorage.passports[_swiftStorage._documentNumber].health_countries;

        } else {

            /**
             * Group Passport Application
             */
            data.passports = _swiftStorage.passports;
            healthSymptoms = this.$("input[name='cs_group_health_symptoms']:checked").val();

        }


        data.healthSymptoms = healthSymptoms;


        return data;


    }

    paymentInfo() {
        let data = {};

        data.firstName = this.$("#firstName").val();
        data.lastName = this.$("#lastName").val();
        data.city = this.$("#csCity").val();
        data.state = this.$("#csState").val();
        data.postalCode = this.$("#postalCode").val();
        data.street1 = this.$("#input_ContactHomeAddress").val();
        data.email = this.$("#input_ContactYourEmail").val();
        data.country = this.$("#selectedCountry").text();

        // Card Information
        data.cardNumber = this.$("#proceed_CardNumber").val();
        data.cardHolderName = this.$("#proceed_CardHolderName").val();
        data.cardCvv = this.$("#proceed_CardCvv").val();
        data.cardExpMonth = this.$("#month").val();
        data.cardExpYear = this.$("#year").val();
        data.cardType = this.$("#cardType").val();


        // Amount
        data.amount = _swiftStorage._swiftGrandTotal;
        data.medical_protection = this.$('input[name="radio_medical_protection"]:checked').val();




        return data;

    }


}

jQuery(document).ready(() => {
    window._swiftStorage = new SwiftStorage(jQuery);
});
