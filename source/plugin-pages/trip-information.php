<!-- Trip Information -->
<section id="four_TripInfo" class="four-trip-info ">

    <div class="cs-container">
        <!-- Purpose of travel dropdown -->
        <div class="mb-3 purpose-of-travel citizen-view">
            <select name="cs_trip_info_travel_purpose" id="select_InfoTravelPurpose" class="form-select">
                <option value="" class="d-none">Purpose of travel</option>
                <optgroup label="Pleasure">
                    <option value="Holiday">Holiday</option>
                    <option value="Honeymoon">Honeymoon</option>
                    <option value="Friends & Family">Friends & Family</option>
                    <option value="Getting Married">Getting Married</option>
                </optgroup>
                <optgroup label="Work">
                    <option value="Business">Business</option>
                    <option value="Diplomat on Official Visit">Diplomat on Official Visit</option>
                    <option value="Work (Long Term) GOP">Work (Long Term) GOP</option>
                    <option value="Work (Short Term) GOP">Work (Short Term) GOP</option>
                    <option value="Personal Helper">Personal Helper</option>
                    <option value="Seaman (Fishing Vessel)">Seaman (Fishing Vessel)</option>
                </optgroup>
                <optgroup label="Other">
                    <option value="Crew (planes or ships)">Crew (planes or ships)</option>
                    <option value="Transit">Transit</option>
                </optgroup>
            </select>
        </div>


        <!-- Arrival Details -->
        <div class="cs-arrival-details mb-5">
            <h4 class="mt-3">Arrival Details</h4>

            <div class="mb-3 arrival-details">
                <input type="text" class="form-control datepicker" placeholder="Arrival Date" id="input_TripArrivalDate"
                    name="input_TripArrivalDetails" readonly>

                <p>Your expected arrival date in the Seychelles.</p>
            </div>

            <div class="alert alert-warning hidden" id="msg_TripStartingSoon" role="alert">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                <p>
                    Your trip <strong>starts very soon!</strong> Guarantee your Travel Authorisation is approved
                    before you travel by selecting one of our faster processing options.
                </p>
            </div>

            <!-- Your Ride -->

            <div class="d-flex hidden">


                <!-- Select Airline -->
                <div class="mb-2 w-75">
                    <select name="cs_trip_info_select_airline" id="airlineSelect" class="form-select">
                        <option value="" class="d-none">Select Airline</option>

                        <optgroup label="Frequently Selected" id="frequentOptions"></optgroup>
                        <optgroup label="All Airlines" id="allOptions"></optgroup>
                    </select>

                    <p class="m-0">
                        Provide information on your flight to the Seychelles.
                    </p>

                </div>

                <!-- Select Flight # -->
                <div class="w-25 ms-2">



                    <select name="cs_trip_info_select_flight" id="flightSelect" class="form-select">
                        <option value="" class="d-none">Flight #</option>
                    </select>

                    <input type="text" name="text_ArrivalPrivateFlightNo" class="form-control hidden"
                        id="flightSelect_hidden" placeholder="Enter Your Flight#" style="padding: 0.6rem;">

                </div>

            </div>

            <div class="mb-2">
                <select name="cs_trip_info_select_country_start" id="select_TripStartCountry" class="form-select">

                    <option value="" class="">Select the country of origin for your trip</option>

                    <!-- Country List -->

                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Åland Islands">Åland Islands</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antarctica">Antarctica</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Bouvet Island">Bouvet Island</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The
                    </option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Territories">French Southern Territories</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guernsey">Guernsey</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-bissau">Guinea-bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jersey">Jersey</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
                    </option>
                    <option value="Korea, Republic of">Korea, Republic of</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macao">Macao</option>
                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav
                        Republic of
                    </option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Pitcairn">Pitcairn</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russian Federation">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Helena">Saint Helena</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                        Sandwich Islands
                    </option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Timor-leste">Timor-leste</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                    </option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Viet Nam">Viet Nam</option>
                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                    <option value="Western Sahara">Western Sahara</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>

                </select>

                <p class="m-0">
                    Please select the country where your trip will start.
                </p>

            </div>
        </div>

        <span class="citizen-view">
            <div class="cs-departure-details mb-4">
                <h4 class="mt-3">Departure Details</h4>

                <!-- Departure / Return Details -->
                <div class="mb-2 return-details">
                    <input type="text" class="form-control datepicker" placeholder="Departure Date"
                        name="date_TripReturnDetails" id="date_TripReturn" readonly>
                    <p class="m-0">Your expected departure date from the Seychelles.</p>
                </div>

                <!----| Your Return Ride |-->

                <div class="d-flex hidden">

                    <!-- Select Return Airline -->
                    <div class="mb-2  w-75">
                        <select name="cs_trip_info_select_return_airline" id="return_airlineSelect" class="form-select">
                            <option value="" class="d-none">Select Airline</option>

                            <optgroup label="Frequently Selected" id="return_frequentOptions"></optgroup>
                            <optgroup label="All Airlines" id="return_allOptions"></optgroup>
                        </select>

                        <p class="m-0">
                            If you know your flight information, please input here otherwise leave blank.
                        </p>

                    </div>

                    <!-- Select Return Flight # -->
                    <div class="mb-2  w-25 ms-2">


                        <select name="cs_trip_info_select_return_flight" id="return_flightSelect" class="form-select">
                            <option value="" class="d-none">Flight #</option>
                        </select>

                        <input type="text" name="text_DeparturePrivateFlightNo" class="form-control hidden"
                            id="return_flightSelect_hidden" placeholder="Enter Your Flight#" style="padding: 0.6rem;">

                    </div>

                </div>


                <div class="mb-2">
                    <select name="cs_trip_info_select_country_end" id="select_TripEndCountry" class="form-select">

                        <option value="" class="d-none">Final Destination Country</option>

                        <!-- Countries -->

                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The
                        </option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
                        </option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav
                            Republic of
                        </option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                            Sandwich Islands
                        </option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                        </option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>

                    </select>

                    <p class="m-0">
                        Please select the country where your trip will start.
                    </p>

                </div>

            </div>


            <!-- Persons Information -->
            <div class="cs-persons-info mb-5">
                <h4 class="mt-3">Persons Information</h4>

                <!-- Number of Persons -->
                <div class="mb-3 persons-count">
                    <input type="number" class="form-control" placeholder="Number of Persons" id="input_NumberOfPersons"
                        name="cs_persons_info_number_of_persons" min="1">
                </div>

                <!-- Number of Children -->
                <div class="mb-1 children-count">
                    <input type="number" class="form-control" placeholder="Number of Children (Under 12)"
                        id="input_NumberOfChildren" name="cs_persons_info_number_of_children" min="0">

                </div>
                <p style="color: rgba(0,0,0,0.4);
  font-size: 14px;
  margin-top: 5px;">Children must be under 12 years of age. If older, include them in the number of persons instead.
                </p>
            </div>








            <!-- Country Select -->

            <div class="cs-where-staying" id="tripInfoWrap">
                <h4>Where are you staying?</h4>
                <p>
                    Type in the name of the hotel/guesthouse, boat charter company or employer's name for seaman and
                    workers.
                    You must provide booking confirmations for each accommodation you are staying in.
                </p>


                <div class="tripInfoWrap">

                    <div class="cs-address-where-staying">

                        <h5>
                            Address in Seychelles
                            <!-- <span onclick="_swiftFV.removeStayingAddress(this)">
                            <i class="fa fa-trash"></i>
                            remove
                        </span> -->
                        </h5>

                        <div class="mb-2 address-in-seychelles demo">
                            <label class="cs-form-outline d-flex" for="text_TripInfoAddress">
                                <div>
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                                <div class="w-100">
                                    <input type="text" class="remove-input-style trip_address"
                                        name="cs_trip_info_address"
                                        placeholder="Where are you staying in the Seychelles?">


                                </div>
                            </label>

                            <!-- <div class="cs-hotel-autocomplete"> -->
                            <!-- <p class="cs-suggested-hotel">Do you belong here?</p>
                                    <p class="cs-suggested-hotel">Get out?</p>
                                    <p class="cs-suggested-hotel">Go watch POGO?</p> -->
                            <!-- </div> -->
                        </div>


                        <div class="row mb-2 trip-from-to">

                            <!-- Date Staying FROM -->
                            <div class="col-md-6">
                                <div class="p-0 mb-2 cs-form-outline">
                                    <label class="p-3 d-block m-0 d-flex" for="date_TripInfoStayingFrom1">
                                        <i class="fa fa-calendar-o m-0" aria-hidden="true"></i>
                                    </label>
                                    <div class="w-100 overflow-hidden">
                                        <input type="text" class="datepicker-field remove-input-style ms-3"
                                            name="cs_trip_info_date_from" placeholder="From Date"
                                            id="date_TripInfoStayingFrom1" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Date Staying TO -->
                            <div class="col-md-6">
                                <div class="p-0 mb-2 cs-form-outline">
                                    <label class="p-3 d-block m-0 d-flex" for="date_TripInfoStayingTo1">
                                        <i class="fa fa-calendar-o m-0" aria-hidden="true"></i>
                                    </label>
                                    <div class="w-100 overflow-hidden">
                                        <input type="text" class="datepicker-field remove-input-style ms-3 w-100"
                                            name="cs_trip_info_date_to" placeholder="To Date"
                                            id="date_TripInfoStayingTo1" readonly>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>

            </div>

            <span id="btn_AddStayingAddress" class="btn_add-staying-address mt-3">
                <i class="fa fa-plus">
                </i>Add Contact
            </span>
        </span>

    </div>


    <!-- Prev/Next (<_>) Button Wrapper -->

    <div class="cs-button-wrapper">
        <button type="button" class="border-0 bg-transparent pr-3" id="btn_TripInfoPrev">
            <span class="dashicons dashicons-arrow-left-alt2"></span>
            Previous
        </button>
        <button type="button" class="btn btn-info" id="btn_TripInfoContinue">Continue</button>
    </div>


