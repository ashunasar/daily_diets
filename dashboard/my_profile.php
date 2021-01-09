<?php  include 'includes/header.php'?>
    <!-- Header -->
    <?php 
if(!isset($_COOKIE['email'])){
    ?>
    <script>alert("Please Register or Login to proceed with your Order")</script>
    <script>window.location = '../user/login.php?return_to=<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>'</script>
    <?php
}

?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            
                    <div>
                      <a href="https://dailydietsd.com/"><i class="fas fa-home" style="color: white;font-size: 25px;"></i></a>
                      <a href="https://dailydietsd.com/"><span style="color: white;font-size: 24px;">Home</span></a>
                    </div>
                 
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
     
      <div class="row">
       <div class="col-xl-12 order-xl-1">
         <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">User profile </h3>
                </div>
              </div>
            </div>
            <style>
                .sidenav{
                    display: none;
                }
             </style>
            <?php
              $email = $_COOKIE['email'];
              $query  = "SELECT * FROM `user` WHERE `email` = ?";
              $result =$con->prepare($query);
              $result->execute([$email]);
              $user = $result->fetch();
              

              echo '<div class="card-body">
              <form action="#" method="post">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Mobile Number</label>
                        <input type="number" id="input-username" class="form-control"  name="mobile" value='.$user->mobile.'>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" disabled value='.$user->email.'>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Referred By</label>
                        <input type="text" id="input-first-name" class="form-control" disabled value='.$user->referred_by.'>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">My Referral Code</label>
                        <input type="text" id="input-last-name" class="form-control" disabled  value='.$user->refer_code.'>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control"  name="fname" value='.$user->fname.'>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control"  name="lname" value='.$user->lname.'>
                      </div>
                    </div>
                  </div>';
                  ?>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <button type="submit" name="update_profile" class="btn btn-primary">Update My Profile</button>
                      </div>
                    </div>
                  </div>
                  <?php
                echo
                    '</div>
              </form>
            </div>';
?>
            
            
          </div>
          <?php
           
           
           
           if(isset($_POST['update_profile'])){
               $mobile = $_POST['mobile'];
               $fname  = $_POST['fname'];
               $lname  = $_POST['lname'];
               $email  = $_COOKIE['email'];
               $query = "UPDATE `user` SET`fname`=?,`lname`=?,`mobile`=? WHERE `email`=?";
               $result = $con->prepare($query);
               $result->execute([$fname,$lname,$mobile,$email]);
               ?>
               <script>alert("Profile Updated")</script>
               <script>location = 'my_profile.php'</script>
               <?php
           }
           ?>
          <?php
              $email = $_COOKIE['email'];
              $query  = "SELECT * FROM `user_data` WHERE `email` = ? ORDER BY `order_timing` DESC";
              $result =$con->prepare($query);
              $result->execute([$email]);
