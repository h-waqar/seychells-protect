<!-- These are the pages before the Form -->
<?php
// include_once( 'plugin-pages/p-zero.php' );
// include_once( 'plugin-pages/start-trip.php' );
// include_once( 'plugin-pages/p-one.php' );
// include_once( 'plugin-pages/p-two.php' );
// include_once('plugin-pages/p-three.php');
// include_once('plugin-pages/p-four.php');
// include_once('plugin-pages/p-five.php');
// include_once('plugin-pages/thank-you.php');

?>




<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!-- This is the Side Bar || Content Box d-flex hidden -->
<!-- <div class="container flex-row flex-wrap hidden" id="bsContainer"> -->
<div class="container flex-row flex-wrap row py-4" id="bsContainer">

	<!-- This is for the Home Page Titles -->
	<!-- <div class="cs-home-title"> -->
	<?php // include_once('plugin-pages/home-page-titles.php'); ?>
	<!-- </div> -->


	<div class="left col-12 col-md-3 bs-sidebar-container d-sm-block ps-4">
		<!-- Side Bar Coding -->
		<?php include_once('plugin-pages/side-bar.php'); ?>
	</div>

	<div class="right col-12 col-md-9 px-4">
		<form action="" method="POST" id="payment-form">
			<!-- Spinner -->
			<div id="spinner-wrapper" class="">
				<div class="spinner"></div>
			</div> <!-- Spinner End -->

			<div id="cs_ParentForm" class="">

				<?php
				// _swiftFV.mountJqueryDatepickers();
				
				// |> New Routing
				// include_once('plugin-pages/medical-protection.php');
				// include_once('plugin-pages/personal-information.php');
				// include_once('plugin-pages/trip-information.php');
				// include_once('plugin-pages/summary.php');
				include_once('plugin-pages/checkout.php');

				// ---------------------------------------------------
				
				// // |> Templates
				// include_once('plugin-pages/templates.php');
				
				// // |> Passport Information File
				// include_once('plugin-pages/passport-information.php');
				
				// // |> Passport Response File
				// include_once('plugin-pages/passport-response.php');
				
				// // |> Selfie Photo File
				// include_once('plugin-pages/selfie-photo.php');
				
				// // |> Selfie Photo File Response
				// include_once('plugin-pages/selfie-photo-response.php');
				
				// // |> Contact Information File
				// // include_once('plugin-pages/contact-information.php');
				
				// // |> Trip Information
				// // include_once('plugin-pages/trip-information.php');
				
				// // |> Health Declaration
				// include_once('plugin-pages/health-declaration.php');
				
				// // |> Custom Declaration
				// include_once('plugin-pages/custom-declaration.php');
				
				// // |> Required Documents
				// include_once('plugin-pages/required-docs.php');
				
				// // |> Optional Documents
				// include_once('plugin-pages/optional-docs.php');
				
				// // |> Confirm and Proceed
				// include_once('plugin-pages/confirm-and-proceed.php');
				
				// // |> Processing Period
				// include_once('plugin-pages/processing-period.php');
				
				// // |> Medical Protection
				// // include_once('plugin-pages/medical-protection.php');
				
				// // |> Payment Options
				// include_once('plugin-pages/payment-options.php');
				
				// // |> Payment Options
				
				// /**
				//  * Group Passport Files
				//  */
				
				// include_once('plugin-pages/group-passport.php');
				// // |> Passport Group Response
				// include_once('plugin-pages/group-p-response.php');
				
				// include_once('plugin-pages/passport-resp-next.php');
				
				// include_once('plugin-pages/popup-view-document.php');
				
				?>


			</div>


		</form>
	</div>


</div>