<!-- Trip Information -->
<section id="four_TripInfo" class="four-trip-info hidden">

    <div class="cs-container">
        <!-- Arrival Details -->
        <div class="cs-arrival-details mb-5">

            <div class="bs-heading mb-4">
                <h1>Trip Information</h1>
                <p>
                    Please provide a photo or scan of the biographic data page of your passport.
                    This is the page featuring your photo, name, etc.
                </p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 arrival-details">
                        <label for="input_TripArrivalDetails" class="form-label">Arrival Details</label>
                        <input type="text" class="form-control datepicker" placeholder="Arrival Details"
                            id="input_TripArrivalDate" name="input_TripArrivalDetails" readonly>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-2 return-details">
                        <label for="date_TripReturnDetails" class="form-label">Departure Details</label>
                        <input type="text" class="form-control datepicker" placeholder="Departure Details"
                            name="date_TripReturnDetails" id="date_TripReturn" readonly>
                    </div>
                </div>
            </div>

            <div class="mb-2 return-details">
                <label for="address_in_seychelles" class="form-label">Address in Seychelles</label>
                <input type="text" class="form-control" placeholder="Address in Seychelles" name="address_in_seychelles"
                    id="address_in_seychelles" style="background: transparent !important;">
            </div>

            <!-- Prev/Next (<_>) Button Wrapper -->

            <div class="cs-button-wrapper">
                <button type="button" class="prev pr-3" id="btn_TripInfoPrev">
                    <span class="dashicons dashicons-arrow-left-alt2"></span>
                    Previous
                </button>
                <button type="button" class="btn btn-info" id="btn_TripInfoContinue">Continue</button>
            </div>


</section>



<?php


// <script>
//     jQuery(document).ready(function ($) {

//         //--------------------> jQuery Date picker

//         // // This is staying FROM
//         // $('#date_TripInfoStayingFrom').datepicker({
//         //     // Set the minimum date to the current date (0)
//         //     format: 'yyyy-mm-dd', // Specify the date format as needed
//         //     autoclose: true, // Close the datepicker when a date is selected
//         //     keyboardNavigation: true, // Allow keyboard navigation
//         //     minDate: 0,
//         //     startDate: new Date()
//         // });

//         // // This is staying To
//         // $('#date_TripInfoStayingTo').datepicker({
//         //     // Set the minimum date to the current date (0)
//         //     format: 'yyyy-mm-dd', // Specify the date format as needed
//         //     autoclose: true, // Close the datepicker when a date is selected
//         //     keyboardNavigation: true, // Allow keyboard navigation
//         //     minDate: 0,
//         //     startDate: new Date()
//         // });


//         // // This is staying TO
//         // $('#date_TripReturn').datepicker({
//         //     // Set the minimum date to the current date (0)
//         //     format: 'yyyy-mm-dd', // Specify the date format as needed
//         //     autoclose: true, // Close the datepicker when a date is selected
//         //     keyboardNavigation: true, // Allow keyboard navigation
//         //     minDate: 0,
//         //     startDate: new Date()
//         // });

//         // $('#').datepicker({
//         //     format: 'yyyy-mm-dd', // Specify the date format as needed
//         //     autoclose: true, // Close the datepicker when a date is selected
//         //     keyboardNavigation: true, // Allow keyboard navigation
//         // }).on('show', function(e) {
//         //     // Get the current date
//         //     var currentDate = new Date();
//         //     // Set the datepicker's default date to the current day
//         //     $(this).datepicker('update', currentDate);
//         // });


