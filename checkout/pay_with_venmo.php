<?php session_start();?>
<?php include 'db.php' ?>
 <?php 
ini_set('max_execution_time', 300);
require_once '../mail/vendor/autoload.php'; 
 ?>
<?php date_default_timezone_set('America/Los_Angeles')?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/foodlogo.png" rel="icon" />
<title>Daily Diet</title>
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
======================= -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" type="text/css">

<!-- Stylesheet
======================= -->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Payment Method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
           <div class="col-6"><button class="btn" style="background: #ffffff;color: black;border: black solid 2px;"><svg class="LogoJewel svelte-jbp8mw" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44" height="44" style="
    height: 30px;
"><path fill="black" d="M36.65 0H7.354A7.354 7.354 0 0 0 0 7.354V36.65a7.354 7.354 0 0 0 7.354
    7.354H36.65a7.353 7.353 0 0 0 7.354-7.354V7.354A7.352 7.352 0 0 0 36.65
    0zm-.646 33.685a2.32 2.32 0 0 1-2.32 2.32H10.325a2.32 2.32 0 0
    1-2.321-2.32v-23.36a2.32 2.32 0 0 1 2.321-2.321h23.359a2.32 2.32 0 0 1 2.32
    2.321v23.36z" class="svelte-jbp8mw"></path><path fill="black" d="M17.333 28.003c-.736 0-1.332-.6-1.332-1.339V17.34c0-.739.596-1.339
    1.332-1.339h9.338c.738 0 1.332.6 1.332 1.339v9.324c0 .739-.594 1.339-1.332
    1.339h-9.338z" class="svelte-jbp8mw"></path></svg> <span style="
    font-size: 18px;
    font-family: sans-serif;
"> Pay with Square</span></button></div>
          
          
    <div class="col-6"><a href=""><button class="btn" style="background: #ffffff;color: black;border: black solid 2px;"> <i class="fa fa-cc-stripe"></i><span style="font-size: 18px;font-family: sans-serif;"> Pay with Venmo</span></button></a></div> 
       </div>
      </div>
<!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
-->
    </div>
  </div>
</div>



<!-- Container -->
<div class="row">
    <div class="col-12">
        <div class="container-fluid invoice-container">
  <!-- Header -->
  <header>
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
      <img id="logo" src="images/foodlogo.png" height="100px" title="Koice" alt="Koice">
    </div>
    
  </div>
  <hr>
  </header>
  
  <!-- Main Content -->
  <main>
  <div class="row">
    <div class="col-sm-6"><strong>Date:</strong> <?php echo date('d-m-Y')?></div>
<!--    <div class="col-sm-6 text-sm-right"> <strong>Invoice No:</strong> 16835</div>-->
	  
  </div>
  <hr>
  <div class="card">
    <div class="card-body px-2">
      <div class="table-responsive">
        <img src="images/venmo.jpeg" alt="" style="height: 100%;">
      </div>
      
    </div>
    <center><a href="https://dailydietsd.com/">Go back to home</a></center>
  </div>
  </main>

</div>
    </div>

</div>
<script>
alert('kindly make a venmo payment to confirm your order');    
</script>
</body></html>
<?php 


$data_array = $_SESSION['data'];
$data_string = "";
foreach($data_array as $data){
    $data_string .= "$data[0]_$data[1]_$data[2]_$data[3] *";
}
//echo $data_string;



    $query  = "INSERT INTO `user_data` (`user_id`, `fname`, `lname`, `email`, `mobile_number`, `street_name`, `unit_apt`, `city`, `zipcode`,`additional_ins`, `days`, `tiffinbox_quantity`, `data`, `payment_method`, `order_timing`, `order_paused`) VALUES (NULL, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
$result = $con->prepare($query);
$result->execute([$_SESSION['fname'],$_SESSION['lname'],$_SESSION['email'],$_SESSION['mobile_number'],$_SESSION['street_name'],$_SESSION['unit_apt'],$_SESSION['city'],$_SESSION['zipcode'],$_SESSION['additional_ins'],$_SESSION['days'],1,$data_string,"Venmo", date('Y-m-d H:i:s'), 'false']);
    
    $total = $_SESSION['total'];
    
