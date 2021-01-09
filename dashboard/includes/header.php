<?php include 'db.php'?>
<?php date_default_timezone_set('Asia/Kolkata');?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta name="description" content="Start your development with a Dashboard for Bootstrap 4."> -->
  <!-- <meta name="author" content="Creative Tim"> -->
  <title>Daily Diets Dashboard</title>
  <!-- Favicon -->
  <link rel="icon" href="../checkout/images/foodlogo.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <style>/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}</style>
</head>

<body>
  <!-- Sidenav -->
  
  <?php if(!(basename($_SERVER["SCRIPT_FILENAME"]) == "my_profile.php")){
  echo '<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main" >
    <div class="scrollbar-inner" >
      <!-- Brand -->
      <div class="sidenav-header  align-items-center" style="height: 150px;">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../checkout/images/foodlogo.png" class="navbar-brand-img" alt="..." style="max-height: 100px;">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="coupon.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Coupon</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="today.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Today\'s order</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="special.php">
                <i class="ni ni-favourite-28 text-default"></i>
                <span class="nav-link-text">Special Meals</span>
              </a>
            </li>
          </ul>

          
        </div>
      </div>
    </div>
  </nav>';
  } ?>
  
  
  
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