//         //---------------------> This is the Airlines Object
//         const airlines = [{
//             id: 1,
//             name: "Aeroflot",
//             flights: ['244']
//         },
//         {
//             id: 2,
//             name: "Air Austral",
//             flights: ['421']
//         },
//         {
//             id: 3,
//             name: "Air France",
//             flights: ['246', '254']
//         },
//         {
//             id: 4,
//             name: "Air Seychelles",
//             flights: ['021', '048', '060', '062', '075', '077', '123', '151', '261', '263', '1015', '1021', '1023', '1025', '1042', '1068', '1124', '9021', '9022', '9023', '9045', '9047', '9048', '9049', '9268', '9325', '9326']
//         },
//         {
//             id: 5,
//             name: "Arkia",
//             flights: ['611', '631']
//         },
//         {
//             id: 6,
//             name: "Bulgaria Air",
//             flights: ['7075']
//         },
//         {
//             id: 7,
//             name: "Condor",
//             flights: ['2302']
//         },
//         {
//             id: 8,
//             name: "Edelweiss",
//             flights: ['74', '78']
//         },
//         {
//             id: 9,
//             name: "EI AI",
//             flights: ['55']
//         },
//         {
//             id: 10,
//             name: "Emirates",
//             flights: ['705', '707']
//         },
//         {
//             id: 11,
//             name: "Ethiopian",
//             flights: ['879']
//         },
//         {
//             id: 12,
//             name: "Etihad",
//             flights: ['622']
//         },
//         {
//             id: 13,
//             name: "Flynas",
//             flights: ['639']
//         },
//         {
//             id: 14,
//             name: "IndiGo",
//             flights: ['8554']
//         },
//         {
//             id: 15,
//             name: "Kenya Airways",
//             flights: ['250', '258']
//         },
//         {
//             id: 16,
//             name: "Private jet",
//             flights: []
//         },
//         {
//             id: 17,
//             name: "Qatar",
//             flights: ['678']
//         },
//         {
//             id: 18,
//             name: "Spice Jet",
//             flights: ['9909']
//         },
//         {
//             id: 19,
//             name: "Sri Lankan Airlines",
//             flights: ['707']
//         },
//         {
//             id: 20,
//             name: "Swiss International Airline",
//             flights: ['8078']
//         },
//         {
//             id: 21,
//             name: "Turkish",
//             flights: ['748']
//         },
//         {
//             id: 22,
//             name: "Ukraine International Airlines",
//             flights: ['7315']
//         },
//             // Add more airlines and their flights here if needed
//         ];

//         //--------------------> This is the code for generating Select-Airlines 
//         const frequentAirlinesIds = [4, 12, 10, 17, 21]; // IDs of the frequent airlines
//         const allOptions = $('#allOptions');
//         const frequentOptions = $('#frequentOptions');

//         // Add frequent options to the "Frequently Selected" group
//         frequentAirlinesIds.forEach(function (airlineId) {
//             const airline = airlines.find(function (a) {
//                 return a.id === airlineId;
//             });

//             if (airline) {
//                 const option = $('<option></option>');
//                 option.val(airline.id);
//                 option.html("<span>" + airline.name + "</span>");
//                 frequentOptions.append(option);
//             }
//         });

//         // Add all airlines to the "All Airlines" group
//         airlines.forEach(function (airline) {
//             const option = $('<option></option>');
//             option.val(airline.id);
//             option.text(airline.name);
//             allOptions.append(option);
//         });

//         // Move "Private Jet" to the "All Airlines" group
//         $('#frequentOptions option[value="16"]').appendTo(allOptions); // Assuming the ID of "Private Jet" is 16

//         // Function to update the "Select Flight #" dropdown based on the selected airline
//         function updateFlightOptions(selectedAirlineId) {
//             const selectedAirline = airlines.find(function (airline) {
//                 return airline.id === parseInt(selectedAirlineId);
//             });

//             if (selectedAirline) {
//                 const flightSelect = $('#flightSelect');
//                 flightSelect.empty(); // Clear existing options

//                 // Add the "Flight #" options for the selected airline
//                 selectedAirline.flights.forEach(function (flight) {
//                     const option = $('<option></option>');
//                     option.val(flight);
//                     option.text('Flight #' + flight);
//                     flightSelect.append(option);
//                 });
//             } else {
//                 // If the selected airline is not found, clear the "Select Flight #" dropdown
//                 $('#flightSelect').empty();
//             }
//         }

//         // Event handler for when the "Select Airline" dropdown value changes
//         $('#airlineSelect').change(function () {
//             const selectedAirlineId = $(this).val();

//             //  Fabricated
//             const select_ArrivalFlight = $("select[name='cs_trip_info_select_flight']");
//             const text_ArrivalFlight = $("input[name='text_ArrivalPrivateFlightNo']");

//             // confusing
//             if (selectedAirlineId == 16) {

//                 // Switch The ID to which one is not hidden
//                 select_ArrivalFlight.attr("id", "flightSelect_hidden");
//                 text_ArrivalFlight.attr("id", "flightSelect");

//                 // Choose which one is hidden and which one is not
//                 select_ArrivalFlight.addClass("hidden");
//                 text_ArrivalFlight.removeClass("hidden");

