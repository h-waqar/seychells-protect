 <div id="container_PageFour" class="bs-flags-container container-fluid" style="min-width: 100%;">
    <section id="page_four" class="hidden">
        <div class="cs-container">
            <div class="cs-country-select">
                <div class="popup-content p-0">
                    <!-- Content Wrapper -->
                    <h2>Country of Residence</h2>
                    <p>Please select your country of residence. This is the country where you live and pay taxes. If you
                        are a
                        resident
                        Diplomat of the Seychelles, please select Seychelles.</p>
                    <!-- Search Bar -->
                    <div class="country-select-shadow">
                        <label for="searchInput" class="cs-search-bar">
                            <i class="fa fa-search"></i>
                            <input type="text" class="remove-input-style" id="searchInput" placeholder="Search for a country">
                        </label>
                        <div class="selected-country" id="selectedCountry"></div>
                        <div class="scrollable-container">
                            <div id="popupForm">
                                <h3 class="">Countries</h3>
                                <div class="countries-list" id="countriesList"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Button Section -->
        <div class="cs-button-wrapper me-4 float-end">
            <button class="border-0 bg-transparent pr-3" id="btn_PageFourPrev">
                <span class="dashicons dashicons-arrow-left-alt2"></span>
                Previous
            </button>
            <button class="btn btn-info" id="btn_PageFourContinue" disabled>Continue</button>
        </div>
    </section>

    <!-- This is the JavaScript -->

    <script>

















        var allCountries = []; // To store all countries data

        window.addEventListener('DOMContentLoaded', () => {
            // send demo AJAX Request
            let _data = {
                action: "country_data_sy",
                name: "demo-name"
            }

            _ajaxRequest.call(_data, 'json', 'get').error((error) => {
            }).then((response) => {
                if (response.success) {
                    // Check if the response contains country data
                    allCountries = response.countries_data;

                    // Display all countries in the dropdown initially, sorted alphabetically
                    displayCountries(allCountries, '');
                } else {
                    console.error('Failed to retrieve country data.');
                }
            });
        });

        const searchInput = document.getElementById('searchInput');
        const countriesList = document.getElementById('countriesList');
        const selectedCountry = document.getElementById('selectedCountry');
        const continueButton = document.getElementById('btn_PageFourContinue');
        const prevButton = document.getElementById('btn_PageFourPrev');

        // Event listener for search input
        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.trim();
            displayCountries(allCountries, searchTerm);
        });

        // Event listener for clicking on a country in the list
        countriesList.addEventListener('click', function (event) {
            const selectedCountryDiv = event.target.closest('div[data-country-name]');
            if (selectedCountryDiv) {
                const selectedCountryName = selectedCountryDiv.getAttribute('data-country-name');
                const selectedCountryData = allCountries.find((country) => country.name.common === selectedCountryName);
                if (selectedCountryData) {
                    displaySelectedCountry(selectedCountryData);
                }
            }
        });

        // Event listener for the "Continue" button
        continueButton.addEventListener('click', function () {
            // Perform any actions you need when the "Continue" button is clicked
            // For example, you can submit the form or navigate to the next page.
        });

        // Event listener for the "Previous" button
        prevButton.addEventListener('click', function () {
            // Perform any actions you need when the "Previous" button is clicked
            // For example, you can navigate to the previous page.
        });

        // Function to display countries based on search term and sort alphabetically
        function displayCountries(countryData, searchTerm) {
            countriesList.innerHTML = '';
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
                const countryDiv = document.createElement('div');
                countryDiv.innerHTML = `
        <img src="${flagUrl}" alt="${countryName} flag" style="width: 20px; height: 15px;">
        <p>${countryName}</p>
      `;
                countryDiv.setAttribute('data-country-name', countryName);
                countriesList.appendChild(countryDiv);
            });
        }

        // Function to display a selected country
        function displaySelectedCountry(countryData) {
            selectedCountry.innerHTML = '';
            const flagUrl = countryData.flags.png;
            const countryName = countryData.name.common;
            const countryAbbr = countryData.altSpellings[0];
            const selectedCountryContent = document.createElement('div');
            selectedCountryContent.innerHTML = `
      <img src="${flagUrl}" alt="${countryName} flag" style="width: 30px; height: 20px;">
      <p>${countryName}</p>
    `;
            selectedCountry.appendChild(selectedCountryContent);

            _visaSwift._selectedCountry = countryAbbr;
            _swiftFV.pageFour();

        }
    </script>


</div>