//              $user_data = $result->fetchAll();
              $count = $result->rowCount();
              if($count){
                  foreach($result->fetchAll() as $user_data){
                      $delivery_days = explode(',',$user_data->days);
//                      echo date($delivery_days[count($delivery_days) - 1]);
//                      echo "<br>";
//                      echo date('d-m-Y');
                      if(strtotime(date($delivery_days[count($delivery_days) - 1])) >= strtotime(date('d-m-Y'))){
                          echo '<div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Order Details </h3>
                </div>
              </div>
            </div><div class="card-body">
        
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Mobile Number</label>
                        <input type="text" id="input-username" class="form-control" disabled value='.$user_data->mobile_number.'>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" disabled value='.$user_data->email.'>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control" disabled value='.$user_data->fname.'>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control" disabled value='.$user_data->lname.'>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <textarea id="input-address" class="form-control" disabled> '.$user_data->street_name.',&#13;&#10; '.$user_data->unit_apt.'</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>';
//                        <input type="text" id="input-city" class="form-control" placeholder="City"  disabled value='.$user_data->city.'>
?>
                        <input type="text" id="input-city" class="form-control" placeholder="City"  disabled value='<?php echo $user_data->city ?>'>
                        <?php
                      echo '</div>
                    </div>
                    
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Zip code</label>
                        <input type="text" id="input-postal-code" class="form-control" disabled value='.$user_data->zipcode.'>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Tiffin Box Quantity</label>
                        <input type="text" id="input-postal-code" class="form-control" disabled value='.$user_data->tiffinbox_quantity.'>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Additional Instruction</label>
                        <textarea id="input-address" class="form-control" disabled>'.$user_data->additional_ins.'</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Payment Method</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                      <label class="form-control-label"><b>'.$user_data->payment_method.'</b></label>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Orders</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Order List</label>
                    <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Rate</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Total Amount</th>
                   
                  </tr>
                </thead>
                <tbody>';
                $orders = explode('*',$user_data->data);
                for($i =0;$i<sizeof($orders)-1;$i++){
                    echo '<tr>';
                    $order_data = explode('_',$orders[$i]);
                    foreach($order_data as $data){
                        echo '<td>'.$data.'</td>';
                    }
                    echo '</tr>';
                }
                
//              echo '<tr><th scope="row">Asim</th><td>Siddiqui</td><td>asim@gmail.com</td><td>+917011253870</td></tr>';
              echo '
                 
                </tbody>
              </table>
            </div>
                  </div>
                </div>
                
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Delivery</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Delievery Dates</label>
                    <ol>';
                       $days = explode(',',$user_data->days);
                         foreach($days as $day){
                        echo '<li>'.date('d-m-Y',strtotime($day)).'</li>';
                    }
                       
                    echo '</ol>
                  </div>';
                  if($user_data->order_paused !="false"){
                      echo '<div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        Your Order is Paused From '.$user_data->order_paused.'
                      </div>
                    </div>
                     </div>';
                  }else{
                      $start_date = (date_format(date_create($days[0]),'Y-m-d') > date('Y-m-d'))?date_format(date_create($days[0]),'Y-m-d'):date('Y-m-d');
                      echo '<form action="#" method="post">
                      <div class="row" id="order_id'.$user_data->user_id.'" style="display:none">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Start Date</label>
                        <input type="date" min="'.$start_date.'" max="'.date_format(date_create($days[count($days) -1]),'Y-m-d').'" name="start_date" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Stop Date</label>
                        <input type="date" min="'.$start_date.'" max="'.date_format(date_create($days[count($days) -1]),'Y-m-d').'" name="end_date"  class="form-control check">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                       <input type="text" hidden value="'.$user_data->user_id.'" name="user_id"> 
                       <label class="form-control-label" for="input-username">Stop My Order</label>
                        <button type="submit" name="pause_order" class="btn btn-primary form-control">Stop</button>
                      </div>
                    </div>
                    </form>
                     </div>
                      <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                       <input type="text" hidden value="'.$user_data->user_id.'" name="user_id"> 
                        <button id="btn'.$user_data->user_id.'" type="submit" name="pause_order" class="btn btn-primary" >Stop</button>
                      </div>
                    </div>
                     </div>
                     
                     <script>
                      $("#btn'.$user_data->user_id.'").click(function(){
                          $("#order_id'.$user_data->user_id.'").css("display","block");
                          $("#btn'.$user_data->user_id.'").css("display","none");
                      });
                     </script>
                     ';
                  }
                  
                  echo '
                </div>
              
            </div></div>';
                      }
                      
                  }
              }
              
              
              ?>
              
        </div>
      </div>

    </div>
    
    <?php 
