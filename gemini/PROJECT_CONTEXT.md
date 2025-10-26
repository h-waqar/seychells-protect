# Seychelles Protect - Project Context

This document outlines the architecture and workflow of the Seychelles Protect WordPress plugin.

## 1. Overview

The plugin provides a multi-step form for users to purchase a "24/7 Medical Protection" plan for their trip to Seychelles. It is a heavily AJAX-driven plugin using jQuery and custom JavaScript for the frontend, and a series of dedicated PHP files for backend processing. Data is stored in a custom post type (CPT) named "bookings" with the help of the Advanced Custom Fields (ACF) plugin.

## 2. Core Technologies

-   **Backend**: PHP, WordPress Plugin API
-   **Frontend**: JavaScript, jQuery, jQuery UI, Bootstrap 5, HTML, CSS
-   **Data Storage**: WordPress Custom Post Type (`bookings`), Custom Database Table (`wp_establishment`), and ACF for post metadata.

## 3. Project Structure & Workflow

### 3.1. Initialization (`init.php`)

-   **Main File**: `init.php` is the primary plugin file.
-   **Shortcode**: It registers the `[seychelles_protect]` shortcode, which is the entry point for displaying the form. The `plugin_init()` method in the `Seychelles_Protect` class is the callback for this shortcode.
-   **Scripts & Styles**: The `enqueue_css_js()` method loads all necessary assets (JS and CSS) only on pages containing the shortcode. This includes Bootstrap, jQuery UI, Font Awesome, and numerous custom scripts and styles.
-   **AJAX URL**: It makes the WordPress AJAX URL available to the frontend scripts via a global JavaScript variable `ajaxUrl`.
-   **AJAX Handlers**: It includes numerous PHP files from the `source/ajax/` directory. Each file corresponds to a specific backend action triggered by an AJAX request.
-   **Activation**: On activation, the plugin creates a custom table `wp_establishment` and populates it from `source/csv/establishment.csv`.

### 3.2. Frontend Form (`source/home.php`)

-   The `plugin_init()` function uses an output buffer to capture the contents of `source/home.php` and returns it as the shortcode's output.
-   `home.php` acts as the main container for the form and includes the different steps (pages) of the form from the `source/plugin-pages/` directory.

The form is divided into the following steps:
1.  **Medical Protection**: `source/plugin-pages/medical-protection.php`
2.  **Personal Information**: `source/plugin-pages/personal-information.php`
3.  **Trip Information**: `source/plugin-pages/trip-information.php`
4.  **Summary**: `source/plugin-pages/summary.php`
5.  **Checkout**: `source/plugin-pages/checkout.php`

A sidebar for navigation between these steps is included from `source/plugin-pages/side-bar.php`.

### 3.3. Client-Side Logic (`source/js/`)

The form's interactivity is managed by a set of JavaScript files:

-   `swiftNavigation.js`: Likely handles the logic for moving between the different steps of the form (Next/Previous buttons).
-   `SwiftUiManager.js`: Manages the visibility of UI elements, showing and hiding form sections.
-   `ajaxRequest.js`: Contains the core functions for making AJAX requests to the backend.
-   `swiftFormValidation.js`: Handles client-side validation of form fields.
-   `swiftStorage.js`: Appears to handle saving and retrieving form data from the browser's local storage, allowing data to persist between steps.
-   `swiftMultiPassport.js`: Contains logic related to adding multiple applicants/passports. The "Add More Applicants" functionality in `personal-information.php` is likely managed by this script.

### 3.4. Backend Logic (`source/ajax/`)

-   Each file in this directory handles a specific AJAX action. For example, `contact_info.php` processes the personal information, and `trip_info.php` handles trip details.
-   `create_custom_post.php` is the key file responsible for gathering all the data collected in the previous steps and creating a new post in the "bookings" CPT. It likely uses ACF functions like `update_field()` to save the data to the custom fields listed in the project requirements.

## 4. Data Flow

1.  User fills out a step in the form (e.g., Medical Protection).
2.  On clicking "Continue", data is likely saved to the browser's `localStorage` via `swiftStorage.js`.
3.  `swiftNavigation.js` and `SwiftUiManager.js` hide the current section and show the next one.
4.  Throughout the process, data might be sent to the backend via AJAX for validation or partial saving (e.g., validating a passport).
5.  In the final steps, all the data stored in `localStorage` is collected and sent via an AJAX request, which is handled by `create_custom_post.php`.
6.  `create_custom_post.php` creates a new "bookings" post and saves all the form data into the corresponding ACF fields.
7.  The user is then redirected to the payment/checkout page.

## 5. Recent Changes

### 5.1. Dynamic Pricing and Summary

-   The summary page (`source/plugin-pages/summary.php`) is now fully dynamic.
-   The pricing logic in `source/js/SwiftUiManager.js` has been updated to be based on age. It now calculates the total cost based on the number of applicants aged 10 or older.

### 5.2. Multiple Applicant Data

