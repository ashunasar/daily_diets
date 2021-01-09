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
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Users</h3>
                </div>
<!--
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
-->
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php

                $query  = "SELECT * FROM `user_data` ORDER BY order_timing DESC";
                $result =$con->prepare($query);
                $result->execute();
                
                  while($user_data = $result->fetch()){
                      echo '<tr>
                    <th scope="row">
                    '.$user_data->fname.'
                    </th>
                    <td>
                     '.$user_data->lname.'
                    </td>
                    <td>
                      '.$user_data->email.'
                    </td>
                    <td>
                     '.$user_data->mobile_number.'
                    </td>
                    <td>
                     <a href="user_details.php?user_id='.$user_data->user_id.'"><button class="btn btn-primary">View</button></a>
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
<?php include 'includes/footer.php' ?>