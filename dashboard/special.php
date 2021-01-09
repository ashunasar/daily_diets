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
                  <h3 class="mb-0">Special Meal</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="#" method="post">
                <h6 class="heading-small text-muted mb-4">Create Meal</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Meal Name</label>
                        <input type="text" name="name" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Price</label>
                        <input type="number" name="price" min="1" class="form-control" required>
                      </div>
                    </div>
<!--
                    <div class="col-lg-4">
                      <div class="form-group">
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary">Create Meal</button>
                      </div>
                    </div>
-->
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Min Date</label>
                        <input type="date" name="min_date" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Max Date</label>
                        <input type="date" name="max_date" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary">Create Meal</button>
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
                    <th scope="col">Meal Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Min Date</th>
                    <th scope="col">Max Date</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                 <?php

                $query  = "SELECT * FROM `special_meal`";
                $result =$con->prepare($query);
                $result->execute();
                
                  while($meal = $result->fetch()){
                      echo '<tr>
                    <th scope="row">
                    '.$meal->name.'
                    </th>
                    <td>
                     '.$meal->price.'
                    </td>
                    <td>
                     '.$meal->min_date.'
                    </td>
                    <td>
                     '.$meal->max_date.'
                    </td>
                    <td>
                     <a href="special.php?delete='.$meal->id.'"><button class="btn btn-danger">Delete</button></a>
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
       $name     = $_POST['name'];
       $price    = $_POST['price'];
       $min_date    = $_POST['min_date'];
       $max_date    = $_POST['max_date'];
       
       $query = "INSERT INTO `special_meal` (`id`, `name`, `price`, `min_date`, `max_date`) VALUES (NULL, ?, ?, ?, ?)";
       $result = $con->prepare($query);
       $result->execute([$name,$price,$min_date,$max_date]);
       ?>
       <script>
       window.location= 'special.php'; 
       </script>
       <?php
   }
   ?>
   <?php 
   if(isset($_GET['delete'])){
       $id     = $_GET['delete'];
       $query  = "DELETE FROM `special_meal` WHERE `special_meal`.`id` = ?";
       $result = $con->prepare($query);
       $result->execute([$id]);
       ?>
       <script>
       window.location= 'special.php'; 
       </script>
       <?php
   }
   ?>
<?php include 'includes/footer.php' ?>