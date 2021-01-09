<?php session_start();?>
<?php include '../db.php' ?>
 <?php 
ini_set('max_execution_time', 300);
require_once '../../mail/vendor/autoload.php'; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
</head> 
<body>
    <h1>Your Order Booked Succesfully!</h1>
    <h3>redirecting you to home page</h3>
    <h3>do not cancel or go back</h3>
    <h3>this browser will redirect you automatically</h3>
    
   <?php 
$data_array = $_SESSION['data'];
$data_string = "";
foreach($data_array as $data){
    $data_string .= "$data[0]_$data[1]_$data[2]_$data[3] *";
}
//echo $data_string;



    $query  = "INSERT INTO `user_data` (`user_id`, `fname`, `lname`, `email`, `mobile_number`, `street_name`, `unit_apt`, `city`, `zipcode`,`additional_ins`, `days`, `tiffinbox_quantity`, `data`, `payment_method`, `order_timing`, `order_paused`) VALUES (NULL, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
$result = $con->prepare($query);
$result->execute([$_SESSION['fname'],$_SESSION['lname'],$_SESSION['email'],$_SESSION['mobile_number'],$_SESSION['street_name'],$_SESSION['unit_apt'],$_SESSION['city'],$_SESSION['zipcode'],$_SESSION['additional_ins'],$_SESSION['days'],1,$data_string,"Pay Pal", date('Y-m-d H:i:s'), 'false']);
    
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
    // Create a message

// Create the Transport
$transport = (new Swift_SmtpTransport('dailydietsd.com', 25))
  ->setUsername('order@dailydietsd.com')
  ->setPassword('ashu0786');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('Order Summary'))
  ->setFrom(['order@dailydietsd.com'])
  ->setTo([$_SESSION['email'],'dailydietsd@gmail.com'])
  ->setBody($msg, 'text/html');

// Send the message
$result = $mailer->send($message, 'text/html');
    
    
    
//    if (!$mailer->send($message, $failures))
//{
//  echo "Failures:";
//  print_r($failures);
//}
// else{
//         echo "i think its working";
//     }
    
    
//    
//    if (!$mailer->send($message, $failures))
//{
//  echo "Failures:";
//  print_r($failures);
//}
       echo "<script>setTimeout(function(){window.location='https://dailydietsd.com'},1000)</script>";
    


?>
</body>
</html>