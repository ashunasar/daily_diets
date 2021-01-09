<?php  ob_start();?>
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
    <title>Daily Diets Sign-Up</title>
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
                    <h2 class="title">Registration Info</h2>
                    <span id="error" style="color:red;display:none;"></span>
                    <form method="POST" action="#">
                    
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="First Name" name="fname" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Last Name" name="lname" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="email" placeholder="Email Id" name="email" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="number" placeholder="Mobile Number" id="mobile_number" name="mobile" required>
                                    <span id="invalid_number" style="color:red;display:none;">Only 10 digits number allowed</span>
                                </div>

                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="password" placeholder="Password" name="pass" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Referral Code(optional)" maxlength="8" name="referred_by" >
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
                        }elseif(isset($_GET['return_to']) && (!isset($_GET['days']))){
                        $return = $_GET['return_to'];
                        }

                        ?>
                        
                        <span>Already have an account?<a href="login.php?return_to=<?php echo $return ?>">login</a></span>
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
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pass   = $_POST['pass'];
    $referred_by   = $_POST['referred_by'];
    
    function check($check_column,$var){
        global $con;
        $query  = "SELECT * FROM `user` WHERE $check_column=?";
        $result =$con->prepare($query);
        $result->execute([$var]);
        $check = $result->rowCount();
       
        return $check;
        }
    
    if(check('email',$email)){
        ?>
        <script>
        $('#error').html("Email Alredy Registered");
        $('#error').css('display','block');
        </script>
        <?php
    }else{
        if(check('mobile',$mobile)){
        ?>
        <script>
        $('#error').html("Mobile Number Alredy Registered");
        $('#error').css('display','block');
        </script>
        <?php
    }else{
        if(strlen($pass) < 6){
            ?>
        <script>
        $('#error').html("Password Should be more than 5 characters");
        $('#error').css('display','block');
        </script>
        <?php
        }else{
            setcookie('email',$email,time() + (86400 * 60), "/");

            $fullname = $fname . $lname;
            $reffer_code = strtoupper(substr($fullname,0,3)) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) ;
            $query = "INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `mobile`, `pass`, `referred_by`,`refer_code`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
            $result = $con->prepare($query);
            $result->execute([$fname,$lname,$email,$mobile,$pass,$referred_by,$reffer_code]);
        ?>
        <script>
        $('#error').html("Registered Successfully");
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
            
//       setTimeout(function(){window.location="<?php //echo (isset($_GET['return_to']))? $_GET['return_to'] .'&days=' . $_GET['days'] : 'https://dailydietsd.com/' ?>"},500);
        </script>
        <?php
            
            
        }
    }
    }
    
 }
  ?>

</body>

</html>
