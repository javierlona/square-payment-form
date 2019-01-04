<?php
require 'vendor/autoload.php';

// dotenv is used to read from the '.env' file created for credentials
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Square Payment Form</title>
    <!-- link to the SqPaymentForm library -->
    <script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>
    <script type="text/javascript">
      window.applicationId =
        <?php
          echo "\"";
          echo ($_ENV["USE_PROD"] == 'true')  ?  $_ENV["PROD_APP_ID"]
                                              :  $_ENV["SANDBOX_APP_ID"];
          echo "\"";
        ?>;
      window.locationId =
      <?php
        echo "\"";
        echo ($_ENV["USE_PROD"] == 'true')  ?  $_ENV["PROD_LOCATION_ID"]
                                            :  $_ENV["SANDBOX_LOCATION_ID"];
        echo "\"";
      ?>;
    </script>
    <script src="sqpaymentform.js"></script>
    <!-- link to the custom styles for SqPaymentForm -->
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      if (SqPaymentForm.isSupportedBrowser()) {
        paymentForm.build();
        paymentForm.recalculateSize();
      } else {
      // Show a "Browser is not supported" message to your buyer
      }
    });

  </script>
<!-- Begin Payment Form -->
<div class="container">

  <div class="sq-payment-form">
    <div id="sq-ccbox">
      <!--
        You should replace the action attribute of the form with the path of
        the URL you want to POST the nonce to (for example, "/process-card").

        You need to then make a "Charge" request to Square's transaction API with
        this nonce to securely charge the customer.

        Learn more about how to setup the server component of the payment form here:
        https://docs.connect.squareup.com/payments/transactions/processing-payment-rest
      -->
      <form id="nonce-form" novalidate action="./process-card.php" method="post">
        <div class="sq-field">
          <label class="sq-label">Card Number</label>
          <div id="sq-card-number"></div>
        </div>
        <div class="sq-field-wrapper">
          <div class="sq-field sq-field--in-wrapper">
            <label class="sq-label">CVV</label>
            <div id="sq-cvv"></div>
          </div>
          <div class="sq-field sq-field--in-wrapper">
            <label class="sq-label">Expiration</label>
            <div id="sq-expiration-date"></div>
          </div>
          <div class="sq-field sq-field--in-wrapper">
            <label class="sq-label">Postal</label>
            <div id="sq-postal-code"></div>
          </div>
        </div>
        <div class="sq-field">
          <input name="amount" type="number">
        </div>
        <div class="sq-field">
          <button id="sq-creditcard" class="sq-button" onclick="requestCardNonce(event)">
            Pay Now
          </button>
        </div>
        <!--
          After a nonce is generated it will be assigned to this hidden input field.
        -->
        <div id="error"></div>
        <input type="hidden" id="card-nonce" name="nonce">
      </form>
    </div>
  </div>
  <!-- End Payment Form -->
  </div>
</body>
</html>