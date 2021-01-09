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
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Coupons</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="#" method="post">
                <h6 class="heading-small text-muted mb-4">Create Coupon</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Coupon Code</label>
                        <input type="text" name="code" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Discount(%)</label>
                        <input type="number" name="discount" min="1" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary">Create Coupon</button>
                      </div>
                    </div>
                  </div>
                 
                </div>
                <hr class="my-4">
              </form>
              <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Coupon Code</th>
                    <th scope="col">Discount(%)</th>
                    <th scope="col">Status</th>
                    <th scope="col">Deactivate</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                 <?php

                $query  = "SELECT * FROM `coupon`";
                $result =$con->prepare($query);
                $result->execute();
                
                  while($coupon = $result->fetch()){
                      echo '<tr>
                    <th scope="row">
                    '.$coupon->code.'
                    </th>
                    <td>
                     '.$coupon->discount.'
                    </td>';
                      if($coupon->deactivated_on == "0000-00-00 00:00:00"){
                          echo "<td style='color:green;'>Active</td>";
                      }else{echo "<td style='color:red;'>Expired</td>";}
                    
                    echo '<td>
                     <a href="coupon.php?deactivate='.$coupon->coupon_id.'"><button class="btn btn-primary">deactivate</button></a>
                    </td>
                    <td>
                     <a href="coupon.php?delete='.$coupon->coupon_id.'"><button class="btn btn-danger">Delete</button></a>
                    </td>
                  </tr>';
                  }
                    
                    ?>

                 
                </tbody>
              </table>
            </div>
            </div>            
            
          </div>
        </div>
      </div>
    </div>
    
    <?php 
   if(isset($_POST['submit'])){
       $code     = $_POST['code'];
       $discount = $_POST['discount'];
       
       $query = "INSERT INTO `coupon` (`coupon_id`, `code`, `discount`, `created_on`, `deactivated_on`) VALUES (NULL, ?, ?, current_timestamp(), '0000-00-00 00:00:00.000000')";
       $result = $con->prepare($query);
       $result->execute([$code,$discount]);
       ?>
       <script>
       window.location= 'coupon.php'; 
       </script>
       <?php
   }
   ?>
   <?php 
   if(isset($_GET['deactivate'])){
       $id     = $_GET['deactivate'];
       $query  = "UPDATE `coupon` SET `deactivated_on` = ? WHERE `coupon`.`coupon_id` = ?";
       $result = $con->prepare($query);
       $result->execute([date('Y-m-d H:i:s'),$id]);
       ?>
       <script>
       window.location= 'coupon.php'; 
       </script>
       <?php
   }
   ?>
   <?php 
   if(isset($_GET['delete'])){
       $id     = $_GET['delete'];
       $query  = "DELETE FROM `coupon` WHERE `coupon`.`coupon_id` = ?";
       $result = $con->prepare($query);
       $result->execute([$id]);
       ?>
       <script>
       window.location= 'coupon.php'; 
       </script>
       <?php
   }
   ?>
<?php include 'includes/footer.php' ?>