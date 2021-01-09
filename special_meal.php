<?php include 'checkout/db.php'?>
<?php 
if(!isset($_COOKIE['email'])){
    ?>
    <script>alert("Please Register or Login to proceed with your Order")</script>
    <script>window.location = 'user/login.php?return_to=<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>'</script>
    <?php
}

 if(!isset($_GET['title']) || !isset($_GET['days'])){
     ?>
     <script>location = "https://dailydietsd.com"</script>
     <?php
 }

?>
<?php date_default_timezone_set('America/Los_Angeles')?>
<?php session_start();
session_destroy(); session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="checkout/images/foodlogo.png" rel="icon" />
<title>Daily Diet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<style>
    .input{
        opacity: 0;
    }
    .bgColored1,.bgColored2,.bgColored3{
            color: white;
    margin: 20px;
    border: 2px solid white;
    text-align: center;
    font-size: 15px;
    padding: 15px;
    font-family: cursive;
        border-radius: 7px;
    }
    .select{
    height: 40px;
    background: #ed2433;
    border: none;
    border-radius: 7px;
    color: white;
    padding-left: 10px;
    text-align: center;
    padding-right: 10px;
    }
    
    .date {
/*
    position: relative;
    width: 150px; height: 20px;
    color: white;
        
*/
    position: relative;
    width: 150px;
    color: white;
    height: 40px;
    background: #ed2433;
    border: none;
    border-radius: 7px;
    padding-left: 10px;
    text-align: center;
    padding-right: 10px;
}

.date:before {
/*    position: absolute;*/
/*    top: 3px; left: 10px;*/
    content: attr(data-date);
/*
    display: inline-block;
    color: white;
*/
    
}

.date::-webkit-datetime-edit, .date::-webkit-inner-spin-button, .date::-webkit-clear-button {
    display: none;
}

.date::-webkit-calendar-picker-indicator {
    position: absolute;
    top: 3px;
    right: 0;
    color: black;
    opacity: 1;
}
    
/*    checkbox css*/
    .box {
  background: #666666;
  color: #ffffff;
  width: 250px;
  padding: 10px;
  margin: 1em auto;
}
p {
  margin: 1.5em 0;
  padding: 0;
}
input[type="checkbox"] {
  visibility: hidden;
}
label {
  cursor: pointer;
}
input[type="checkbox"] + label:before {
  border: 1px solid #fff;
  content: "\00a0";
  display: inline-block;
  font: 16px/1em sans-serif;
  height: 16px;
  margin: 0 .25em 0 0;
  padding: 0;
  vertical-align: top;
  width: 16px;
}
input[type="checkbox"]:checked + label:before {
  background: #ed2433;
  color: #fff;
  content: "\2713";
  text-align: center;
}
input[type="checkbox"]:checked + label:after {
  font-weight: bold;
}

input[type="checkbox"]:focus + label::before {
    outline: rgb(59, 153, 252) auto 5px;
}
    
    
/*   drop down css for checkbox items*/
    .checkBox_dropdown{
    height: 30px;
    background: #ed2433;
    border: none;
    border-radius: 5px;
    color: white;
    padding-left: 10px;
    text-align: center;
    padding-right: 10px;
    }
    .checkBox_label{
      position: absolute;
    color: #fff;
    margin-top: 18px;
    font-size: 30px;
    font-weight: bold;
    }
    
    </style>

</head>

<body style="background: url(img/image0.jpeg);
    min-height: 780px;
    margin-top: 55px;
    background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    -ms-background-size: cover;
    -webkit-background-size: cover;
    background-repeat: repeat-x;
    background-attachment: fixed;">
    
    <form action="#" method="post" id="myForm" autocomplete="on">
<div class="container">

<input type="hidden" value="1" id="hidden_date" name="hidden_date">

<h3><font color="#ffffff"><?php echo $_GET['title']?></font></h3>
<div>
<h3><font color="#ffffff">Select Date</font></h3>

<?php $title  = $_GET['title'];
         $query  = "SELECT * FROM `special_meal` WHERE `name`=?";
    $result = $con->prepare($query);
    $result->execute([$title]);
    $data = $result->fetch();
    if($result->rowCount() == 1){
    ?>
    <input type="date" id="date" data-date="" data-date-format="DD MMMM YYYY" min="<?php echo $data->min_date?>" max="<?php echo $data->max_date?>" class="date" name="selected_date" required>
    <?php
    }else{
         ?>
         <script>
             alert("Something Went Wrong!");
location = 'https://dailydietsd.com/';
 </script>
         <?php
    }
    
    ?>
 


