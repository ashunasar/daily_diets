<?php  include 'includes/header.php'?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
     
      <div class="row">
       <div class="col-xl-12 order-xl-1">
          
            <?php
                $query  = "SELECT * FROM `user_data` WHERE `order_paused`='false'";
                $result =$con->prepare($query);
                $result->execute();
                $today = date('d-m-Y');

                while($user_data = $result->fetch()){
                if(is_numeric(strpos($user_data->days,$today))){
                echo '<div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">User profile </h3>
                </div>
              </div>
            </div><div class="card-body">
                <form>
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
                </div>';

                echo '
                </div>
                </form>
                </div></div></div>';

                }

                }
              
              ?>
        
      </div>

    </div>
<?php include 'includes/footer.php' ?>