-   Fixed a bug where the date of birth for additional applicants was not being captured.
-   The `handle_btnAddContact` function in `source/js/swiftFormValidation.js` was updated to correctly name the date of birth input field.
-   The `contactInfoData` function in `source/js/swiftStorage.js` was updated to read the date of birth.
-   A new `saveApplicantsData` function was added to `swiftStorage.js` to store all applicant data locally.
-   The `handle_btnContactInfoContinue` function in `source/js/visaSwift.js` was updated to call `saveApplicantsData`.
-   The backend AJAX handler `source/ajax/contact_info.php` was updated to save the date of birth to the `emergency_contacts` repeater field.

### 5.3. Plugin Settings Page

-   A new settings page has been created under "Settings > Seychelles Protect" in the WordPress admin.
-   This page allows administrators to set the prices for the "Essential Protection" and "Total Protection" plans.
-   The prices are passed to the frontend using `wp_localize_script` and are used in the dynamic pricing calculation.

### 5.4. Code Cleanup

-   Removed commented-out and unused `include_once` statements from `source/home.php`.

### 5.5. Required ACF Field

-   **Action Required:** For the date of birth of additional applicants to be saved, a new field must be added to the `emergency_contacts` repeater field in ACF. The new field should be named `emergency_contact_dob` and its type should be set to "Date Picker".

## 6. Save Booking on Pay Button Click (No Payment)

### 6.1. Task

The task was to modify the plugin to save all the form data to the ACF fields of a new "protection" custom post type when the "Pay Now" button is clicked, bypassing the CyberSource payment gateway.

### 6.2. Plan

1.  **Create a New AJAX Handler:**
    *   Create a new file named `save_booking.php` in the `source/ajax/` directory.
    *   This file will handle a new AJAX action, `save_booking_sy`.
    *   It will receive all the form data and create a new post of the `protection` post type, saving the data to the corresponding ACF fields.

2.  **Modify the JavaScript:**
    *   Modify the `handle_btnPaymentOptionContinue` function in `source/js/visaSwift.js`.
    *   Create a new `getAllFormData()` function to gather all the data from the form fields.
    *   Send this consolidated data to the new `save_booking_sy` AJAX action.

3.  **Skip Payment:**
    *   Upon successful data submission, the user will be shown a success message, and the payment process will be bypassed.

### 6.3. Implementation

*   **`source/ajax/save_booking.php`:** A new file was created to handle the `save_booking_sy` AJAX action. It receives the form data and saves it to a new `protection` post using the `update_field()` function.
*   **`init.php`:** The `save_booking.php` file was included to register the new AJAX handler.
*   **`source/js/visaSwift.js`:**
    *   A new function `getAllFormData()` was added to collect data from the `personal-information.php` and `trip-information.php` forms.
    *   The `handle_btnPaymentOptionContinue()` function was modified to call `getAllFormData()` and send the data to the `save_booking_sy` action.

### 6.4. How it Works

1.  The user fills out the "Personal Information" and "Trip Information" sections of the form.
2.  When the user clicks the "Pay Now" button on the checkout page, the `handle_btnPaymentOptionContinue` function in `visaSwift.js` is triggered.
3.  The `getAllFormData()` function is called, which gathers all the data from the form fields.
4.  An AJAX request is sent to the `save_booking_sy` action with the collected data.
5.  The `cs_save_booking_sy` function in `save_booking.php` creates a new "protection" post and saves the form data to the corresponding ACF fields.
6.  A success message is displayed to the user.

### 6.5. Bug Fixes and Improvements (Follow-up)

*   **Problem:** The post title for new bookings was a generic "New Booking".
*   **Fix:** The `save_booking.php` script was updated to create a more descriptive title: "New Booking - [Applicant's Email]".

*   **Problem:** The "Emergency Contacts" repeater was saving the phone number instead of the Date of Birth.
*   **Fix:** The `name` attribute of the date of birth input field in `personal-information.php` was corrected. The `save_booking.php` script was also updated to save the date of birth to the correct ACF sub-field (`emergency_contact_dob`).

*   **Problem:** The ACF field group contained many unused fields, and some labels were incorrect.
*   **Fix:** The `acf/acf-export.json` file was modified to:
    *   Remove the following unused fields: `applicant_country`, `acf_passport_info`, `purpose_of_travel`, `origin_trip`, `final_destination_country`, `customer_staying_information`.
    *   Change the label for the `emergency_contact_dob` field to "Date of Birth".

*   **Problem:** The "Amount" and "Medical Protection" fields were not being saved.
*   **Fix:** The `getAllFormData()` function in `visaSwift.js` was updated to collect the total amount and the selected medical protection plan. The `save_booking.php` script was updated to save this information.

*   **Problem:** The Date of Birth for the second (and subsequent) applicants in the repeater was not being saved.
*   **Fix:** The `handle_btnAddContact` function in `swiftFormValidation.js` was updated to include the correct `name` attribute (`emg_contact_dob`) for the date of birth input field in the dynamically generated HTML.

### 6.6. Manual Steps for ACF Configuration

To apply the changes to the Advanced Custom Fields, you need to import the updated configuration file:

1.  In the WordPress admin, go to **Custom Fields > Tools**.
2.  In the "Import Field Groups" section, select the `acf-export.json` file from the plugin's `acf` directory.
3.  Click "Import File". This will update the field group with the correct fields and labels.