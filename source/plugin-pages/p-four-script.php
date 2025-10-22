<script>
    // window.addEventListener('DOMContentLoaded', () => {


      jQuery(document).ready(() => {
        const _visaSwift = new VisaSwift(jQuery);
        // send demo ajax Request
        let _data = {
          action: "country_data_sy",
          name: "demo-name"
        }

        _ajaxRequest.call(_data, 'json', 'get').error((error) => {
          console.log(error);
        }).then((response) => {
          console.log(response.success);
        });


      });

    // });







    const searchInput = document.getElementById('searchInput');
    const countriesList = document.getElementById('countriesList');
    var allCountries = []; // To store all countries data

    // Fetch and store all countries data when the page loads
    window.addEventListener('DOMContentLoaded', async () => {
      // Load the local countries.json file





      console.log("working");













      // Need Help 
      // fetch('json/countries.json')
      //   .then((response) => response.json())
      //   .then((data) => {
      //     allCountries = data;
      //     // Display all countries in the dropdown initially
      //     displayCountries('');
      //   })
      //   .catch((error) => {
      //     console.error('Error loading countries.json:', error);
      //   });
    });

    // Event listener for search input
    searchInput.addEventListener('input', () => {
      const searchTerm = searchInput.value.trim();
      displayCountries(searchTerm);
    });

    // Event listener for clicking on a country in the list
    countriesList.addEventListener('click', function(event) {
      const selectedCountryDiv = event.target.closest('div[data-country-name]');
      if (selectedCountryDiv) {
        const selectedCountryName = selectedCountryDiv.getAttribute('data-country-name');
        const selectedCountry = allCountries.find((country) => country.name.common === selectedCountryName);
        if (selectedCountry) {
          displaySelectedCountry(selectedCountry);
        }
      }
    });

    // Function to display countries based on search term
    function displayCountries(searchTerm) {
      countriesList.innerHTML = '';
      const filteredCountries = allCountries.filter((country) => {
        const countryName = country.name.common.toLowerCase();
        return countryName.includes(searchTerm.toLowerCase());
      });
      filteredCountries.forEach((country) => {
        const flagUrl = country.flags.png;
        const countryName = country.name.common;
        const countryDiv = document.createElement('div');
        countryDiv.innerHTML = `
      <img src="${flagUrl}" alt="${countryName} flag" style="width: 20px; height: 15px;">
      <h4>${countryName}</h4>
    `;
        // countryDiv = document.createElement('hr');
        countryDiv.setAttribute('data-country-name', countryName);
        countriesList.appendChild(countryDiv);
      });
    }

    // Function to display a selected country
    function displaySelectedCountry(countryData) {
      const selectedCountry = document.getElementById('selectedCountry');
      selectedCountry.innerHTML = '';
      const flagUrl = countryData.flags.png;
      const countryName = countryData.name.common;

      const selectedCountryContent = document.createElement('div');
      selectedCountryContent.innerHTML = `
    <img src="${flagUrl}" alt="${countryName} flag" style="width: 30px; height: 20px;">
    <h3>${countryName}</h3>
  `;
      selectedCountry.appendChild(selectedCountryContent);
    }
  </script>