//                 console.log('Senbonzakura --> 1');

//             } else {
//                 // Switch The ID to which one is not hidden
//                 select_ArrivalFlight.attr("id", "flightSelect");
//                 text_ArrivalFlight.attr("id", "flightSelect_hidden");

//                 // Choose which one is hidden and which one is not
//                 select_ArrivalFlight.removeClass("hidden");
//                 text_ArrivalFlight.addClass("hidden");

//                 console.log('Kageyoshi --> 1');
//             }

//             updateFlightOptions(selectedAirlineId);
//         });

//         // Initialize the "Select Flight #" dropdown when the page loads
//         updateFlightOptions($('#airlineSelect').val());


//         // -_-_-_-_-_-_-_-_-_-_  This is for the RETURN/DEPARTURE if known :D


//         jQuery(document).ready(function ($) {


//             //---------------------> This is the Return Airlines Object
//             const returnAirlines = airlines;

//             //--------------------> This is the code for generating Select-Return-Airlines 
//             const returnFrequentAirlinesIds = [4, 12, 10, 17, 21]; // IDs of the frequent return airlines
//             const returnAllOptions = $('#return_allOptions');
//             const returnFrequentOptions = $('#return_frequentOptions');

//             // Add frequent options to the "Frequently Selected" group for return airlines
//             returnFrequentAirlinesIds.forEach(function (airlineId) {
//                 const airline = returnAirlines.find(function (a) {
//                     return a.id === airlineId;
//                 });

//                 if (airline) {
//                     const option = $('<option></option>');
//                     option.val(airline.id);
//                     option.text(airline.name);
//                     returnFrequentOptions.append(option);
//                 }
//             });

//             // Add all return airlines to the "All Airlines" group
//             returnAirlines.forEach(function (airline) {
//                 const option = $('<option></option>');
//                 option.val(airline.id);
//                 option.text(airline.name);
//                 returnAllOptions.append(option);
//             });

//             // Function to update the "Select Return Flight #" dropdown based on the selected return airline
//             function updateReturnFlightOptions(selectedReturnAirlineId) {
//                 const selectedReturnAirline = returnAirlines.find(function (airline) {
//                     return airline.id === parseInt(selectedReturnAirlineId);
//                 });

//                 if (selectedReturnAirline) {
//                     const returnFlightSelect = $('#return_flightSelect');
//                     returnFlightSelect.empty(); // Clear existing options

//                     // Add the "Return Flight #" options for the selected return airline
//                     selectedReturnAirline.flights.forEach(function (flight) {
//                         const option = $('<option></option>');
//                         option.val(flight);
//                         option.text('Return Flight #' + flight);
//                         returnFlightSelect.append(option);
//                     });
//                 } else {
//                     // If the selected return airline is not found, clear the "Select Return Flight #" dropdown
//                     $('#return_flightSelect').empty();
//                 }
//             }

//             // Event handler for when the "Select Return Airline" dropdown value changes
//             $('#return_airlineSelect').change(function () {
//                 const selectedReturnAirlineId = $(this).val();
//                 updateReturnFlightOptions(selectedReturnAirlineId);

//                 // fabricated
//                 const select_DepartureFlight = $('select[name="cs_trip_info_select_return_flight"]');
//                 const text_DepartureFlight = $("input[name='text_DeparturePrivateFlightNo']");

//                 // confusing
//                 if (selectedReturnAirlineId == 16) {

//                     // Switch The ID to which one is not hidden
//                     select_DepartureFlight.attr("id", "return_flightSelect_hidden");
//                     text_DepartureFlight.attr("id", "return_flightSelect");

//                     // Choose which one is hidden and which one is not
//                     select_DepartureFlight.addClass("hidden");
//                     text_DepartureFlight.removeClass("hidden");
//                 } else {
//                     // Switch The ID to which one is not hidden
//                     select_DepartureFlight.attr("id", "return_flightSelect");
//                     text_DepartureFlight.attr("id", "return_flightSelect_hidden");

//                     // Choose which one is hidden and which one is not
//                     select_DepartureFlight.removeClass("hidden");
//                     text_DepartureFlight.addClass("hidden");

//                     // Initialize the "Select Return Flight #" dropdown when the page loads
//                     updateReturnFlightOptions($('#return_airlineSelect').val());
//                 }
//             });

//         });

//     });
// </script>