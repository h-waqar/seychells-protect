var allCountries = []; // To store all countries data

class swiftCountrySelect {
  // javascript global object
  $ = null;
  element = null;
  single = null;
  number = null;
  searchInput = null;
  countriesList = null;
  selectedCountry = null;
  csCountryContainer = null;

  constructor($, element, single = true, number) {
    // init Jquery

    this.$ = $;
    this.element = element;
    this.single = single;
    this.number = number;
    this.csCountryContainer = this.$("#" + this.element).find(
      ".cs-country-container"
    );

    this.addHTML();
    // this.init();

    this.$("#multiCountryWrap" + this.number).on(
      "click",
      ".deselect_country",
      this.deselect_country.bind(this)
    );
  }

  deselect_country(e) {
    let country = e.target.getAttribute("data-country");
    // Find the selected country div with the matching data-country attribute
    var selectedCountryDiv = this.$(
      '.sel_country [data-country="' + country + '"]'
    );
    this.$(selectedCountryDiv).closest(".sel_country").remove();
    this.removeCountry(_swiftStorage._documentNumber, country);
  }

  removeCountry(documentNumber, countryName) {
    // Check if the document number exists in the passports object
    if (
      _swiftStorage.passports[documentNumber] &&
      _swiftStorage.passports[documentNumber].health_countries
    ) {
      const healthCountries =
        _swiftStorage.passports[documentNumber].health_countries;
      // Find the index of the country name in the array
      const index = healthCountries.indexOf(countryName);
      // If found, remove the country from the array
      if (index !== -1) {
        healthCountries.splice(index, 1);
        console.log(`Removed ${countryName} from ${documentNumber}`);
      } else {
        console.log(`${countryName} not found in ${documentNumber}`);
      }
    } else {
      console.log(`Document number ${documentNumber} not found`);
    }
  }

  isCountryExists(countryName, parentId) {
    let valid = false;
    // Find the div with the provided country name and remove it
    this.$("#" + parentId + " .sel_country").each(function () {
      var $countryElement;
      if (_visaSwift._applicationSingle) $countryElement = _swiftCS.$(this);
      else $countryElement = _swiftGroupCS.$(this);

      var dataCountry = $countryElement
        .find("i.deselect_country")
        .data("country");

      if (dataCountry === countryName) {
        valid = true; // To exit the loop once the div is removed
      }
    });

    return valid;
  }

  addHTML() {
    let html = `
        <div class="cs-country-select">
        <div class="popup-content px-0">
            <p>List any country you have or will be travelling to in the 14 days prior to arrival in Seychelles.</p>
            <!-- Search Bar -->
            <label for="searchInput${this.number}" class="cs-search-bar">
                <i class="fa fa-search"></i>
                <input type="text" class="remove-input-style" id="searchInput${this.number}" placeholder="Search for a country">
            </label>
            <div class="selected-country" id="selectedCountry${this.number}"></div>
            <div class="scrollable-container">
                <div id="popupForm${this.number}">
                    <h3 class="">Countries</h3>
                    <div class="countries-list" id="countriesList${this.number}"></div>
                </div>
            </div>
            <hr>
        </div>

    </div>

        `;
    this.$(this.csCountryContainer).append(html);
  }

  // Function to display countries based on search term and sort alphabetically
  displayCountries(countryData, searchTerm) {
    this.$(this.countriesList).html("");
    const filteredCountries = countryData.filter((country) => {
      const countryName = country.name.common.toLowerCase();
      return countryName.includes(searchTerm.toLowerCase());
    });

    // Sort the filtered countries alphabetically by country name
    filteredCountries.sort((a, b) => {
      const nameA = a.name.common.toLowerCase();
      const nameB = b.name.common.toLowerCase();
      if (nameA < nameB) return -1;
      if (nameA > nameB) return 1;
      return 0;
    });

    filteredCountries.forEach((country) => {
      const flagUrl = country.flags.png;
      const countryName = country.name.common;
      const countryDiv = document.createElement("div");
      countryDiv.innerHTML = `
    <img src="${flagUrl}" alt="${countryName} flag" style="width: 20px; height: 15px;">
    <p>${countryName}</p>
  `;

      countryDiv.setAttribute("data-country-name", countryName);

      // this.countriesList was null so i write temporary solution for this
      if (_visaSwift._applicationSingle)
        this.$(this.countriesList).append(countryDiv);
      else this.$("#countriesList2").append(countryDiv);
    });
  }

