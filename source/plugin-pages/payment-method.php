<div class="bs-payment-method">

	<div class="bs-container">

		<p>This charge will appear as ‘CancerScan UK Ltd’ on your card statement.</p>

		<form action="">

			<h4>Amount: £1190</h4>

			<p>Card Information</p>

			<!--------------------------------      Card Number         ------------------------------------------->


			<div class="row">
				<div class="col-md-6 px-0">
					<label for="BsCardNumber">Card Number</label>
				</div>

				<div class="col-md-6 bs-card-parent px-0">
					<div class="bs-after-card-img">
						<input type="text" name="bs_card_number" id="BsCardNumber" placeholder="Debit/Credit Card Number">
					</div>

					<div class="bs-payment-options">
						<a href="#">
							<img src="images/visa.svg" alt="visa-img">
						</a>

						<a href="#">
							<img src="images/master-card.svg" alt="master-card-img">
						</a>

						<a href="#">
							<img style="max-height: 45px" src="images/paypal.svg" alt="paypal-img">
						</a>

						<a href="#">
							<img src="images/discover.svg" alt="discover-img">
						</a>

						<a href="#">
							<img src="images/amex.svg" alt="amex-img">
						</a>
					</div>

				</div>

			</div>
			<!--------------------------------      Expiration Date     ------------------------------------------->

			<div class="row">
				<div class="col-md-6 px-0">
					<label for="BsExpirationDate">Expiration Date</label>
				</div>

				<div class="col-md-6 px-0">
					<div class="row">
						<div class="col-md-6 ps-0 pe-3">
							<select name="bs_expiration_date" id="BsExpirationDate">
								<option>
									Month
								<option value="Jan">jan</option>
								<option value="Jan">feb</option>
								<option value="Jan">march</option>
								<option value="Jan">june</option>
								</option>
							</select>
						</div>


						<div class="col-md-6 ps-3 pe-0">
							<select name="bs_expiration_date">
								<option>
									Year
								<option value="1900">1900</option>
								</option>
							</select>
						</div>
					</div>
				</div>

			</div>

			<!--------------------------------      Card CVV             ------------------------------------------->

			<div class="row">
				<div class="col-md-6 px-0">
					<label for="BsCardCVV">Card CVV</label>
				</div>

				<div class="col-md-6 bs-cvv-parent px-0">
					<div class="bs-after-cvv-img">
						<input type="text" name="bs_card_cvv" id="BsCardCVV">
					</div>
				</div>
			</div>

			<!--------------------------------      HOLDER HEADING       ------------------------------------------->

			<p>Card Holder Information</p>

			<!--------------------------------      First Name           ------------------------------------------->

			<div class="row">

				<div class="col-md-6 px-0">
					<label for="BsFirstName">First Name</label>
				</div>

				<div class="col-md-6 px-0">
					<input type="text" name="bs_first_name" id="BsFirstName">
				</div>

			</div>

			<!--------------------------------       Last Name           ------------------------------------------->

			<div class="row">

				<div class="col-md-6 px-0">
					<label for="BsLastName">Last Name</label>
				</div>

				<div class="col-md-6 px-0">
					<input type="text" name="bs_last_name" id="BsLastName">
				</div>

			</div>

			<!--------------------------------       Address             ------------------------------------------->

			<div class="row">

				<div class="col-md-6 px-0">
					<label for="BsAddress">Address</label>
				</div>

				<div class="col-md-6 px-0">
					<input type="text" name="bs_address" id="BsAddress">
				</div>

			</div>

			<!--------------------------------       ZipCode             ------------------------------------------->

			<div class="row">

				<div class="col-md-6 px-0">
					<label for="BsZipCode">Zipcode</label>
				</div>

				<div class="col-md-6 px-0 w-25">
					<input class="w-50" type="text" name="bs_zip_code" id="BsZipCode">
				</div>

			</div>


		</form>
	</div>
</div>