</div>
<br>
<div>
<h3><font color="#ffffff">Quantity of <?php echo $_GET['title']?></font></h3>
 <select name="meal_quantity" class="select" required>
     <option value="" disabled selected>Select Quantity</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
     <option value="10">10</option>
 </select>
</div>
<br>
<!-- start of option-->
    <p>
    <input type="checkbox" id="extra_item" name="extra_item">
    <label class="checkBox_label" for="extra_item" style="font-size: 30px;font-weight: bold;"></label>
<span style="font-size: 30px;color: white;font-weight: bold;margin-left: 33px;">Would you like to add extra Roti or Sabji</span>
    </p>
<div id="contain_extra_item" style="display:none">
    <div>
<h3><font color="#ffffff">No. Of Roti</font></h3>
 <select name="roti_quantity" id="" class="select">
     <option selected value="0">Select  Extra Roti</option>
     <option value="10">Pack of 10 Roti</option>
     <option value="20">Pack of 20 Roti</option>
     <option value="30">Pack of 30 Roti</option>
     <option value="50">Pack of 50 Roti</option>
 </select>
  <select name="roti_category" id="" class="select">
     <option selected disabled value="Whole Wheat Roti">Type of Roti</option>
     <option value="Whole Wheat Roti">Whole Wheat Roti</option>
     <option value="Multigrain Roti">Multigrain Roti</option>
     <option value="Bhakri (Gluten Free)">Bhakri (Gluten Free)</option>
 </select>
  <select name="roti_quantity_num" class="select" required>
     <option value="1" selected disabled>Select Quantity</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
     <option value="10">10</option>
 </select>
</div>
<br><br>
<div>
<h3><font color="#ffffff">Extra Dal / Gravy</font></h3>
 <select name="daal_quantity" id="" class="select">
     <option selected value="0">Select Daal</option>
     <option value="12">12 oz</option>
     <option value="16">16 oz</option>
     <option value="24">24 oz</option>
     <option value="32">32 oz</option>
     <option value="48">48 oz</option>
 </select>
 <select name="daal_quantity_num" class="select">
     <option value="1">Select Quantity</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
     <option value="10">10</option>
 </select>
 <br><br>
 <h3><font color="#ffffff">Extra Sabji / Vegetable</font></h3>
 <select name="sabji_quantity" id="" class="select">
     <option selected value="0">Select Sabji</option>
     <option value="12">12 oz</option>
     <option value="16">16 oz</option>
     <option value="24">24 oz</option>
     <option value="32">32 oz</option>
     <option value="48">48 oz</option>
 </select>
   <select name="sabji_quantity_num" class="select">
     <option value="1">Select Quantity</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
     <option value="10">10</option>
 </select>
</div>
<br><br>
    
</div>


<!--end of option-->


<!--end of option-->

<!--
<div>
<h3><font color="#ffffff">Quantity</font></h3>
 <select name="tiffinbox_quantity" id="tiffinbox_quantity" class="select" required>
     <option id="tiffin_box_option" value="">Select Quantity</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
     <option value="10">10</option>
 </select>
</div>
-->

<br><br>
<div>
<h3><font color="#ffffff">Your Info</font></h3>

    <div class="col-12">
      <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" required>
    </div>
    <br>
    <div class="col-12">
      <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" required>
    </div>
    <br>
<!--
    <div class="col-12">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
    </div>
    <br>
-->
    <div class="col-12">
      <input type="number" class="form-control" id="mobile_number" placeholder="Mobile Number" name="mobile_number" required>
      <span id="invalid_number" style="color:red;display:none;">Only 10 digits number allowed</span>
    </div>
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
    <br>
    <div class="col-12">
      <input type="text" class="form-control" id="street_name" placeholder="STREET NAME/Number" name="street_name" required>
    </div>
    <br>
    <div class="col-12">
      <input type="text" class="form-control" id="unit_apt" placeholder="UNIT /APT (optional)" name="unit_apt">
    </div>
    <br>
    <div class="col-12">
      <input type="text" class="form-control" id="city" placeholder="CITY" name="city" required>
    </div>
    <br>
    <div class="col-12">
      <select class="form-control" id="zipcode" name="zipcode" required>
          <option value="">Select Zip Code</option>
          <option value="92127">92127</option>
          <option value="92128">92128</option>
          <option value="92126">92126</option>
          <option value="92121">92121</option>
          <option value="92025">92025</option>
          <option value="92026">92026</option>
          <option value="92122">92122</option>
          <option value="92130">92130</option>
          <option value="92196">92196</option>
      </select>
    </div>
    <br>
    <div class="col-12">
      <input type="text" class="form-control" id="instructions" placeholder="Additional Instructions(optional)" name="additional_ins" >
    </div>
    <br>
    <div class="col-12">
      <button type="submit" name="submit" class="btn btn-primary">Next</button>
    </div>
    
    <br><br><br><br>
