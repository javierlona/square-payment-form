<?php 
  if(empty($_GET['tid'])){
    header("Location: index.php");
  } else {
    $safe_tid = htmlspecialchars($_GET['tid']);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thank You</title>
  <link rel="stylesheet" type="text/css" href="./css/sqpaymentform.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<body>
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
    <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="./imgs/dummy-logo-300x140.png" alt="" width="25%" height="25%">
      <h2>Payment Successful</h2>
      <p class="lead">
        Transaction ID: <?php echo $safe_tid; ?>
      </p>
      <a class="btn btn-primary btn-lg" href="./" role="button">Return Home</a>
    </div>
  </div>
  
</body>
</html>