<?php 
// Include configuration file 
include_once 'pay_pal_integration/config.php'; 
 
// Include database connection file 
include_once 'pay_pal_integration/dbConnect.php'; 
?>
<?php include 'db.php' ?>
<?php  

session_start();?>
<?php date_default_timezone_set('America/Los_Angeles')?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/foodlogo.png" rel="icon" />
<title>Daily Diet</title>
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
======================= -->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    @media screen and (max-width: 767px) {
        .table-responsive>.table>tbody>tr>td,
        .table-responsive>.table>tbody>tr>th,
        .table-responsive>.table>tfoot>tr>td,
        .table-responsive>.table>tfoot>tr>th,
        .table-responsive>.table>thead>tr>td,
        .table-responsive>.table>thead>tr>th {
            white-space: pre-wrap;
        }
}

[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    width: 100%;
}
</style>  
  
</head>
<body>

<!-- Modal -->
<!--
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Payment Method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
-->



<!-- Container -->
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="container-fluid invoice-container">
  <!-- Header -->
  <header>
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
      <img id="logo" src="images/foodlogo.png" height="100px" title="Koice" alt="Koice" />
    </div>
    <div class="col-sm-5 text-center text-sm-right">
      <h4 class="mb-0">Order Summary</h4>
    </div>
  </div>
  <hr>
  </header>
  
  <!-- Main Content -->
  <main>
  <div class="row">
    <div class="col-sm-6"><strong>Date:</strong> <?php echo date('d/m/y') ?></div>
	  
  </div>
  <hr>
  <div class="card">
    <div class="card-body px-2">
      <div class="table-responsive">
        <table class="table">
         <thead>
          <tr>
            <td class="col-3 border-0"><strong>Items</strong></td>
            <td class="col-4 border-0"></td>
            <td class="col-2 text-center border-0"><strong>Rate</strong></td>
			<td class="col-1 text-center border-0"><strong>QTY</strong></td>
            <td class="col-2 text-right border-0"><strong>Amount</strong></td>
          </tr>
        </thead>
          <tbody>
           
           <?php
                    for($i=0;$i<count($_SESSION['data']);$i++){
                    echo '<tr>
                    <td class="col-3 border-0">'.$_SESSION['data'][$i][0].'</td>
                    <td class="col-2 border-0"></td>
                    <td class="col-2 text-center border-0">'.$_SESSION['data'][$i][1].'</td>
                    <td class="col-3 text-center border-0"  style="white-space: nowrap;">'.$_SESSION['data'][$i][2].'</td>
                    <td class="col-2 text-right border-0">$'.$_SESSION['data'][$i][3].'</td>
                    </tr>';
                    }
              
              
              
              ?>
<!--
       <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Tiffinbox Quantity:</strong></td>
              <td class="bg-light-2 text-right"><?php// echo $_SESSION['tiffinbox_quantity'] ?></td>
            </tr>
-->
            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Delivery Charges:</strong></td>
              <td class="bg-light-2 text-right">$<?php echo $_SESSION['delivery_charges'] ?></td>
            </tr>

            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Sub Total:</strong></td>
              <td class="bg-light-2 text-right">
              $<?php 
        echo $total = $_SESSION['total'];?></td>
            </tr>
            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Tax:</strong></td>
              <td class="bg-light-2 text-right">7.75%</td>
            </tr>
            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Total:</strong></td>
              <td class="bg-light-2 text-right">$<?php echo $total+($total) * 7.5/100;?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <form action="#" method="post">
      <div class="row">
         <!--<div class="col-6"></div>-->
         
             <div class="col-sm-6">
              <input type="text" name="code" id="coupon_code" class="form-control" required placeholder="Coupon Code">
          </div>
          <div class="col-sm-6">
              <button type="submit" name="submit" class="btn btn-primary" id="apply_coupon">Apply</button>
          </div>
         
          
      </div>
      </form>
      
      <br>
      <?php
          if(isset($_POST['submit'])){
              $code = $_POST['code'];
              
              $query = "SELECT * FROM `coupon` WHERE `code`=? and `deactivated_on`=?";
              $result = $con->prepare($query);
              $result->execute([$code,'0000-00-00 00:00:00']);
              $data = $result->fetch();
              $count = $result->rowCount();
              if($count){
                  echo "<p class='text-right' style='color: green;'>Applied Coupon Successfully</p>";
                  $total = $total+($total * 7.5/100);
                  $total = $total - $total * (int)$data->discount/100;
                  echo '<div class="table-responsive">
        <table class="table">
             <tbody>
              <td class="bg-light-2 text-right"> <b>Total : </b> $'.$total.'</td>
            </tr>
          </tbody>
        </table>
      </div>';
                  $_SESSION['after_coupon'] = $total;
              }else{
                  echo "<p class='text-right' style='color: red;'>Applied Coupon is Expired or Invalid</p>";
              }
          }
           
          
          ?>
      
      <center><input type="checkbox" id="terms_conditions"> I agree <a href="https://codeyourbusiness.site/food/privacy-policy/" target="_blank">Terms and conditions</a></center>
      <br>
      <center><button class="btn btn-primary" id="order_now" disabled>Order Now</button></center>
      <br><br>
      <div class="row" id="pay_div" style="display:none">
           <div class="col-6"><!-- PayPal payment form for displaying the buy button -->
                <form action="<?php echo PAYPAL_URL; ?>" method="post">
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
					
                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">
					
                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="Tiffin Box">
                    <input type="hidden" name="item_number" value="1">
                    <input type="hidden" name="amount" value="<?php echo isset($count)? $total : $total+($total * 7.5/100)?>">
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
					
    <input type="hidden" name="return" value=<?php echo PAYPAL_RETURN_URL?>>
                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
					
                    <!-- Display the payment button. -->
                    <input type="image" name="submit" border="0" src="images/pay_card.png" style="width:100%">
                </form></div>
          
          
    <div class="col-6"><a href="pay_with_venmo.php"><button class="btn" style="background: #ffffff;color: black;border: black solid 2px;height: 66px;width: 260px;font-size: 25px;border-radius: 50px;"> <i class="fa fa-cc-stripe"></i><span style="font-size: 25px;font-family: sans-serif;"> Pay with Venmo</span></button></a></div> 
       </div>
    </div>
  </div>
  </main>

</div>
    </div>
    <div class="col-md-6 col-sm-12" style="height: 100vh;">
       
        <div class="container-fluid">
            <img src="../img/3860345.jpg" alt="" style="width: 100%;">
        </div>
    </div>
    
    
</div>

<script>
    $('#terms_conditions').change(function(){
        if($('#terms_conditions').is(':checked')){
           $("#order_now").removeAttr("disabled");
           }else{
              $("#order_now").attr("disabled",""); 
           }
    });
    $('#order_now').click(function(){
        $('#pay_div').css('display','flex');
    });
</script>

</body>

</html>