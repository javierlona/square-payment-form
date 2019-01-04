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

  <link rel="stylesheet" type="text/css" href="sqpaymentform.css">
  <link rel="stylesheet" href="bootstrap.min.css">

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
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="#">(214) 111 - 3333</a>
      <a class="p-2 text-dark" href="#">email@example.com</a>
    </nav>
    <a class="p-2 text-dark" href="#">123 Main St, Arlington, TX 76017</a>
    <a class="p-2 text-dark no-hover" href="#">M - F: 8AM - 5PM</a>
    <a class="p-2 text-dark no-hover" href="#">SAT: 10AM - 7PM</a>
    <a class="p-2 text-dark no-hover" href="#">SUN: Closed</a>
  </div>
  <div class="container">

  <div class="py-3 text-center">
   <img class="d-block mx-auto mb-4" src="dummy-logo-300x140.png" alt="" width="25%" height="25%">
    <h2>Payment Form</h2>
  </div>
    <div class="row">
      <!-- Begin Payment Form -->
      <div class="sq-payment-form">
      <div id="sq-ccbox">
        <form id="nonce-form" novalidate action="./process-card.php" method="post">
          <div class="form-group">
            <label class="sq-label">Cantidad</label>
            <input id="sq-amount" name="amount" type="number" required class="form-control" autofocus>
            <div class="invalid-feedback">
            Ingrese una cantidad válida
            </div>
          </div>
          <div class="sq-field">
            <label class="sq-label">Número de tarjeta</label>
            <div id="sq-card-number"></div>
          </div>
          <div class="sq-field-wrapper">
            <div class="sq-field sq-field--in-wrapper">
              <label class="sq-label">CVV</label>
              <div id="sq-cvv"></div>
            </div>
            <div class="sq-field sq-field--in-wrapper">
              <label class="sq-label">Vencimiento</label>
              <div id="sq-expiration-date"></div>
            </div>
            <div class="sq-field sq-field--in-wrapper">
              <label class="sq-label">Postal</label>
              <div id="sq-postal-code"></div>
            </div>
          </div>
          <div class="sq-field">
            <button id="sq-creditcard" class="sq-button" onclick="requestCardNonce(event)">
              Pague Ahora
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
  
  </div>
  <script src="validate-amount.js"></script>
</body>
</html>