</section>


<script>
    jQuery(document).ready(function ($) {

        //--------------------> jQuery Date picker

        // // This is staying FROM
        // $('#date_TripInfoStayingFrom').datepicker({
        //     // Set the minimum date to the current date (0)
        //     format: 'yyyy-mm-dd', // Specify the date format as needed
        //     autoclose: true, // Close the datepicker when a date is selected
        //     keyboardNavigation: true, // Allow keyboard navigation
        //     minDate: 0,
        //     startDate: new Date()
        // });

        // // This is staying To
        // $('#date_TripInfoStayingTo').datepicker({
        //     // Set the minimum date to the current date (0)
        //     format: 'yyyy-mm-dd', // Specify the date format as needed
        //     autoclose: true, // Close the datepicker when a date is selected
        //     keyboardNavigation: true, // Allow keyboard navigation
        //     minDate: 0,
        //     startDate: new Date()
        // });


        // // This is staying TO
        // $('#date_TripReturn').datepicker({
        //     // Set the minimum date to the current date (0)
        //     format: 'yyyy-mm-dd', // Specify the date format as needed
        //     autoclose: true, // Close the datepicker when a date is selected
        //     keyboardNavigation: true, // Allow keyboard navigation
        //     minDate: 0,
        //     startDate: new Date()
        // });

        // $('#').datepicker({
        //     format: 'yyyy-mm-dd', // Specify the date format as needed
        //     autoclose: true, // Close the datepicker when a date is selected
        //     keyboardNavigation: true, // Allow keyboard navigation
        // }).on('show', function(e) {
        //     // Get the current date
        //     var currentDate = new Date();
        //     // Set the datepicker's default date to the current day
        //     $(this).datepicker('update', currentDate);
        // });


        //---------------------> This is the Airlines Object
        const airlines = [{
            id: 1,
            name: "Aeroflot",
            flights: ['244']
        },
        {
            id: 2,
            name: "Air Austral",
            flights: ['421']
        },
        {
            id: 3,
            name: "Air France",
            flights: ['246', '254']
        },
        {
            id: 4,
            name: "Air Seychelles",
            flights: ['021', '048', '060', '062', '075', '077', '123', '151', '261', '263', '1015', '1021', '1023', '1025', '1042', '1068', '1124', '9021', '9022', '9023', '9045', '9047', '9048', '9049', '9268', '9325', '9326']
        },
        {
            id: 5,
            name: "Arkia",
            flights: ['611', '631']
        },
        {
            id: 6,
            name: "Bulgaria Air",
            flights: ['7075']
        },
        {
            id: 7,
            name: "Condor",
            flights: ['2302']
        },
        {
            id: 8,
            name: "Edelweiss",
            flights: ['74', '78']
        },
        {
            id: 9,
            name: "EI AI",
            flights: ['55']
        },
        {
            id: 10,
            name: "Emirates",
            flights: ['705', '707']
        },
        {
            id: 11,
            name: "Ethiopian",
            flights: ['879']
        },
        {
            id: 12,
            name: "Etihad",
            flights: ['622']
        },
        {
            id: 13,
            name: "Flynas",
            flights: ['639']
        },
        {
            id: 14,
            name: "IndiGo",
            flights: ['8554']
        },
        {
            id: 15,
            name: "Kenya Airways",
            flights: ['250', '258']
        },
        {
            id: 16,
            name: "Private jet",
            flights: []
        },
        {
            id: 17,
            name: "Qatar",
            flights: ['678']
        },
        {
            id: 18,
            name: "Spice Jet",
            flights: ['9909']
        },
        {
            id: 19,
            name: "Sri Lankan Airlines",
            flights: ['707']
        },
        {
            id: 20,
            name: "Swiss International Airline",
            flights: ['8078']
        },
        {
            id: 21,
            name: "Turkish",
            flights: ['748']
        },
        {
            id: 22,
            name: "Ukraine International Airlines",
            flights: ['7315']
        },
            // Add more airlines and their flights here if needed
        ];

        //--------------------> This is the code for generating Select-Airlines 
        const frequentAirlinesIds = [4, 12, 10, 17, 21]; // IDs of the frequent airlines
        const allOptions = $('#allOptions');
        const frequentOptions = $('#frequentOptions');

        // Add frequent options to the "Frequently Selected" group
        frequentAirlinesIds.forEach(function (airlineId) {
            const airline = airlines.find(function (a) {
                return a.id === airlineId;
            });

            if (airline) {
                const option = $('<option></option>');
                option.val(airline.id);
                option.html("<span>" + airline.name + "</span>");
                frequentOptions.append(option);
            }
        });

        // Add all airlines to the "All Airlines" group
        airlines.forEach(function (airline) {
            const option = $('<option></option>');
            option.val(airline.id);
            option.text(airline.name);
            allOptions.append(option);
        });

        // Move "Private Jet" to the "All Airlines" group
        $('#frequentOptions option[value="16"]').appendTo(allOptions); // Assuming the ID of "Private Jet" is 16

        // Function to update the "Select Flight #" dropdown based on the selected airline
        function updateFlightOptions(selectedAirlineId) {
            const selectedAirline = airlines.find(function (airline) {
                return airline.id === parseInt(selectedAirlineId);
            });

            if (selectedAirline) {
                const flightSelect = $('#flightSelect');
                flightSelect.empty(); // Clear existing options

                // Add the "Flight #" options for the selected airline
                selectedAirline.flights.forEach(function (flight) {
                    const option = $('<option></option>');
                    option.val(flight);
                    option.text('Flight #' + flight);
                    flightSelect.append(option);
                });
            } else {
                // If the selected airline is not found, clear the "Select Flight #" dropdown
                $('#flightSelect').empty();
            }
        }

        // Event handler for when the "Select Airline" dropdown value changes
        $('#airlineSelect').change(function () {
            const selectedAirlineId = $(this).val();

            //  Fabricated
            const select_ArrivalFlight = $("select[name='cs_trip_info_select_flight']");
            const text_ArrivalFlight = $("input[name='text_ArrivalPrivateFlightNo']");

            // confusing
            if (selectedAirlineId == 16) {

                // Switch The ID to which one is not hidden
                select_ArrivalFlight.attr("id", "flightSelect_hidden");
                text_ArrivalFlight.attr("id", "flightSelect");

                // Choose which one is hidden and which one is not
                select_ArrivalFlight.addClass("hidden");
                text_ArrivalFlight.removeClass("hidden");

                console.log('Senbonzakura --> 1');

            } else {
                // Switch The ID to which one is not hidden
                select_ArrivalFlight.attr("id", "flightSelect");
                text_ArrivalFlight.attr("id", "flightSelect_hidden");

                // Choose which one is hidden and which one is not
                select_ArrivalFlight.removeClass("hidden");
                text_ArrivalFlight.addClass("hidden");

                console.log('Kageyoshi --> 1');
            }

            updateFlightOptions(selectedAirlineId);
        });

        // Initialize the "Select Flight #" dropdown when the page loads
        updateFlightOptions($('#airlineSelect').val());


        // -_-_-_-_-_-_-_-_-_-_  This is for the RETURN/DEPARTURE if known :D


        jQuery(document).ready(function ($) {


            //---------------------> This is the Return Airlines Object
            const returnAirlines = airlines;

            //--------------------> This is the code for generating Select-Return-Airlines 
            const returnFrequentAirlinesIds = [4, 12, 10, 17, 21]; // IDs of the frequent return airlines
            const returnAllOptions = $('#return_allOptions');
            const returnFrequentOptions = $('#return_frequentOptions');

            // Add frequent options to the "Frequently Selected" group for return airlines
            returnFrequentAirlinesIds.forEach(function (airlineId) {
                const airline = returnAirlines.find(function (a) {
                    return a.id === airlineId;
                });

                if (airline) {
                    const option = $('<option></option>');
                    option.val(airline.id);
                    option.text(airline.name);
                    returnFrequentOptions.append(option);
                }
            });

            // Add all return airlines to the "All Airlines" group
            returnAirlines.forEach(function (airline) {
                const option = $('<option></option>');
                option.val(airline.id);
                option.text(airline.name);
                returnAllOptions.append(option);
            });

            // Function to update the "Select Return Flight #" dropdown based on the selected return airline
            function updateReturnFlightOptions(selectedReturnAirlineId) {
                const selectedReturnAirline = returnAirlines.find(function (airline) {
                    return airline.id === parseInt(selectedReturnAirlineId);
                });

                if (selectedReturnAirline) {
                    const returnFlightSelect = $('#return_flightSelect');
                    returnFlightSelect.empty(); // Clear existing options

                    // Add the "Return Flight #" options for the selected return airline
                    selectedReturnAirline.flights.forEach(function (flight) {
                        const option = $('<option></option>');
                        option.val(flight);
                        option.text('Return Flight #' + flight);
                        returnFlightSelect.append(option);
                    });
                } else {
                    // If the selected return airline is not found, clear the "Select Return Flight #" dropdown
                    $('#return_flightSelect').empty();
                }
            }

            // Event handler for when the "Select Return Airline" dropdown value changes
            $('#return_airlineSelect').change(function () {
                const selectedReturnAirlineId = $(this).val();
                updateReturnFlightOptions(selectedReturnAirlineId);

                // fabricated
                const select_DepartureFlight = $('select[name="cs_trip_info_select_return_flight"]');
                const text_DepartureFlight = $("input[name='text_DeparturePrivateFlightNo']");

                // confusing
                if (selectedReturnAirlineId == 16) {

                    // Switch The ID to which one is not hidden
                    select_DepartureFlight.attr("id", "return_flightSelect_hidden");
                    text_DepartureFlight.attr("id", "return_flightSelect");

                    // Choose which one is hidden and which one is not
                    select_DepartureFlight.addClass("hidden");
                    text_DepartureFlight.removeClass("hidden");
                } else {
                    // Switch The ID to which one is not hidden
                    select_DepartureFlight.attr("id", "return_flightSelect");
                    text_DepartureFlight.attr("id", "return_flightSelect_hidden");

                    // Choose which one is hidden and which one is not
                    select_DepartureFlight.removeClass("hidden");
                    text_DepartureFlight.addClass("hidden");

                    // Initialize the "Select Return Flight #" dropdown when the page loads
                    updateReturnFlightOptions($('#return_airlineSelect').val());
                }
            });

        });

    });
</script>