//$days_array = $days;
//$start_day  = $_POST['start_date'];
//$end_day    = $_POST['end_date'];
//$new_days = [];
//$count_days = 0;
//for($i = 0;$i<count($days_array);$i++){
//if(date('d-m-Y',strtotime($days_array[$i])) == date('d-m-Y',strtotime($start_day))){
//    ++$count_days;
//}elseif(date('d-m-Y',strtotime($days_array[$i])) == date('d-m-Y',strtotime($end_day))){++$count_days;}
//    else{
//    if(date('d-m-Y',strtotime($days_array[$i])) > date('d-m-Y',strtotime($start_day)) && date('d-m-Y',strtotime($days_array[$i])) < date('d-m-Y',strtotime($end_day))){
//        ++$count_days;
//    }
//}
//    if(date('d-m-Y',strtotime($days_array[$i])) < date('d-m-Y',strtotime($start_day)) ){
//        array_push($new_days,$days_array[$i]);}
//    if(date('d-m-Y',strtotime($days_array[$i])) > date('d-m-Y',strtotime($end_day)) ){
//        array_push($new_days,$days_array[$i]);}}
//$end_date = $end_day;
//$i = 1; 
//while($i<=100){
//     $date = date('d-m-Y', strtotime("+$i day", strtotime($end_date)));
//    if(!(date('w', strtotime($date)) == 6 || date('w', strtotime($date)) == 0)){
//        array_push($new_days,$date);
//        if(count($days_array) == count($new_days)){
//            break;
//        }
//    }
//    $i++;
//}
//
//$days = '';
//for($i = 0;$i<count($new_days);$i++){
//    $days .=$new_days[$i];
//    $days .= ($i == count($new_days) -1 )? '' : ',';
//}
     ?>
    
    
    <?php 
if(isset($_POST['pause_order'])){

    $email = $_COOKIE['email'];
    $user_id = $_POST['user_id'];
    
$days_array = $days;
    print_r($days_array);
    echo "<br>";
echo $start_day  = date('d-m-Y',strtotime($_POST['start_date']));
     echo "<br>";
echo $end_day    = date('d-m-Y',strtotime($_POST['end_date']));
     echo "<br>";
$new_days = [];
$count_days = 0;
for($i = 0;$i<count($days_array);$i++){
if(date('d-m-Y',strtotime($days_array[$i])) == date('d-m-Y',strtotime($start_day))){
    ++$count_days;
}elseif(date('d-m-Y',strtotime($days_array[$i])) == date('d-m-Y',strtotime($end_day))){++$count_days;}
    else{
    if(date('d-m-Y',strtotime($days_array[$i])) > date('d-m-Y',strtotime($start_day)) && date('d-m-Y',strtotime($days_array[$i])) < date('d-m-Y',strtotime($end_day))){
        ++$count_days;
    }
}
    if(date('d-m-Y',strtotime($days_array[$i])) < date('d-m-Y',strtotime($start_day)) ){
        array_push($new_days,$days_array[$i]);}
    if(date('d-m-Y',strtotime($days_array[$i])) > date('d-m-Y',strtotime($end_day)) ){
        array_push($new_days,$days_array[$i]);}}
$end_date = $end_day;
$i = 1; 
while($i<=100){
     $date = date('d-m-Y', strtotime("+$i day", strtotime($end_date)));
    if(!(date('w', strtotime($date)) == 6 || date('w', strtotime($date)) == 0)){
        array_push($new_days,$date);
        if(count($days_array) == count($new_days)){
            break;
        }
    }
    $i++;
}

$days = '';
for($i = 0;$i<count($new_days);$i++){
    $days .=$new_days[$i];
    $days .= ($i == count($new_days) -1 )? '' : ',';
}
    
    
    
    $query = "UPDATE `user_data` SET `days` = ? WHERE `email`=? and user_id=?";
    $result = $con->prepare($query);
    $result->execute([$days,$email,$user_id]);
    print_r($days);
    ?>
<!--    <script>alert("Order Paused For this Meal Plan")</script>-->
    <script>location = 'my_profile.php'</script>
    <?php
}


?>
    
    
<?php include 'includes/footer.php' ?>