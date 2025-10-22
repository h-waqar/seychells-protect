jQuery(document).ready(function ($) {
  var cardNumber = elements.create("cardNumber", { style: style });
  cardNumber.mount("#card-number");
  var cardExpiry = elements.create("cardExpiry", { style: style });
  cardExpiry.mount("#card-expiry");
  var cardCvc = elements.create("cardCvc", { style: style });
  cardCvc.mount("#card-cvv");

  var bmSubmitPayment = document.getElementById("bmSubmitPayment");

  bmSubmitPayment.addEventListener("click", function (event) {
    // We don't want to let default form submission happen here,
    // which would refresh the page.

    event.preventDefault();

    // if (!validate_form(form) || is_processing_form) return; //return on error -or- if already processing a request

    //Pre Processing actions
    is_processing_form = true; //set flag to prevent multiple submissions
    // $submit_btn.prop("disabled", true).attr("disabled", "disabled").hide(); //disable submit btn
    $msg_processing.show(); //show processing msg

    //Stripe action

    var fname = $("#checkoutFirstName").val(), //person 1 booker data as fallback
      lname = $("#checkoutLastName").val(),
      cardholder = $("#cardholder").val(),
      name = cardholder.trim() != "" ? cardholder.trim() : fname + " " + lname,
      email = $("#bsEmail").val(),
      phoneNumber = $("#bsBiPhoneNumber").val(),
      street_address_1 = $("#bsAddressLineOne").val(),
      street_address_2 = $("#bsAddressLineTwo").val(),
      postal_code = $("#BsZipCode").val(),
      country = $("#checkoutCountry").val();

    stripe
      .createPaymentMethod({
        type: "card",
        card: cardNumber,
        billing_details: {
          // Include any additional collected billing details.
          name: name.trim() != "" ? name.trim() : null,
          email: email,
          phone: phoneNumber,
          address: {
            line1: street_address_1,
            line2: street_address_2,
            postal_code: postal_code,
            country: country,
          },
        },
      })
      .then(stripePaymentMethodHandler);
  });

  function stripePaymentMethodHandler(result) {
    if (result.error) {
      // Show error in payment form
      stripeRenderError(result.error);
    } else {
      stripeRenderError(false); //hide errors
      // Otherwise send paymentMethod.id to your server (see Step 4)
      wp.ajax
        .post("booking_payment", {
          payment_method_id: result.paymentMethod.id,
          test_id: $test_id.val(),
          addon_id: $addon_id.val(),
          test_qty: $test_qty.val(),
          coupon_code: $coupon_code.val(),
        })
        .done(function (response) {
          // Handle server response (see Step 4)
          //console.log('response',response);
          handleServerResponse(response);
        })
        .fail(function (response) {
          // Handle server response (see Step 4)
          //console.log('response',response);
          handleServerError(response);
        });
    }
  }
}); // jquery ends

/**************************Old Code ******************************** */

