<?php include '../checkout/db.php'?>
 <?php 
ini_set('max_execution_time', 300);
require_once '../mail/vendor/autoload.php'; 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Daily Diets Pass Reset</title>
    <!-- Favicon -->
    <link rel="icon" href="../checkout/images/foodlogo.png" type="image/png">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
   <div style="position: absolute;width: 100%;">
	<img src="../checkout/images/foodlogo.png" style="margin-left: auto;margin-right: auto;display: block;height: 165px;">
</div>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
       
        <div class="wrapper wrapper--w960">
           
            <div class="card card-2">
<!--                <div class="card-heading"></div>-->
                <div class="card-body">
                    <h2 class="title">Password Reset</h2>
                    <span id="error" style="color:red;display:none;"></span>
                    <form method="POST" action="#">
                    
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="password" placeholder="New Password" name="pass" required>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" name="submit">Submit</button>
                        </div>
                        <br>
                        <?php 
                        if(isset($_GET['return_to']) && isset($_GET['days'])){
                        $return = $_GET['return_to'] .'&days=' . $_GET['days'];
                        }elseif(isset($_GET['return_to']) && !(isset($_GET['days']))){
                        $return = $_GET['return_to'];
                        }
                        ?>
                        <span>Go back to <a href="login.php?return_to=<?php echo $return ?>"> login</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    

<?php
if(isset($_POST['submit'])){
    $pass  = $_POST['pass'];
    $hash  = $_GET['hash'];
    $query  = "SELECT * FROM `user` WHERE `hash`=?";
    $result = $con->prepare($query);
    $result->execute([$hash]);
    $count  = $result->rowCount();
    if($count){
     $query  = "UPDATE `user` SET `hash` = ?,`pass` = ? WHERE `user`.`hash` = ?";
        $result = $con->prepare($query);
        $result->execute(['',$pass,$hash]);
     ?>
<script>
    $('#error').html("Password Changed Successfully");
        $('#error').css('color','green');
        $('#error').css('display','block');
        setTimeout(function(){window.location="https://dailydietsd.com/"},500);
</script>
     <?php

    }else{
        ?>
        <script>
        $('#error').html("Something Went Wrong!");
        $('#error').css('display','block');
        </script>
        <?php
    }
    
 }
  ?>

</body>

</html>