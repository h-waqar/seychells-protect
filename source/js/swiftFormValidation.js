class SwiftFormValidation {
  // javascript global object

  /**
   * Global Validation Function Start
   */

  // This is the function for the RADIO BUTTON
  isRadioChecked(groupName, Yes, No) {
    const radioButtons = document.querySelectorAll(
      `input[type="radio"][name="${groupName}"]`
    );
    const labelYes = document.querySelectorAll(`label[for="${Yes}"]`);
    const labelNo = document.querySelectorAll(`label[for="${No}"]`);

    let checked = false; // Initialize a variable to track if any radio button is checked

    for (const radioButton of radioButtons) {
      if (radioButton.checked) {
        checked = true;
        break; // If any radio button is checked, exit the loop
      }
    }

    if (checked) {
      // At least one radio button is checked
      labelYes.forEach((label) => label.classList.remove("cs-error"));
      labelNo.forEach((label) => label.classList.remove("cs-error"));
    } else {
      // No radio button is checked, add 'cs-error' to all labels
      labelYes.forEach((label) => label.classList.add("cs-error"));
      labelNo.forEach((label) => label.classList.add("cs-error"));
    }

    return checked; // Return the checked state
  }

  // Validation for the Input File
  inputFileValidation(docFilesId, parentClass) {
    // Find the element with the specified ID
    let valid = true;
    const docFilesElement = document.getElementById(docFilesId);

    // Check if the docFilesElement exists and if it has inner HTML content
    if (docFilesElement && docFilesElement.innerHTML.trim() === "") {
      // Find the closest ancestor element with the specified class
      const parentElement = docFilesElement.closest("." + parentClass);

      // Check if the parent element exists
      if (parentElement) {
        // Change the border color to "1px solid red"
        parentElement.style.border = "1px solid red";
        valid = false;
      }
    }

    return valid;
  }

  // Validation for the First Name
  validateFirstName(inputId) {
    const inputElement = document.getElementById(inputId);

    if (!inputElement) {
      console.error(`Input element with ID ${inputId} not found.`);
      // return false; // Return false if the input element is not found
    }

    const firstName = inputElement.value.trim(); // Trim to remove leading and trailing spaces

    let valid = false;

    if (firstName == "") valid = false;
    else valid = true;

    // Regular expression for checking if the first name contains only letters
    // const nameRegex = /^[A-Za-z]+$/;

    // Check if the first name is valid based on the regular expression
    // let valid = nameRegex.test(firstName);

    if (!valid) {
      // If not valid, you can handle the error or apply styling as needed
      console.error(`Invalid ${inputId}: ${firstName}`);
      // Example: Highlight the input with a red border
      inputElement.classList.add("cs-error"); // Add the 'cs-error' class
    } else {
      // If valid, remove any styling applied during previous validation
      inputElement.classList.remove("cs-error"); // Add the 'cs-error' class
    }

    return valid;
  }

  validateText(inputId) {
    const inputElement = document.getElementById(inputId);

    if (!inputElement) {
      console.error(`Input element with ID ${inputId} not found.`);
      // return false; // Return false if the input element is not found
    }

    const firstName = inputElement.value.trim(); // Trim to remove leading and trailing spaces

    // Regular expression for checking if the first name contains only letters and spaces
    const nameRegex = /^[A-Za-z\s]+$/;

    // Check if the first name is valid based on the regular expression
    let valid = nameRegex.test(firstName);

    if (!valid) {
      // If not valid, you can handle the error or apply styling as needed
      console.error(`Invalid ${inputId}: ${firstName}`);
      // Example: Highlight the input with a red border
      inputElement.classList.add("cs-error"); // Add the 'cs-error' class
    } else {
      // If valid, remove any styling applied during previous validation
      inputElement.classList.remove("cs-error"); // Remove the 'cs-error' class
    }

    return valid;
  }

  validatePostalCode(inputId) {
    // Convert input to string
    const inputElement = document.getElementById(inputId);
    // Regular expression for a postal code with 3 to 10 integers
    const postalCodePattern = /^\d{3,10}$/;

    // Validate the input against the pattern
    const isValid = postalCodePattern.test(inputElement.value);

    if (!isValid) {
      // If not valid, you can handle the error or apply styling as needed
      console.error(`Invalid ${inputId}: ${inputElement.value}`);
      // Example: Highlight the input with a red border
      inputElement.classList.add("cs-error"); // Add the 'cs-error' class
    } else {
      // If valid, remove any styling applied during previous validation
      inputElement.classList.remove("cs-error"); // Remove the 'cs-error' class
    }

    return isValid;
  }

  validateCreditCardNumber(inputId) {
    // Input Element
    const inputElement = document.getElementById(inputId);
    const cardNumber = inputElement.value;

    // Remove spaces and non-digit characters from the card number
    const cleanedCardNumber = cardNumber.replace(/\D/g, "");

    let isValid = /^\d{15,16}$/.test(cleanedCardNumber);

    if (!isValid) {
      // If not valid, you can handle the error or apply styling as needed
      console.error(`Invalid ${inputId}: ${inputElement.value}`);
      // Example: Highlight the input with a red border
      inputElement.classList.add("cs-error"); // Add the 'cs-error' class
    } else {
      // If valid, remove any styling applied during previous validation
      inputElement.classList.remove("cs-error"); // Remove the 'cs-error' class
    }

    // Check if the cleaned card number is numeric and has a valid length (15 or 16 digits)
    return isValid;
  }

  validateCvv(inputId) {
    // Input Element
    const inputElement = document.getElementById(inputId);
    const cardNumber = inputElement.value;

    // Remove spaces and non-digit characters from the card number
    const cleanedCardNumber = cardNumber.replace(/\D/g, "");

    let isValid = /^\d{3,4}$/.test(cleanedCardNumber);

    if (!isValid) {
      // If not valid, you can handle the error or apply styling as needed
      console.error(`Invalid ${inputId}: ${inputElement.value}`);
      // Example: Highlight the input with a red border
      inputElement.classList.add("cs-error"); // Add the 'cs-error' class
    } else {
      // If valid, remove any styling applied during previous validation
      inputElement.classList.remove("cs-error"); // Remove the 'cs-error' class
    }

    // Check if the cleaned card number is numeric and has a valid length (15 or 16 digits)
    return isValid;
  }

  validateSelect(inputId) {
    const selectElement = document.getElementById(inputId);

    if (!selectElement) {
      console.error(`Select element with ID ${inputId} not found.`);
      // return false; // Return false if the select element is not found
    }

    const selectedOption = selectElement.value;

    // Check if an option is selected
    let valid = selectedOption !== "";

    if (!valid) {
      // If not valid, you can handle the error or apply styling as needed
      console.error(`No option selected for ${inputId}`);
      // Example: Highlight the select element with a red border
      selectElement.classList.add("cs-error"); // Add the 'cs-error' class
    } else {
      // If valid, remove any styling applied during previous validation
      selectElement.classList.remove("cs-error"); // Remove the 'cs-error' class
    }

    return valid;
  }

  /**
   * Global Validation Function Ends
   */

  $;
  select_InfoTravelPurpose;
  label_InfoTravelPurpose;
  input_TripArrivalDate;
  msg_TripStartingSoon;
  checkbox_PageOnePassport;
  input_ContactYourNumber;
  input_ContactYourEmail;
  btn_AddContact;
  input_UploadAccomDocs;

  constructor($) {
    // init Jquery
    this.$ = $;
    this.init();
  }
  init() {
    this.select_InfoTravelPurpose = this.$("#select_InfoTravelPurpose").get(0);
    this.label_InfoTravelPurpose = this.$("#label_InfoTravelPurpose").get(0);
    this.input_TripArrivalDate = this.$("#input_TripArrivalDate").get(0);
    this.msg_TripStartingSoon = this.$("#msg_TripStartingSoon").get(0);
    this.checkbox_PageOnePassport = this.$("#checkbox_PageOnePassport").get(0);
    this.input_ContactYourNumber = this.$("#input_ContactYourNumber").get(0);
    this.input_ContactYourEmail = this.$("#input_ContactYourEmail").get(0);
    this.btn_AddContact = this.$("#btn_AddContact").get(0);
    this.input_UploadAccomDocs = this.$("#input_UploadAccomodationDocs").get(0);

    this.$(".datepicker")
      .datepicker({
        // Set the minimum date to the current date (0)
        format: "yyyy-mm-dd", // Specify the date format as needed
        autoclose: true, // Close the datepicker when a date is selected
        keyboardNavigation: true, // Allow keyboard navigation
        minDate: 0,
        
        startDate: new Date(),
      })
      .on("change", function (e) {
        if (e.target.id === "input_TripArrivalDate") {
          // Assuming endDatePicker is the variable referencing your endDate datepicker
          var endDatePicker = _visaSwift.$("#date_TripReturn"); // Change the class accordingly

          // Update minDate for endDatePicker to be the selected startDate
          endDatePicker.datepicker("option", "minDate", e.target.value);

          window._swiftFV.handle_inputTripArrivalDate(e.target);
        }
      });

    this.$(".datepickerDOB")
      .datepicker({
        // Set the minimum date to the current date (0)
        format: "yyyy-mm-dd", // Specify the date format as needed
        autoclose: true, // Close the datepicker when a date is selected
        keyboardNavigation: true, // Allow keyboard navigation
        // minDate: 0,
        maxDate: 0, // 0 = today; positive = days from today, negative = days before today
        startDate: new Date(),
      })
      .on("change", function (e) {});

    this.mountJqueryDatepickers();

    // Add a click event listener to all radio buttons with the same name attribute
    this.$("[name^='cs_customs_']").on("click", function () {
      let nameAttr = _swiftFV.$(this).attr("name");
      let relatedRadioButtons = _swiftFV.$("[name='" + nameAttr + "']");

      relatedRadioButtons.each(function () {
        _swiftFV.$(this).next("label").removeClass("cs-error");
      });
    });

    // const removeButtons = document.querySelectorAll('.remove-button');
    // removeButtons.forEach(button => {
    // 	button.addEventListener('click', function() {
    // 		// Call a function or execute code when the "Remove" button is clicked.
    // 		alert("Removing contact");

    // 		// Find the closest element with the class "cs-contact-details."
    // 		const contactDetails = button.closest('.cs-contact-details');
    // 		// Perform further actions with the "contactDetails" element if needed.
    // 		if (contactDetails) {
    // 			// Remove the "contactDetails" element.
    // 			contactDetails.remove();
    // 		}
    // 	});
    // });

    if (this.select_InfoTravelPurpose) {
      this.select_InfoTravelPurpose.addEventListener(
        "change",
        this.handle_selectInfoTravelPurpose.bind(this)
      );
    }

    if (this.checkbox_PageOnePassport) {
      this.checkbox_PageOnePassport.addEventListener(
        "change",
        this.handle_checkboxPageOnePassport.bind(this)
      );
    }

    if (this.input_ContactYourNumber) {
      this.input_ContactYourNumber.addEventListener(
        "change",
        this.handle_inputContactYourNumber.bind(this)
      );
    }

    if (this.input_ContactYourEmail) {
      this.input_ContactYourEmail.addEventListener(
        "change",
        this.handle_inputContactYourEmail.bind(this)
      );
    }

    if (this.btn_AddContact) {
      this.btn_AddContact.addEventListener(
        "click",
        this.handle_btnAddContact.bind(this)
      );
    }

    // if (_visaSwift.input_ContactHomeAddress) {
    // 	_visaSwift.input_ContactHomeAddress.addEventListener('change', this.handle_inputContactHomeAddress.bind(this));
    // }

    // if (this.input_TripArrivalDate) {

    // 	this.input_TripArrivalDate.addEventListener('change', this.handle_inputTripArrivalDate.bind(this));
    // }
  }

  /**
   * Class Functions Start
   */

  // !: TODO

  medicalProtection() {
    var selectedRadio = this.$(
      "input[name='radio_medical_protection']:checked"
    );

    if (selectedRadio.length > 0) {
      this.$("#medicalProtection label").removeClass("cs-error");

      return true;
    } else {
      // No radio button selected, add red border to labels
      this.$("#medicalProtection label").addClass("cs-error");
      return false;
    }
  }

  mountJqueryDatepickers() {
    const $ = this.$;
    const today = new Date();
    const minDate = new Date(today);
    minDate.setFullYear(today.getFullYear() - 120);

    $(".datepicker-dob").datepicker("destroy").datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      keyboardNavigation: true,
      startDate: minDate,
      endDate: today,
    });
  }

  personalInformation() {
    let isValid = true;
    const $ = this.$;

    // ✅ Helper to enforce !important red border
    const setError = (el, hasError) => {
      if (hasError) {
        $(el).attr(
          "style",
          ($(el).attr("style") || "") + "border-color: red !important;"
        );
      } else {
        const currentStyle = $(el).attr("style") || "";
        const cleaned = currentStyle.replace(
          /border-color:\s*red\s*!important;?/gi,
          ""
        );
        $(el).attr("style", cleaned.trim());
      }
    };

    // 1️⃣ Validate main fields
    const phone = $("#input_ContactYourNumber");
    const email = $("#input_ContactYourEmail");

    const phoneVal = phone.val()?.trim() || "";
    const emailVal = email.val()?.trim() || "";

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^[0-9()+\-.\s]+$/;

    if (!phoneVal || !phoneRegex.test(phoneVal)) {
      setError(phone, true);
      isValid = false;
    } else setError(phone, false);

    if (!emailVal || !emailRegex.test(emailVal)) {
      setError(email, true);
      isValid = false;
    } else setError(email, false);

    // 2️⃣ Validate applicants
    $(".cs-contact-details").each(function () {
      if (!document.body.contains(this)) return;
      if (!$(this).is(":visible")) return;

      const nameInput = $(this).find('input[name="emg_contact_name"]');

      const dobInput = $(this).find('input[data-datepicker="true"]');

      if (nameInput.length === 0 && dobInput.length === 0) return;

      const nameVal = nameInput.val()?.trim() || "";
      const dobVal = dobInput.val()?.trim() || "";

      // Name required
      if (!nameVal) {
        setError(nameInput, true);
        isValid = false;
      } else setError(nameInput, false);

      // DOB required and cannot be future
      if (!dobVal) {
        setError(dobInput, true);
        isValid = false;
      } else {
        const dobDate = new Date(dobVal);
        const today = new Date();
        if (dobDate > today) {
          setError(dobInput, true);
          isValid = false;
        } else setError(dobInput, false);
      }
    });

    return isValid;
  }
  tripInformation() {
    let isValid = true;
    const $ = this.$;

    // ✅ Same helper for consistent styling
    const setError = (el, hasError) => {
      if (hasError) {
        $(el).attr(
          "style",
          ($(el).attr("style") || "") + "border-color: red !important;"
        );
      } else {
        const currentStyle = $(el).attr("style") || "";
        const cleaned = currentStyle.replace(
          /border-color:\s*red\s*!important;?/gi,
          ""
        );
        $(el).attr("style", cleaned.trim());
      }
    };

    // 🔹 Fields
    const arrival = $("#input_TripArrivalDate");
    const departure = $("#date_TripReturn");
    const address = $("#address_in_seychelles");

    const arrivalVal = arrival.val()?.trim() || "";
    const departureVal = departure.val()?.trim() || "";
    const addressVal = address.val()?.trim() || "";

    // 1️⃣ Required: Arrival Date
    if (!arrivalVal) {
      setError(arrival, true);
      isValid = false;
    } else setError(arrival, false);

    // 2️⃣ Required: Departure Date and must be after arrival
    if (!departureVal) {
      setError(departure, true);
      isValid = false;
    } else {
      const arrDate = new Date(arrivalVal);
      const depDate = new Date(departureVal);
      if (depDate <= arrDate) {
        setError(departure, true);
        isValid = false;
      } else setError(departure, false);
    }

    // 3️⃣ Required: Address in Seychelles
    if (!addressVal) {
      setError(address, true);
      isValid = false;
    } else setError(address, false);

    return isValid;
  }

  payment() {
    // Array to store validation results
    let validate = [];

    // Validate First Name
    validate.push(this.validateFirstName("firstName"));

    // Validate Last Name
    validate.push(this.validateFirstName("lastName"));

    // Validate City Name
    validate.push(this.validateFirstName("csCity"));

    // Validate State
    validate.push(this.validateFirstName("csState"));

    // Postal Code
    validate.push(this.validatePostalCode("postalCode"));

    // Card Number
    validate.push(this.validateCreditCardNumber("proceed_CardNumber"));

    // Validate Cardholder Name
    validate.push(this.validateText("proceed_CardHolderName"));

    // Validate CVV
    validate.push(this.validateCvv("proceed_CardCvv"));

    // Validate Exp Month
    validate.push(this.validateSelect("month"));

    // Validate Exp Year
    validate.push(this.validateSelect("year"));

    // Validate Exp Card Type
    validate.push(this.validateSelect("cardType"));

    // Check if all validations passed
    return validate.every((result) => result);
  }

  processingPeriod() {
    if (this.$('input[name="cs_processing_period"]:checked').length > 0) {
      this.$("#processingPeriod label").css("border", "none");

      return true;
    } else {
      this.$("#processingPeriod label").css("border", "1px solid red");

      return false;
    }
  }

  handle_inputContactHomeAddress(e) {
    console.log("function is called");

    let inputVal = this.$(e.target).val();

    // Check if the input is empty or has a length less than 5
    if (inputVal === "" || inputVal.length < 5) {
      this.$(e.target).addClass("cs-error");
    } else {
      this.$(e.target).removeClass("cs-error");
    }
  }
  proceedContinue() {
    let valid = true;

    if (this.$('input[name="cs_applicant_agree"]:checked').length > 0) {
      // Get the value of the selected radio button
      let selectedValue = this.$(
        'input[name="cs_applicant_agree"]:checked'
      ).val();
      // Display the selected value in the console
      // console.log("Selected Value: " + selectedValue);

      console.log(selectedValue);

      if (selectedValue == "yes") {
        /**
         * user is filling the application is by himself
         */

        return true;
      } else {
        /**
         * Agent is booking the application
         * agent is booking the application means no
         */

        // Get the values from the input fields
        let contactName = this.$(
          '#proceed_NotApplicantContact input[name="proceed_contact_name"]'
        ).val();
        let contactNumber = this.$(
          '#proceed_NotApplicantContact input[name="proceed_contact_number"]'
        ).val();
        let emailAddress = this.$(
          '#proceed_NotApplicantContact input[name="proceed_email"]'
        ).val();

        // Check if any of the fields is empty
        if (contactName.trim() === "") {
          //  alert('Please enter your name.');
          this.$(
            '#proceed_NotApplicantContact input[name="proceed_contact_name"]'
          ).addClass("cs-error");
          //  return;
          valid = false;
        } else {
          this.$(
            '#proceed_NotApplicantContact input[name="proceed_contact_name"]'
          ).removeClass("cs-error");
        }

        if (contactNumber.trim() === "" || contactNumber.length < 9) {
          this.$(
            '#proceed_NotApplicantContact input[name="proceed_contact_number"]'
          ).addClass("cs-error");
          valid = false;
        } else {
          this.$(
            '#proceed_NotApplicantContact input[name="proceed_contact_number"]'
          ).removeClass("cs-error");
        }

        if (emailAddress.trim() === "" || !this.validateEmail(emailAddress)) {
          this.$(
            '#proceed_NotApplicantContact input[name="proceed_email"]'
          ).addClass("cs-error");
          valid = false;
        } else {
          this.$(
            '#proceed_NotApplicantContact input[name="proceed_email"]'
          ).removeClass("cs-error");
        }
      }

      this.$("#nine_Proceed label").css("border", "1px solid black");

      return true;
    } else {
      /**
       * Perform remaining validation
       */
      // No radio button is selected

      this.$("#nine_Proceed label").css("border", "1px solid red");

      return false;
    }
  }

  tripInfo_NonSeychellesCitizen() {
    const select_InfoTravelPurpose = this.$("#select_InfoTravelPurpose").get(0);

    // Departure
    const date_TripReturn = this.$("#date_TripReturn").get(0);
    // const select_ReturnAirline = this.$('#return_airlineSelect').get(0);
    // const select_ReturnFlight = this.$('#return_flightSelect').get(0);
    const select_TripEndCountry = this.$("#select_TripEndCountry").get(0);
    // Where are you staying?
    // const text_TripInfoAddress = this.$('#text_TripInfoAddress').get(0);
    const date_TripInfoStayingFrom = this.$("#date_TripInfoStayingFrom").get(0);
    // const date_TripInfoStayingTo = this.$('#date_TripInfoStayingTo').get(0);

    let valid = true;

    // //--------------> Travel Purpose
    // if (select_InfoTravelPurpose.value === "") {
    //   select_InfoTravelPurpose.classList.add("cs-error");
    //   valid = false; // Prevent form submission
    // } else {
    //   select_InfoTravelPurpose.classList.remove("cs-error");
    // }

    //=======================================> Departure Date
    if (date_TripReturn.value === "") {
      date_TripReturn.classList.add("cs-error");
      valid = false; // Prevent form submission
    } else {
      date_TripReturn.classList.remove("cs-error");
    }

    //--------------> Departure Return Airline
    // if (select_ReturnAirline.value === '') {
    // 	select_ReturnAirline.classList.add('cs-error');
    // 	valid = false; // Prevent form submission
    // } else {
    // 	select_ReturnAirline.classList.remove('cs-error');
    // }

    //--------------> Departure Return Flight
    // if (select_ReturnFlight.value === '') {
    // 	select_ReturnFlight.classList.add('cs-error');
    // 	valid = false; // Prevent form submission
    // } else {
    // 	select_ReturnFlight.classList.remove('cs-error');
    // }

    // //--------------> Final Destination Country
    // if (select_TripEndCountry.value === "") {
    //   select_TripEndCountry.classList.add("cs-error");
    //   valid = false; // Prevent form submission
    // } else {
    //   select_TripEndCountry.classList.remove("cs-error");
    // }

    valid = this.validateAddressFields() && this.checkDateFields();

    return valid;
  }

  tripInfo_SeychellesCitizen() {
    // Arrival
    const input_TripArrivalDate = this.$("#input_TripArrivalDate").get(0);
    // const select_ArrivalAirline = this.$('#airlineSelect').get(0);
    // const select_ArrivalFlight = this.$('#flightSelect').get(0);
    const select_TripStartCountry = this.$("#select_TripStartCountry").get(0);

    let valid = true;
    //=======================================> Trip Arrival Date
    if (input_TripArrivalDate.value === "") {
      input_TripArrivalDate.classList.add("cs-error");
      valid = false; // Prevent form submission
    } else {
      input_TripArrivalDate.classList.remove("cs-error");
    }

    //--------------> Select Arrival Airline
    // if (select_ArrivalAirline.value === '') {
    // 	select_ArrivalAirline.classList.add('cs-error');
    // 	valid = false; // Prevent form submission
    // } else {
    // 	select_ArrivalAirline.classList.remove('cs-error');
    // }

    //--------------> Select Arrival Flight
    // if (select_ArrivalFlight.value === '') {
    // 	select_ArrivalFlight.classList.add('cs-error');
    // 	valid = false; // Prevent form submission
    // } else {
    // 	select_ArrivalFlight.classList.remove('cs-error');
    // }

    //--------------> Trip Start Country
    // if (select_TripStartCountry.value === "") {
    //   select_TripStartCountry.classList.add("cs-error");
    //   valid = false; // Prevent form submission
    // } else {
    //   select_TripStartCountry.classList.remove("cs-error");
    // }

    return valid;
  }

  /**
   * This is the Validation for the TRIP INFO o_0
   */

  // tripInfo() {
  //   // This is the init

  //   let valid = true;

  //   valid = this.tripInfo_SeychellesCitizen();

  //   if (!_visaSwift._seychellesCitizen) {
  //     valid = this.tripInfo_NonSeychellesCitizen();
  //   }

  //   //=======================================> Staying Address
  //   // if (text_TripInfoAddress.value === '') {
  //   // 	text_TripInfoAddress.parentElement.parentElement.classList.add('cs-error');
  //   // 	valid = false; // Prevent form submission
  //   // } else {
  //   // 	text_TripInfoAddress.parentElement.parentElement.classList.remove('cs-error');
  //   // }

  //   //--------------> Staying From
  //   // if (date_TripInfoStayingFrom.value === '') {
  //   // 	date_TripInfoStayingFrom.parentElement.parentElement.classList.add('cs-error');
  //   // 	document.querySelector('label[for="date_TripInfoStayingFrom"]').style.borderColor = 'red';
  //   // 	valid = false; // Prevent form submission
  //   // } else {
  //   // 	date_TripInfoStayingFrom.parentElement.parentElement.classList.remove('cs-error');
  //   // 	document.querySelector('label[for="date_TripInfoStayingFrom"]').style.borderColor = 'black';
  //   // }

  //   //--------------> Staying To
  //   // if (date_TripInfoStayingTo.value === '') {
  //   // 	date_TripInfoStayingTo.parentElement.parentElement.classList.add('cs-error');
  //   // 	document.querySelector('label[for="date_TripInfoStayingTo"]').style.borderColor = 'red';
  //   // 	valid = false; // Prevent form submission
  //   // } else {
  //   // 	date_TripInfoStayingTo.parentElement.parentElement.classList.remove('cs-error');
  //   // 	document.querySelector('label[for="date_TripInfoStayingTo"]').style.borderColor = 'black';
  //   // }

  //   // console.log(valid);

  //   // console.log(valid);

  //   // Final Validation Result
  //   return valid;
  // }

  // !: TODO

  tripInfo() {
    // This is the init
    let valid = true;

    // valid = this.tripInfo_SeychellesCitizen();
    valid = true;

    if (!_visaSwift._seychellesCitizen) {
      valid = this.tripInfo_NonSeychellesCitizen();
    }

    // Validation: Number of Persons
    // const inputPersons = document.getElementById("input_NumberOfPersons");
    // if (
    //   inputPersons.value === "" ||
    //   isNaN(inputPersons.value) ||
    //   parseInt(inputPersons.value) <= 0
    // ) {
    //   inputPersons.parentElement.classList.add("cs-error");
    //   valid = false;
    // } else {
    //   inputPersons.parentElement.classList.remove("cs-error");
    // }

    // Validation: Number of Children
    // const inputChildren = document.getElementById("input_NumberOfChildren");
    // if (
    //   inputChildren.value === "" ||
    //   isNaN(inputChildren.value) ||
    //   parseInt(inputChildren.value) < 0
    // ) {
    //   inputChildren.parentElement.classList.add("cs-error");
    //   valid = false;
    // } else {
    //   inputChildren.parentElement.classList.remove("cs-error");
    // }

    // Final Validation Result
    return valid;
  }

  // Define a function to check and style date fields
  checkDateFields() {
    let valid = true;
    this.$(".tripInfoWrap input.datepicker-field").each(function () {
      let $input = _swiftFV.$(this);
      let $label = $input.closest(".cs-form-outline");
      let date = $input.val();

      // Check if the date is empty
      if (date === "") {
        _swiftFV.$($label).addClass("cs-error");
        valid = false && valid;
      } else {
        _swiftFV.$($label).removeClass("cs-error");
      }
    });

    console.log(valid);

    return valid;
  }

  validateAddressFields() {
    let valid = true;
    this.$(".cs-address-where-staying input[name='cs_trip_info_address']").each(
      function () {
        let $input = _swiftFV.$(this);
        let address = $input.val();
        let $label = $input.closest(".cs-form-outline");

        // Check if the address has less than 5 characters
        if (address.length < 5) {
          $label.addClass("cs-error");
          valid = false && valid;
        } else {
          $label.removeClass("cs-error");
        }
      }
    );

    return valid;
  }

  /**
   * This is the Validation of the Health Declaration 0_^
   */
  healthDeclaration() {
    let valid = true;
    let countryDiv = null;
    if (_visaSwift._applicationSingle) countryDiv = "selectedCountry1";
    else countryDiv = "selectedCountry2";

    // Validate countires
    if (!this.$("#" + countryDiv).children().length) {
      valid = false;

      this.$(".health_country_search label").addClass("cs-error");
    } else {
      this.$(".health_country_search label").removeClass("cs-error");
    }

    if (_visaSwift._applicationSingle) {
      // Single Application
      if (!this.$('input[name="cs_health_symptoms"]:checked').length > 0) {
        valid = false;
        this.$(".health_declaration_qr .cs-qna-radio label").addClass(
          "cs-error"
        );
      } else {
        this.$(".health_declaration_qr .cs-qna-radio label").removeClass(
          "cs-error"
        );
      }
    } else {
      // Group Application
      if (
        !this.$('input[name="cs_group_health_symptoms"]:checked').length > 0
      ) {
        valid = false;
        this.$(".cs-qna-radio label").addClass("cs-error");
      } else {
        this.$(".cs-qna-radio label").removeClass("cs-error");
      }
    }

    return valid;
  }

  /**
   * This is the Validation of the Customs Declaration 0_*
   */
  customDeclaration() {
    let valid = true;

    valid = this.isRadioChecked(
      "cs_customs_animal_plant",
      "input_CustomsAnimalPlantYes",
      "input_CustomsAnimalPlantNo"
    );

    valid = this.isRadioChecked(
      "cs_customs_visited_farm",
      "input_CustomsVisitedFarmYes",
      "input_CustomsVisitedFarmNo"
    );

    valid = this.isRadioChecked(
      "cs_customs_toxic_substances",
      "input_CustomsToxicSubstancesYes",
      "input_CustomsToxicSubstancesNo"
    );

    valid = this.isRadioChecked(
      "cs_customs_transporting_currency",
      "input_CustomsTransportingCurrencyYes",
      "input_CustomsTransportingCurrencyNo"
    );

    valid = this.isRadioChecked(
      "cs_customs_commercial_merch",
      "input_CustomsComercialMerchYes",
      "input_CustomsComercialMerchNo"
    );

    valid = this.isRadioChecked(
      "cs_customs_purchased_abroad",
      "input_CustomsPurchasedAbroadYes",
      "input_CustomsPurchasedAbroadNo"
    );

    valid = this.isRadioChecked(
      "cs_customs_another_person_goods",
      "input_CustomsAnotherPersonYes",
      "input_CustomsAnotherPersonNo"
    );

    valid = this.isRadioChecked(
      "cs_customs_free_alcohol",
      "input_CustomsFreeAlcoholYes",
      "input_CustomsFreeAlcoholNo"
    );

    valid = this.isRadioChecked(
      "cs_customs_free_tobacco",
      "input_CustomsFreeTobaccoYes",
      "input_CustomsFreeTobaccoNo"
    );

    valid = this.isRadioChecked(
      "cs_customs_free_perfume",
      "input_CustomsFreePerfumeYes",
      "input_CustomsFreePerfumeNo"
    );

    const selectedValue = this.$(
      'input[name="cs_customs_transporting_currency"]:checked'
    ).val();

    // Display a message based on the selected value
    if (selectedValue === "yes") {
      valid = this.validateMonetary();
    }

    return valid;
  }

  validateMonetary() {
    let valid = true;

    // Reset borders on all elements
    this.$(
      "#wrapMonetary .add-monetary-instrument select, .add-monetary-instrument input"
    ).css("border-color", "");

    // Flag to check if any validation failed
    let validationFailed = false;

    // Validate Select Monetary Instrument
    this.$(
      '#wrapMonetary .add-monetary-instrument select[name="select_monetary_instrument"]'
    ).each(function () {
      if (
        _swiftFV.$(this).val() === "" ||
        _swiftFV.$(this).val() === "Select Monetary Instrument"
      ) {
        _swiftFV.$(this).css("border-color", "red");
        validationFailed = true;
      }
    });

    // Validate Select Currency
    this.$(
      '#wrapMonetary .add-monetary-instrument select[name="select_monetary_currency"]'
    ).each(function () {
      if (
        _swiftFV.$(this).val() === "" ||
        _swiftFV.$(this).val() === "Select Currency"
      ) {
        _swiftFV.$(this).css("border-color", "red");
        validationFailed = true;
      }
    });

    // Validate Amount
    this.$(
      '#wrapMonetary .add-monetary-instrument input[name="number_MonetaryCurrencyAmount"]'
    ).each(function () {
      console.log(this);
      if (_swiftFV.$(this).val() === "") {
        _swiftFV.$(this).css("border-color", "red");
        validationFailed = true;
      } else {
        _swiftFV.$(this).css("border", "1px solid black !important");
      }
    });

    // If any validation failed, you can perform additional actions (e.g., show an error message)
    if (validationFailed) {
      // alert('Please fill in all required fields.');
      valid = false;
      return valid;
    }

    // Do validate all the fields
  }

  handle_emgTelephone(elem) {
    // Get the value of the input stored in 'elem' using jQuery.
    let inputValue = this.$(elem).val();

    // Check if the length of the input value is less than 9.
    if (inputValue.length < 9) {
      // Add the 'css-error' class to the current input using jQuery.
      this.$(elem).addClass("css-error");
    } else {
      // If the input value length is 9 or more, remove the 'css-error' class (optional).
      this.$(elem).removeClass("css-error");
    }
  }

  removeContact(elem) {
    const contactDetails = elem.closest(".cs-contact-details");
    // Perform further actions with the "contactDetails" element if needed.
    if (contactDetails) {
      // Remove the "contactDetails" element.
      contactDetails.remove();
    }
  }

  removeStayingAddress(elem) {
    console.log(elem);

    const tripInfoWrap = elem.closest(".tripInfoWrap");

    if (tripInfoWrap) {
      // Remove the "contactDetails" element.
      tripInfoWrap.remove();
    }
  }

  // handle_emgContact(elem){

  // }

  handle_emgContact(elem) {
    // Get the value of the input stored in 'elem'.
    let inputValue = this.$(elem).val(); // Assuming 'elem' is a jQuery element.

    // Check if the input is empty.
    if (inputValue.trim() === "") {
      // Add the 'cs-error' class to the current input.
      this.$(elem).addClass("cs-error");
    } else {
      // If the input is not empty, remove the 'cs-error' class (optional).
      this.$(elem).removeClass("cs-error");
    }
  }

  handle_btnAddContact(event) {
    let html = `
		<div class="cs-contact-details cs-emergency-contact-numbers" id="customs_select_form">
                    <div class="row">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <span>Applicant</span>
                      <span class="text-end" style="color: red; cursor: pointer;" onclick="_swiftFV.removeContact(this)" >Remove</span>
                    </div>
                        <div class="col-md-6">
                            <!-- Emergency Contact Name Input -->
                            <div class="mb-3">
                                <label for="emg_contact_name">Full Name</label>
                                <input type="text" class="form-control" onchange="_swiftFV.handle_emgContact(this)"
                                    name="emg_contact_name" placeholder="Full Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Emergency Contact Phone Number Input -->
                            <div class="mb-3">
                                <label>Date of birth</label>
                                <input type="text" onchange="_swiftFV.handle_emgTelephone(this)"
                                    class="form-control d-block datepicker" data-datepicker="true" placeholder="Date Of Birth" name="emg_contact_dob">
                            </div>
                        </div>
                    </div>

                </div>`;

    this.$("#contact_Duplicate").append(html);

    this.$("#contact_Duplicate .datepicker")
      .datepicker({
        // Set the minimum date to the current date (0)
        format: "yyyy-mm-dd", // Specify the date format as needed
        autoclose: true, // Close the datepicker when a date is selected
        keyboardNavigation: true, // Allow keyboard navigation
        // minDate: 0,
        maxDate: 0, // 0 = today; positive = days from today, negative = days before today
        startDate: new Date(),
      })
      .on("change", function (e) {
        // your logic here for datepicker change
      });

    // this.mountJqueryDatepickers();

    // set Countries Flat drop down
    // let input = this.$(
    //   '#contact_Duplicate input[name="cs_contact_info_emergency_no"]:last'
    // ).get(0);
    // window.intlTelInput(input, {});
  }

  handle_inputContactYourEmail(event) {
    let email = event.target.value;

    if (this.validateEmail(email)) {
      this.$(event.target).removeClass("cs-error");
    } else {
      this.$(event.target).addClass("cs-error");
    }
  }

  handle_inputContactYourNumber(event) {
    // console.log("handle_inputContactYourNumber ");
    // console.log(event.target);
    // console.log(event.target.value);

    let phoneNumber = event.target.value;
    if (phoneNumber.length < 9) {
      console.log("phone number is less than 9");
      console.log(event.target);
      this.$(event.target).addClass("cs-error");
    } else {
      this.$(event.target).removeClass("cs-error");
    }
  }

  validateEmail(email) {
    // Regular expression pattern for a basic email validation.
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    // Test the email against the pattern.
    return emailPattern.test(email);
  }

  handle_checkboxPageOnePassport(e) {
    if (e.target.checked) {
      _visaSwift.btn_PassportResponseContinue.disabled = false;
    } else {
      _visaSwift.btn_PassportResponseContinue.disabled = true;
    }
  }

  optionalDocs() {
    return true;
  }

  requiredDocs() {
    let valid = true;

    valid =
      valid && this.inputFileValidation("accomodationDocs", "cs-select-file");

    // only validate this field if the user is a seychelles citizen
    if (!_visaSwift._seychellesCitizen)
      valid =
        valid && this.inputFileValidation("airlineDocs", "cs-select-file");

    return valid;
  }

  handle_inputTripArrivalDate(target) {
    // console.log(target.value)
    // console.log("handle_inputTripArrivalDate is called");
    // console.log(e.target.value);

    let inputDate = new Date(target.value);

    // // Create a Date object for the current date
    // let todayDate = new Date();

    // // Compare the two dates
    // if (inputDate < todayDate) {
    // 	alert('Date is in the past');
    // 	return;
    // }

    // else if (inputDate.toDateString() === todayDate.toDateString()) {
    // 	console.log("The date is today.");
    // } else {
    // 	console.log("The date is in the future.");
    // }

    // Create a Date object from the date string

    // Get the current date
    let currentDate = new Date();

    // Create a date for tomorrow and the day after tomorrow
    let tomorrow = new Date(currentDate);
    tomorrow.setDate(currentDate.getDate() + 1);

    let dayAfterTomorrow = new Date(currentDate);
    dayAfterTomorrow.setDate(currentDate.getDate() + 2);

    // Check if the inputDate matches any of the conditions
    if (
      inputDate.toDateString() === currentDate.toDateString() ||
      inputDate.toDateString() === tomorrow.toDateString() ||
      inputDate.toDateString() === dayAfterTomorrow.toDateString()
    ) {
      // The inputDate is the current date, tomorrow, or the day after tomorrow
      // Your if statement here
      // console.log("The inputDate matches the criteria.");
      // console.log("your trip started too soon");

      this.$(this.msg_TripStartingSoon).removeClass("hidden");
    } else {
      // The inputDate is not the current date, tomorrow, or the day after tomorrow
      console.log("The inputDate does not match the criteria.");
      this.$(this.msg_TripStartingSoon).addClass("hidden");
    }
  }

  handle_selectInfoTravelPurpose(e) {
    this.$(e.target).addClass("cs-filled");
    this.$(e.target).blur();
    this.$(this.label_InfoTravelPurpose).css("display", "block");

    // e.target.style.border = "100px solid rgba(0,0,0,0.1) !important";
  }

  /**
   * Page Three Validation (Single or Mulitple)
   */
  pageThree() {
    const radioButtons = document.getElementsByName(
      "radio_single_or_group_application"
    ); // Radio Inputs
    const btn = document.getElementById("btn_PageThreeContinue"); // Continue Button

    // Initialize a variable to track whether any radio button is checked
    let isAnyChecked = false;

    // Loop through the radio buttons to check if any of them is checked
    for (let i = 0; i < radioButtons.length; i++) {
      if (radioButtons[i].checked) {
        isAnyChecked = true;
        break; // Exit the loop as soon as we find a checked radio button
      }
    }

    if (isAnyChecked == true) {
      btn.disabled = false;
    }

    // Now, you can use the "isAnyChecked" variable to determine if any radio button is checked
    return isAnyChecked;
  }

  /**
   * Page Four Validation (This is for the Country Select Page)
   */
  pageFour() {
    // Get all the required variables
    const btn = document.getElementById("btn_PageFourContinue");

    if (_visaSwift._selectedCountry == null) {
      btn.disabled = true;
    } else {
      btn.disabled = false;
    }
  }

  /**
   * SubPage One Validation (Passport Information)
   */

  one_passportResponse() {
    // 	getting all the variables
    const radio_PResponse = document.getElementById("checkbox_PageOnePassport");
    const btn_PResp = document.getElementById("btn_PassportResponseContinue");

    if (radio_PResponse.checked) {
      btn_PResp.disabled = false;
    }
  }

  contactInfo() {
    let valid = true; // Initialize the valid variable as true

    // Phone Number Input Validation
    let phoneNumber = this.$("#input_ContactYourNumber").val();
    if (phoneNumber.trim() === "" || phoneNumber.length < 9) {
      this.$("#input_ContactYourNumber").addClass("cs-error");

      valid = false;
    } else {
      this.$("#input_ContactYourNumber").removeClass("cs-error");
    }

    // Email Input Validation
    let email = this.$("#input_ContactYourEmail").val();
    if (!this.validateEmail(email)) {
      this.$("#input_ContactYourEmail").addClass("cs-error");
      valid = false;
    } else {
      this.$("#input_ContactYourEmail").removeClass("cs-error");
    }

    // Email Input Validation
    let confirmEmail = this.$("#input_ContactConfirmEmail").val();
    if (!this.validateEmail(confirmEmail)) {
      this.$("#input_ContactConfirmEmail").addClass("cs-error");
      valid = false;
    } else {
      this.$("#input_ContactConfirmEmail").removeClass("cs-error");
    }

    // validate email and confirm email
    // if email and confirm email are not matched
    if (email !== confirmEmail) {
      this.$("#input_ContactYourEmail").addClass("cs-error");
      this.$("#input_ContactConfirmEmail").addClass("cs-error");
      valid = false;
    } else {
      this.$("#input_ContactYourEmail").removeClass("cs-error");
      this.$("#input_ContactConfirmEmail").removeClass("cs-error");
    }

    // Home Address Input Validation
    // let homeAddress = this.$("#input_ContactHomeAddress").val();
    // if (homeAddress.trim() === "" || homeAddress.length < 5) {
    //   this.$("#input_ContactHomeAddress").addClass("cs-error");

    //   valid = false;
    // } else {
    //   this.$("#input_ContactHomeAddress").removeClass("cs-error");
    // }

    // Select Occupation Dropdown Validation
    // let selectedOccupation = this.$('#cs_ContactInfoOccupation option:selected').val();
    // if (selectedOccupation === '') {
    // 	this.$('#cs_ContactInfoOccupation').addClass('cs-error');
    // 	valid = false;
    // } else {
    // 	this.$('#cs_ContactInfoOccupation').removeClass('cs-error');
    // }

    // if (
    // 	this.$(
    // 		'#three_ContactInfo input.cs-error, #three_ContactInfo select.cs-error, #three_ContactInfo textarea.cs-error'
    // 	).length > 0
    // ) {
    // 	// Execute your logic here if cs-error class is found in any of the fields.
    // 	// For example, you can display an error message or perform other actions.
    // 	// console.log('One or more fields have the cs-error class.');
    // 	valid =  false;
    // }

    // valid = this.validateEmergencyContacts();

    // Display the result
    if (valid) {
      console.log("All fields are valid.");
    } else {
      console.log("Some fields are invalid.");
    }

    return valid;
  }

  validateEmergencyContacts() {
    let valid = true;

    // Iterate through each set of contact details within contact_Duplicate
    this.$(".cs-emergency-contact-numbers").each(function () {
      let nameInput = _swiftFV.$(this).find("input[name='emg_contact_name']");
      let phoneInput = _swiftFV
        .$(this)
        .find("input[name='cs_contact_info_emergency_no']");

      // Check if the name field is empty
      if (_swiftFV.$(nameInput).val() === "") {
        valid = false;
        _swiftFV.$(nameInput).addClass("cs-error");
      } else {
        _swiftFV.$(nameInput).removeClass("cs-error");
      }

      // Check if the phone number field is empty or has length less than 9
      if (
        _swiftFV.$(phoneInput).val() === "" ||
        _swiftFV.$(phoneInput).val().length < 9
      ) {
        valid = false;
        _swiftFV.$(phoneInput).addClass("cs-error");
      } else {
        _swiftFV.$(phoneInput).removeClass("cs-error");
      }
    });

    // // Display validation message
    // if (valid) {
    // 	$("#validationMessage").text("All fields are valid.");
    // } else {
    // 	$("#validationMessage").text("Some fields are invalid.");
    // }

    return valid;
  }
}

jQuery(document).ready(() => {
  window._swiftFV = new SwiftFormValidation(jQuery);
});
