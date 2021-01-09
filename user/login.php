<?php include '../checkout/db.php'?>
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
    <title>Daily Diets Login</title>
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
                    <h2 class="title">Login Info</h2>
                    <span id="error" style="color:red;display:none;"></span>
                    <form method="POST" action="#">
                    
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Email Id" name="email" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="password" placeholder="Password" name="pass" required>
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
                        <span>Don't have an account?<a href="register.php?return_to=<?php echo $return ?>">register</a></span> <br> <br>
                        <span>Forgot Password? click <a href="forgot_password.php?return_to=<?php echo $return ?>">here</a></span> 
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
    
                                    <script>
    $("#mobile_number").focusout(function(){
    $number = $("#mobile_number").val();
        if($number.length != 10){
           $('#invalid_number').css("display","block");
           }else{
               $('#invalid_number').css("display","none");
           }
  });
    </script>

<?php
if(isset($_POST['submit'])){
    $email  = $_POST['email'];
    $pass   = $_POST['pass'];
    $query  = "SELECT * FROM `user` WHERE `email`=? AND `pass`=?";
    $result = $con->prepare($query);
    $result->execute([$email,$pass]);
    $count  = $result->rowCount();
    if($count){
        setcookie('email',$email,time() + (86400 * 60), "/");
        ?>
        <script>
        $('#error').html("Login Successfully");
        $('#error').css('color','green');
        $('#error').css('display','block');

            
            <?php 
            if(isset($_GET['return_to']) && isset($_GET['days'])){
                $return = $_GET['return_to'] .'&days=' . $_GET['days'];
            }elseif(isset($_GET['return_to']) && !(isset($_GET['days'])) && !empty($_GET['return_to'])){
                $return = $_GET['return_to'];
            }elseif(isset($_GET['return_to']) && empty($_GET['return_to'])){
                $return = 'https://dailydietsd.com/';
            }else{
                $return = 'https://dailydietsd.com/';
            }
            ?>
            setTimeout(function(){window.location="<?php echo $return?>"},500);
            

    </script>
        <?php
    }else{
        ?>
        <script>
        $('#error').html("Incorrect Email or Password!");
        $('#error').css('display','block');
        </script>
        <?php
    }
    
 }
  ?>

</body>

</html>