jQuery(document).ready(function ($) {
  var $patients_boxes = $("#PatientsBox");
  if ($patients_boxes.length) {
    var newTemplate = wp.template("new-person");
    $("#add-patient-box").on("click", function (e) {
      e.preventDefault();
      var $self = $(this);
      var index = parseInt($self.data("index")); //use for indexes & generating field IDs
      var box_number = parseInt($self.data("box_number")); //used for generating Box Title number
      var newId = index + 1;
      var data = {
        box_number: box_number,
        number: newId,
        index: index,
      };
      var new_box_number = box_number + 1;
      $patients_boxes.append(newTemplate(data));
      $self.data("index", newId).attr("data-index", newId);
      $self
        .data("box_number", new_box_number)
        .attr("data-box_number", new_box_number);
      $("body").trigger("bf_person_box_added", [data]);
    });
    if (typeof BookingRequest != "undefined" && BookingRequest.persons) {
      //set values from current request if form is submitted
      Object.keys(BookingRequest.persons).forEach(function (key) {
        $("#add-patient-box").trigger("click"); //add 1 box for each selected
        var box_id = $("#add-patient-box").data("index");
        var el = BookingRequest.persons[key];
        Object.keys(el).forEach(function (key) {
          // key: the name of the object key
          // index: the ordinal position of the key within the object
          $("#" + key + box_id)
            .val(el[key])
            .trigger("change");
        });
      });
      //console.log(BookingRequest);
    } else {
      $("#add-patient-box").trigger("click"); //add 1 box at page load
    }

    $(".PatientsBox").on("click", "[data-remove-box]", function (e) {
      e.preventDefault();
      var $self = $(this),
        target_no = $self.data("remove-box");
      if (!$("#PatientBox" + target_no).length) return;
      $("#PatientBox" + target_no).slideUp(350, function () {
        $(this).remove();
        var box_number = parseInt($("#add-patient-box").data("box_number"));
        $("#add-patient-box")
          .data("box_number", box_number - 1)
          .attr("data-box_number", box_number - 1);
        //rename titles for remaining boxes like 1,2,3 .. instead of  1,3,4
        reset_box_titles();
        $("body").trigger("bf_person_box_removed", [
          { box_number: box_number - 1 },
        ]); //send updated box_number
      });
    });

    function reset_box_titles() {
      $(".PatientsBox > .PatientBox").each(function (index) {
        var $self = $(this),
          $box_number = $self.find(".box-number");
        $box_number.text(index + 1);
      });
    }

    $(".PatientsBox").on("click", "[data-copy-field]", function (e) {
      e.preventDefault();
      var $self = $(this);
      var field = $self.data("copy-field"); //copy from/to this field name
      var to = $self.data("copy-field-to"); //copy to this
      var from = $self.data("copy-field-from")
        ? $self.data("copy-field-from")
        : "1"; //copy from this

      if (!$("#" + field + from).length) return; //1st item not found

      $("#" + field + to)
        .val($("#" + field + from).val())
        .trigger("change");
    });
  }
  $("body").on("change", 'input[type="checkbox"][data-toggle]', function (e) {
    //e.preventDefault();
    var $self = $(this);
    var target = $self.data("toggle"); //target

    if (!$(target).length) return; //item not found

    if ($self.is(":checked")) {
      $(target).show();
    } else {
      $(target).hide();
    }
  });

  //Apply Coupon
  $('[data-widget="apply-coupon"]').on("keydown", "input", function (event) {
    if (event.which == 13 || event.keyCode == 13) {
      event.preventDefault();
      $(this)
        .closest('[data-widget="apply-coupon"]')
        .find("button")
        .trigger("click");
      return false;
    }
  });

  $('[data-widget="apply-coupon"]').on("click", "button", function (e) {
    //e.preventDefault();
    var $self = $(this),
      $form = $self.closest("form"),
      coupon_code = $form.find("#coupon_code").val(),
      test_id = $form.find("#test_id").val(),
      addon_id = $form.find("#addon_id").val();

    wp.ajax
      .post("apply_coupon", {
        test_id: test_id,
        addon_id: addon_id,
        coupon_code: coupon_code,
      })
      .done(function (response) {
        //console.log('response',response);
        $("body").trigger("bf_coupon_applied", [response]); //send response
      })
      .fail(function (response) {
        // Handle server response (see Step 4)
        //console.log('responsefail',response);
        $("body").trigger("bf_coupon_failed", [response]); //send response
      });
  });
  ////

  var form = document.getElementById("payment-form");
  if (form && EBooking.stripe_public_key) {
    //https://stripe.com/docs/payments/accept-a-payment-synchronously?html-or-react=html
    var stripe = Stripe(EBooking.stripe_public_key);

    var elements = stripe.elements();

    // Set up Stripe.js and Elements to use in checkout form

    var style = {
      base: {
        color: "#212529",
        fontFamily:
          '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol", sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        lineHeight: "24px",
        "::placeholder": {
          color: "#aab7c4",
        },
      },
      invalid: {
        color: "#fa755a",
        iconColor: "#fa755a",
      },
    };

    var cardNumber = elements.create("cardNumber", { style: style });
    cardNumber.mount("#card-number");
    var cardExpiry = elements.create("cardExpiry", { style: style });
    cardExpiry.mount("#card-expiry");
    var cardCvc = elements.create("cardCvc", { style: style });
    cardCvc.mount("#card-cvv");

    var $test_id = $("#test_id"),
      $addon_id = $("#addon_id"),
      $coupon_code = $("#coupon_code"),
      $test_qty = $("[data-test-qty]"),
      $msg_processing = $("#msg-processing"),
      $submit_btn = $("#submit-booking");
    var is_processing_form = false; //flag when submit is clicked or form is submitted

    function stripeRenderError(error) {
      if (!error) {
        $("#stripe-errors").hide();
        return;
      }
      is_processing_form = false; //reset flag on error to allow user to submit the form again
      $("#stripe-errors")
        .html(error.message ? error.message : error)
        .show();
      $msg_processing.hide(); //hide processing msg
      $submit_btn.prop("disabled", false).removeAttr("disabled").show(); //re enable submit btn
    }
    function stripePaymentMethodHandler(result) {
      if (result.error) {
        // Show error in payment form
        stripeRenderError(result.error);
      } else {
        stripeRenderError(false); //hide errors
        // Otherwise send paymentMethod.id to your server (see Step 4)
        wp.ajax
          .post("booking_payment", {
            payment_method_id: result.paymentMethod.id,
            test_id: $test_id.val(),
            addon_id: $addon_id.val(),
            test_qty: $test_qty.val(),
            coupon_code: $coupon_code.val(),
          })
          .done(function (response) {
            // Handle server response (see Step 4)
            //console.log('response',response);
            handleServerResponse(response);
          })
          .fail(function (response) {
            // Handle server response (see Step 4)
            //console.log('response',response);
            handleServerError(response);
          });
      }
    }

    function handleServerError(response) {
      if (response.responseJSON && response.responseJSON.data.error) {
        // Show error from server on payment form
        stripeRenderError(response.responseJSON.data.error);
      }
      $msg_processing.hide();
      $submit_btn.prop("disabled", false).removeAttr("disabled").show(); //re enable submit btn
    }
    function handleServerResponse(response) {
      if (response.requires_action) {
        // Use Stripe.js to handle required card action
        stripe
          .handleCardAction(response.payment_intent_client_secret)
          .then(handleStripeJsActionResult);
      } else {
        if (response.payment_intent_id) {
          $("#payment_intent_id").val(response.payment_intent_id);
        }
        // Show success message / submit form
        stripeRenderError(false); //hide errors
        form.submit(); //submit
      }
    }

    function handleStripeJsActionResult(result) {
      if (result.error) {
        // Show error in payment form
        stripeRenderError(result.error);
      } else {
        // The card action has been handled
        // The PaymentIntent can be confirmed again on the server
        wp.ajax
          .post("booking_payment", {
            payment_intent_id: result.paymentIntent.id,
            test_id: $test_id.val(),
            addon_id: $addon_id.val(),
          })
          .done(function (response) {
            // Handle server response (see Step 4)
            //console.log('response',response);
            handleServerResponse(response);
          })
          .fail(function (response) {
            // Handle server response (see Step 4)
            //console.log('response handleStripeJsActionResult',response);
            handleServerError(response);
          });
      }
    }
  }
});