//    $total_paid = isset($_SESSION['after_coupon'])? $_SESSION['after_coupon'] : $total+($total * 7.5/100);
    
    $msg = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Daily Diets</title>
    </head>
    <body>
    <div style="margin: 25px;">
    <img src="https://codeyourbusiness.site/tiffinbox/checkout/images/foodlogo.png" alt="logo" style="height: 80px">
    <br><br>
    <div>
    <strong>Order Date:</strong> '.date('d-m-Y').'
    <br><br>
        Customer Information : <br>
        Name  : '.$_SESSION['fname'].' '.$_SESSION['lname'].' <br>
        Phone : '.$_SESSION['mobile_number'].' <br>
        Email : '.$_SESSION['email'].' <br>
        Address: '.$_SESSION['unit_apt'].' '.$_SESSION['street_name'].' '.$_SESSION['city'].' '.$_SESSION['zipcode'].' <br>
        Additional Info : '.$_SESSION['additional_ins'].' <br>
        <br><br>
        Order Summary
        <br><br>
        <table border="1" style="border: 1px solid black;border-collapse: collapse;">
            <thead>
          <tr>
            <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;"><strong>Items</strong></td>
            <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;"><strong>Rate</strong></td>
			<td style="border: 1px solid black;border-collapse: collapse;padding: 15px;"><strong>QTY</strong></td>
            <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;"><strong>Amount</strong></td>
          </tr>
        </thead>
                  <tbody>';
           
         
                    for($i=0;$i<count($_SESSION['data']);$i++){
                    $msg .= '<tr>
                    <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;">'.$_SESSION['data'][$i][0].'</td>
                    <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;">'.$_SESSION['data'][$i][1].'</td>
                    <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;">'.$_SESSION['data'][$i][2].'</td>
                    <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;">$'.$_SESSION['data'][$i][3].'</td>
                    </tr>';
                    }
              

              
       $msg .='<tr>
              <td colspan="3"  style="border: 1px solid black;border-collapse: collapse;padding: 15px;"><strong>Delivery Charges:</strong></td>
              <td  style="border: 1px solid black;border-collapse: collapse;padding: 15px;">'.$_SESSION['delivery_charges'].'</td>
            </tr>

            <tr>
              <td colspan="3" style="border: 1px solid black;border-collapse: collapse;padding: 15px;"><strong>Sub Total:</strong></td>
              <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;">
              $ '.$total.'</td>
            </tr>
            <tr style="border: 1px solid black;border-collapse: collapse;padding: 15px;">
              <td colspan="3" style="border: 1px solid black;border-collapse: collapse;padding: 15px;"><strong>Tax:</strong></td>
              <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;">7.75%</td>
            </tr>
            <tr>
              <td colspan="3" style="border: 1px solid black;border-collapse: collapse;padding: 15px;"><strong>Total:</strong></td>
              <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;">$ '.($total+($total) * 7.5/100).' </td>
            </tr>';
    if(isset($_SESSION['after_coupon'])){
        $msg .='<tr>
              <td colspan="3" style="border: 1px solid black;border-collapse: collapse;padding: 15px;"><strong>After Coupon Applied:</strong></td>
              <td style="border: 1px solid black;border-collapse: collapse;padding: 15px;">$ '.$_SESSION['after_coupon'].'</td>
            </tr>';
    }
            
          $msg .= '</tbody>
        </table>';
        $msg .='<br><br><div class="form-group">
                    <label class="form-control-label">Delievery Dates</label>
                    <ol>';
                       $days = explode(',',$_SESSION['days']);
                         foreach($days as $day){
                        $msg .='<li>'.$day.'</li>';
                    }
                       
                                        $msg .='</ol>
                  </div>';
        
        $msg .='<br>
        Thank You for Choosing Daily Diet <br><br>
        Home Taste Food from Professional Kitchen !! <br><br>
        Refer Your Friend & Family to win 100 $ gift card and more <br><br>
    </div>
    </div>
    </body>
    </html>';
    
//    echo $msg;

// php curl request for mail service
$params = ['user_email'=>$_SESSION['email'],'msg'=>$msg];
$defaults = array(CURLOPT_URL=>"https://codeyourbusiness.site/tiffinbox/mail_service.php",
                 CURLOPT_POST=>true,
                 CURLOPT_POSTFIELDS=>$params,
                 CURLOPT_RETURNTRANSFER=>true);
$ch = curl_init();
curl_setopt_array($ch,$defaults);
$result = curl_exec($ch);
echo $result;
curl_close($ch);



    // Create a message

// Create the Transport
//$transport = (new Swift_SmtpTransport('dailydietsd.com', 25))
//  ->setUsername('order@dailydietsd.com')
//  ->setPassword('ashu0786');
//
//// Create the Mailer using your created Transport
//$mailer = new Swift_Mailer($transport);
//    $message = (new Swift_Message('Order Summary'))
//  ->setFrom(['order@dailydietsd.com'])
//  ->setTo([$_SESSION['email'],'dailydietsd@gmail.com'])
//  ->setBody($msg, 'text/html');
//
//// Send the message
//$result = $mailer->send($message, 'text/html');
    
    
    
//    if (!$mailer->send($message, $failures))
//{
//  echo "Failures:";
//  print_r($failures);
//}
// else{
//         echo "i think its working";
//     }
    
    
    

?>