  init() {
    if (allCountries.length == 0) {
      // send demo AJAX Request
      let _data = {
        action: "country_data_sy",
        name: "demo-name",
      };

      _ajaxRequest
        .call(_data, "json", "get")
        .error((error) => {})
        .then((response) => {
          if (response.success) {
            // Check if the response contains country data
            allCountries = response.countries_data;

            // Display all countries in the dropdown initially, sorted alphabetically
            this.displayCountries(allCountries, "");
          } else {
            console.error("Failed to retrieve country data.");
          }
        });
    } else {
      this.displayCountries(allCountries, "");
    }

    this.searchInput = this.$(this.csCountryContainer).find(
      "#searchInput" + this.number
    );
    this.countriesList = this.$(this.csCountryContainer).find(
      "#countriesList" + this.number
    );
    this.selectedCountry = this.$(this.csCountryContainer).find(
      "#selectedCountry" + this.number
    );

    // Event listener for search input
    this.$(this.searchInput).on("input", () => {
      let searchTerm;
      if (_visaSwift._applicationSingle)
        // For Single Application
        searchTerm = _swiftCS.$(_swiftCS.searchInput).val().trim();
      // For Double Application
      else searchTerm = _swiftGroupCS.$(_swiftGroupCS.searchInput).val().trim();

      this.displayCountries(allCountries, searchTerm);
    });

    // Event listener for clicking on a country in the list
    this.$(this.countriesList).on("click", function (event) {
      const selectedCountryDiv = event.target.closest("div[data-country-name]");

      console.log(selectedCountryDiv);
      if (selectedCountryDiv) {
        const selectedCountryName =
          selectedCountryDiv.getAttribute("data-country-name");
        const selectedCountryData = allCountries.find(
          (country) => country.name.common === selectedCountryName
        );
        if (selectedCountryData) {
          if (_visaSwift._applicationSingle)
            _swiftCS.displaySelectedCountry(selectedCountryData);
          else _swiftGroupCS.displaySelectedCountry(selectedCountryData);
        }
      }
    });

    // // Event listener for the "Continue" button
    // continueButton.addEventListener('click', function () {
    //     // Perform any actions you need when the "Continue" button is clicked,
    //     // For example, you can submit the form or navigate to the next page.
    // });

    // // Event listener for the "Previous" button
    // prevButton.addEventListener('click', function () {
    //     // Perform any actions you need when the "Previous" button is clicked,
    //     // For example, you can navigate to the previous page.
    // });
  }

  // Function to display a selected country
  displaySelectedCountry(countryData) {
    console.log("countryData");
    console.log(countryData);

    this.selectedCountry.innerHTML = "";
    const flagUrl = countryData.flags.png;
    const countryName = countryData.name.common;
    const countryAbbr = countryData.altSpellings[0];

    // if the country already exists then just stop and dont move on
    if (!this.isCountryExists(countryName, "selectedCountry" + this.number)) {
      const selectedCountryContent = document.createElement("div");
      selectedCountryContent.classList.add("sel_country");

      selectedCountryContent.innerHTML = `
                                    <img src="${flagUrl}" alt="${countryName} flag" style="width: 30px; height: 20px;">
                                        <p>${countryName}</p>
                                    <i class="fa fa-times deselect_country" data-country="${countryName}" aria-hidden="true"></i>
                                    `;

      this.$(this.selectedCountry).append(selectedCountryContent);
      this.healthCountries(flagUrl, countryName, _swiftStorage._documentNumber);
    }
  }

  healthCountries(flagUrl, countryName, documentNumber) {
    // Check if the document number already exists
    if (!_swiftStorage.passports[documentNumber]) {
      _swiftStorage.passports[documentNumber] = {};
    }

    // Create an array for the health_countries
    if (!_swiftStorage.passports[documentNumber].health_countries) {
      _swiftStorage.passports[documentNumber].health_countries = [];
    }

    if (!_swiftStorage.passports[documentNumber].health_flag_countries) {
      _swiftStorage.passports[documentNumber].health_flag_countries = [];
    }

    _swiftStorage.passports[documentNumber].health_countries.push(countryName);

    let flag = {
      country: countryName,
      flag: flagUrl,
    };

    _swiftStorage.passports[documentNumber].health_flag_countries.push(flag);
  }
}

jQuery(document).ready(() => {
  //unitTesting
  window._swiftCS = new swiftCountrySelect(
    jQuery,
    "five_HealthDeclaration",
    false,
    1
  );
});