</div>
   </div>
   </form>
   <?php 
    $datetime = date('Y-m-d',strtotime("+2 days"));
    ?>
   
    <script>
var time = new Date();
var h = time.getHours(); 
    
$(".date").on("change", function() {
    var daysArray = []; 
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format(this.getAttribute("data-date-format") )
    )
    
   
    var date = new Date(this.getAttribute('data-date'));
    console.log(this.getAttribute('data-date'))
    

Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
} 

var i = 0;
while (i < 100) {
    if (date.addDays(i).getDay() != 0 && date.addDays(i).getDay() != 6) {

        
        daysArray.push(`${date.addDays(i).getFullYear()}-${date.addDays(i).getMonth()+1}-${date.addDays(i).getDate()}`);
        
        if(daysArray.length == <?php echo $_GET['days']?>){
           break;
           }
    } 
    i++;

}
console.log(daysArray);

        document.getElementById('hidden_date').value = daysArray;


    
});
        
        
    function changeBg1(e){
        $(".bgColored1").css({"background": "transparent"});
        $(e).parent().css({"background": "#00ff3a"});
        
    }
        function changeBg2(e){
        $(".bgColored2").css({"background": "transparent"});
        $(e).parent().css({"background": "#00ff3a"});
    }
        
        function changeBg3(e){
        $(".bgColored3").css({"background": "transparent"});
        $(e).parent().css({"background": "#00ff3a"});
        
    }
    
    
        // check box and drop down for testy bite
        
        $('#extra_item').change(function(){
           if($('#extra_item').is(':checked')){
              $('#contain_extra_item').css('display','block');
              }else{
                  $('#contain_extra_item').css('display','none');
              }
        });
        

    </script>
    

</body>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $data   = array();
    $total  = 0;
    $title  = $_GET['title'];
    $meal_quantity = $_POST['meal_quantity'];
    $query  = "SELECT * FROM `special_meal` WHERE `name`=?";
    $result = $con->prepare($query);
    $result->execute([$title]);
    if($result->rowCount() == 1){
     $total +=$result->fetch()->price;
        array_push($data,array($title,$total,$meal_quantity,$total * $meal_quantity));
        
    }else{
         ?>
         <script>
             alert("Something Went Wrong!");
location = 'https://dailydietsd.com/';
 </script>
         <?php
    }
    
    
    
    
    $days = $_GET['days'];



//    $daal_quantity  = $_POST['daal_quantity'];
//    $sabji_quantity = $_POST['sabji_quantity'];
//
////    $thali = $_POST['selected_thali'];
//    $roti_quantity = $_POST['roti_quantity'];
//    $roti_category = $_POST['roti_category'];
//
////    $selected_subscription = $_POST['selected_subscription'];
//    $tiffinbox_quantity = $_POST['tiffinbox_quantity'];

    
//if($thali == "Standard Thali"){
//        $total +=8;
////        $_SESSION["Standard Thali"] = 8;
//     array_push($data,array("Standard Thali",8,1,8));
//    }
//    elseif($thali == "Special Thali"){
//        $total +=10;
////        $_SESSION["Special Thali"] = 10;
//        array_push($data,array("Special Thali",10,1,10));
//    }
//    elseif($thali == "Tasty Bite"){
//        $total +=0;
////        $_SESSION["Tasty Bite"] = 0;
////        array_push($data,array("Special Thali",0,1,0));
//    }
//    elseif($thali == "Extra Item"){
//        $total +=0;
////        $_SESSION["Extra Item"] = 0;
//    }
    
    if(isset($_POST['roti_quantity']) && isset($_POST['roti_category']) && isset($_POST['roti_quantity_num'])){
        
                $roti_quantity = $_POST['roti_quantity'];
    $roti_category = $_POST['roti_category'];
    $roti_quantity_num = $_POST['roti_quantity_num'];
        
    if($roti_category == "Whole Wheat Roti"){
        if($roti_quantity == 10){
            $total += 8 * $roti_quantity_num;
//        $_SESSION["Whole Wheat Roti"] = 6;
            array_push($data,array("Whole Wheat Roti",8,"10 ✖ $roti_quantity_num",8 * $roti_quantity_num));
        }
        elseif($roti_quantity == 20){
            $total += 15 * $roti_quantity_num;
//            $_SESSION["Whole Wheat Roti"] = 15;
            array_push($data,array("Whole Wheat Roti",15,"20 ✖ $roti_quantity_num",15 * $roti_quantity_num));
        }
        elseif($roti_quantity == 30){
            $total += 21 * $roti_quantity_num;
//        $_SESSION["Whole Wheat Roti"] = 21;
        array_push($data,array("Whole Wheat Roti",21,"30 ✖ $roti_quantity_num",21 * $roti_quantity_num));

        }
        elseif($roti_quantity == 50){
            $total += 30 * $roti_quantity_num;
//        $_SESSION["Whole Wheat Roti"] = 30;
        array_push($data,array("Whole Wheat Roti",30,"50 ✖ $roti_quantity_num",30 * $roti_quantity_num));

        }
        
    }
//    elseif($roti_category == "Multigrain Roti"){
//        if($roti_quantity == 10){
//            $total += 10;
//
//            array_push($data,array("Multigrain Roti",10,10,10));
//        }
//        elseif($roti_quantity == 20){
//            $total += 19;
//
//            array_push($data,array("Multigrain Roti",19,20,19));
//        }
//        elseif($roti_quantity == 30){
//            $total += 24;
//            array_push($data,array("Multigrain Roti",24,30,24));
//        }
//        elseif($roti_quantity == 50){
//            $total += 35;
//            array_push($data,array("Multigrain Roti",35,50,35));
//        }
//        
//    }
        
        
    elseif($roti_category == "Multigrain Roti"){
        if($roti_quantity == 10){
            $total += 10 * $roti_quantity_num;
//        $_SESSION["Multigrain Roti"] = 6;
            array_push($data,array("Multigrain Roti",10,"10 ✖ $roti_quantity_num",10 * $roti_quantity_num));
        }
        elseif($roti_quantity == 20){
            $total += 19 * $roti_quantity_num;
//            $_SESSION["Multigrain Roti"] = 19;
            array_push($data,array("Multigrain Roti",19,"20 ✖ $roti_quantity_num",19 * $roti_quantity_num));
        }
        elseif($roti_quantity == 30){
            $total += 24 * $roti_quantity_num;
//        $_SESSION["Multigrain Roti"] = 24;
        array_push($data,array("Multigrain Roti",24,"30 ✖ $roti_quantity_num",24 * $roti_quantity_num));

        }
        elseif($roti_quantity == 50){
            $total += 35 * $roti_quantity_num;
//        $_SESSION["Multigrain Roti"] = 35;
        array_push($data,array("Multigrain Roti",35,"50 ✖ $roti_quantity_num",35 * $roti_quantity_num));

        }
        
    } 
        
      elseif($roti_category == "Bhakri (Gluten Free)"){
        if($roti_quantity == 10){
            $total += 20 * $roti_quantity_num;
//        $_SESSION["Bhakri (Gluten Free)"] = 6;
            array_push($data,array("Bhakri (Gluten Free)",20,"10 ✖ $roti_quantity_num",20 * $roti_quantity_num));
        }
        elseif($roti_quantity == 20){
            $total += 36 * $roti_quantity_num;
//            $_SESSION["Bhakri (Gluten Free)"] = 36;
            array_push($data,array("Bhakri (Gluten Free)",36,"20 ✖ $roti_quantity_num",36 * $roti_quantity_num));
        }
        elseif($roti_quantity == 30){
            $total += 45 * $roti_quantity_num;
//        $_SESSION["Bhakri (Gluten Free)"] = 45;
        array_push($data,array("Bhakri (Gluten Free)",45,"30 ✖ $roti_quantity_num",45 * $roti_quantity_num));

        }
        elseif($roti_quantity == 50){
            $total += 62 * $roti_quantity_num;
//        $_SESSION["Bhakri (Gluten Free)"] = 62;
        array_push($data,array("Bhakri (Gluten Free)",62,"50 ✖ $roti_quantity_num",62 * $roti_quantity_num));

        }
        
    }
        
        
        
    }
    

    
    if(isset($_POST['daal_quantity']) && isset($_POST['daal_quantity_num'])){

       $daal_quantity  = $_POST['daal_quantity'];
       $daal_quantity_num  = $_POST['daal_quantity_num'];
        
        
            if($daal_quantity == 12){
        $total += 8 * $daal_quantity_num;
//        $_SESSION["Daal"] = 8;
        array_push($data,array("Daal",8,"12 oz ✖ $daal_quantity_num",8 * $daal_quantity_num));
    }elseif($daal_quantity == 16){
        $total += 10 * $daal_quantity_num;
//        $_SESSION["Daal"] = 10;
        array_push($data,array("Daal",10,"16 oz ✖ $daal_quantity_num",10 * $daal_quantity_num));
    }elseif($daal_quantity == 24){
        $total += 15 * $daal_quantity_num;
//        $_SESSION["Daal"] = 15;
        array_push($data,array("Daal",15,"24 oz ✖ $daal_quantity_num",15 * $daal_quantity_num));
    }elseif($daal_quantity == 32){
        $total += 19 * $daal_quantity_num;
//        $_SESSION["Daal"] = 19;
        array_push($data,array("Daal",19,"32 oz ✖ $daal_quantity_num",19 * $daal_quantity_num));
    }elseif($daal_quantity == 48){
        $total += 28 * $daal_quantity_num;
//        $_SESSION["Daal"] = 28;
        array_push($data,array("Daal",28,"48 oz ✖ $daal_quantity_num",28 * $daal_quantity_num));
    }
        
        
    }
    

        
    
    if(isset($_POST['sabji_quantity']) && isset($_POST['sabji_quantity_num'])){
        $sabji_quantity = $_POST['sabji_quantity'];
        $sabji_quantity_num = $_POST['sabji_quantity_num'];
    
    
           if($sabji_quantity == 12){
        $total += 8 * $sabji_quantity_num;
//        $_SESSION["Sabji"] = 8;
        array_push($data,array("Sabji",8,"12 oz ✖ $sabji_quantity_num",8 * $sabji_quantity_num));
    }elseif($sabji_quantity == 16){
        $total += 10 * $sabji_quantity_num;
//        $_SESSION["Sabji"] = 10;
        array_push($data,array("Sabji",10,"16 oz ✖ $sabji_quantity_num",10 * $sabji_quantity_num));
    }elseif($sabji_quantity == 24){
        $total += 15 * $sabji_quantity_num;
//        $_SESSION["Sabji"] = 15;
        array_push($data,array("Sabji",15,"24 oz ✖ $sabji_quantity_num",15 * $sabji_quantity_num));
    }elseif($sabji_quantity == 32){
        $total += 19 * $sabji_quantity_num;
//        $_SESSION["Sabji"] = 19;
         array_push($data,array("Sabji",19,"32 oz ✖ $sabji_quantity_num",19 * $sabji_quantity_num));
    }elseif($sabji_quantity == 48){
        $total += 28 * $sabji_quantity_num;
//        $_SESSION["Sabji"] = 28;
        array_push($data,array("Sabji",28,"48 oz ✖ $sabji_quantity_num",28 * $sabji_quantity_num));
    }
        
    }

        $_SESSION['days'] =$_POST['hidden_date'];
//        $_SESSION['tiffinbox_quantity'] = $tiffinbox_quantity;
        $_SESSION['total'] = $total;
        $_SESSION['delivery_charges'] = 0;
        $_SESSION['data'] = $data;
        
        #user data
        $_SESSION['fname']           = $_POST['fname'];
        $_SESSION['lname']           = $_POST['lname'];
        $_SESSION['email']           = $_COOKIE['email'];
        $_SESSION['mobile_number']   = $_POST['mobile_number'];
        $_SESSION['street_name']     = $_POST['street_name'];
        $_SESSION['unit_apt']        = $_POST['unit_apt'];
        $_SESSION['city']            = $_POST['city'];
        $_SESSION['zipcode']         = $_POST['zipcode'];
        $_SESSION['additional_ins']  = (isset($_POST['additional_ins']))?$_POST['additional_ins'] : '';
    ?>
    <script>
window.location = 'checkout/';
    </script>
    <?php
    
    
}


?>
