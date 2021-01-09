<?php 
if(!isset($_COOKIE['email'])){
    ?>
    <script>alert("Please Register or Login to proceed with your Order")</script>
    <script>window.location = 'user/login.php?return_to=<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>'</script>
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
  background: #00ff3a;
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
        color:#fff;
        font-size: 18px;
    }
    
    </style>

</head>

<body style="background: url(img/background4.jpeg);
    min-height: 780px;
    margin-top: 55px;
    background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    -ms-background-size: cover;
    -webkit-background-size: cover;
    background-repeat: repeat-x;
    background-attachment: fixed;">
    
    <form action="#" method="post" id="myForm">
<div class="container">
<input type="hidden" value="1" id="hidden_feild" name="hidden_feild">
<input type="hidden" value="1" id="hidden_date" name="hidden_date">
<div>
<h3><font color="#ffffff">Select Meal</font></h3>
<?php 
//    if(!(date('N') ==4 && date('H') <=20)){
//       ?>
//        <script>alert("Tasty Bite is only available for Friday before 8 PM")</script>
//        <script>//location = "https://dailydietsd.com"</script>
//        <?php
//    }
    ?>


</div>
<br><br>
<div id="testy_bite_menu">
<h3><font color="#ffffff">Testy Bite Breakfast Menu</font></h3>
   <div class="content">
        <p>
        <input type="checkbox" id="mumbai_style_vada_pav" name="mumbai_style_vada_pav" value="7">
        <label class="checkBox_label" for="mumbai_style_vada_pav">Mumbai Style Vada Pav with Green & Red Chatni</label>
        <select name="mumbai_style_vada_pav_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="potato_vada" name="potato_vada" value="6">
        <label class="checkBox_label" for="potato_vada">Potato Vada with Green & Red Chatni</label>
        <select name="potato_vada_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="mumbai_street_pav_bhaji" name="mumbai_street_pav_bhaji" value="6">
        <label class="checkBox_label" for="mumbai_street_pav_bhaji">Mumbai Street Pav Bhaji with 2 buttery Pav</label>
        <select name="mumbai_street_pav_bhaji_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="mumbai_famous_misal" name="mumbai_famous_misal" value="6">
        <label class="checkBox_label" for="mumbai_famous_misal">Mumbai Famous Misal Pav with 2 pav</label>
        <select name="mumbai_famous_misal_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="thaliPeeth" name="thaliPeeth" value="6">
        <label class="checkBox_label" for="thaliPeeth">ThaliPeeth(2) with Yogurt</label>
        <select name="thaliPeeth_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="kanda_poha" name="kanda_poha" value="6">
        <label class="checkBox_label" for="kanda_poha">Kanda Poha</label>
        <select name="kanda_poha_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="sabudana_khichdi" name="sabudana_khichdi" value="6">
        <label class="checkBox_label" for="sabudana_khichdi">Sabudana Khichdi</label>
        <select name="sabudana_khichdi_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="poori_bhaji" name="poori_bhaji" value="6">
        <label class="checkBox_label" for="poori_bhaji">Poori Bhaji (Potato Bhaji) with 2 Poori</label>
        <select name="poori_bhaji_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="greenPeas_pattice" name="greenPeas_pattice" value="6">
        <label class="checkBox_label" for="greenPeas_pattice">GreenPeas Pattice</label>
        <select name="greenPeas_pattice_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="cilatro_bites" name="cilatro_bites" value="6">
        <label class="checkBox_label" for="cilatro_bites">Cilatro Bites with Green Spicy Chatni</label>
        <select name="cilatro_bites_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="spinach_bites" name="spinach_bites" value="6">
        <label class="checkBox_label" for="spinach_bites">Spinach Bites with Green Spicy Chatni</label>
        <select name="spinach_bites_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
    
<!--$items = ["Mumbai Style Vada Pav with Green & Red Chatni","Potato Vada with Green & Red Chatni","Mumbai Street Pav Bhaji with 2 buttery Pav","Mumbai Famous Misal Pav with 2 pav","ThaliPeeth(2) with Yogurt","Kanda Poha","Sabudana Khichdi","Poori Bhaji (Potato Bhaji) with 2 Poori","GreenPeas Pattice","Cilatro Bites with Green Spicy Chatni","Spinach Bites with Green Spicy Chatni"];-->
</div>
<h3><font color="#ffffff">Sweet Dish</font></h3>
   <div class="content">
   
        <p>
        <input type="checkbox" id="pooran_pooli" name="pooran_pooli" value="6">
        <label class="checkBox_label" for="pooran_pooli">Pooran Pooli(1)</label>
        <select name="pooran_pooli_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="srikand" name="srikand" value="6">
        <label class="checkBox_label" for="srikand">Srikand (12 Oz)</label>
        <select name="srikand_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="gulab_jamun" name="gulab_jamun" value="6">
        <label class="checkBox_label" for="gulab_jamun">Gulab Jamun (2)</label>
        <select name="gulab_jamun_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="rice_kheer" name="rice_kheer" value="6">
        <label class="checkBox_label" for="rice_kheer">Rice Kheer(12 Oz)</label>
        <select name="rice_kheer_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>
        <p>
        <input type="checkbox" id="lapsi" name="lapsi" value="6">
        <label class="checkBox_label" for="lapsi">Lapsi (Sweet Broken Wheat)(12 Oz)</label>
        <select name="lapsi_quantity" id="" class="select">
        <option selected value="1" >Select Quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </p>

    

</div>
</div><br><br>


<!-- start of option-->
    <p>
    <input type="checkbox" id="extra_item" name="extra_item">
    <label  for="extra_item" style="position: absolute;font-size: 30px;font-weight: bold;margin-top: 18px;"></label>
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
<br><br>
<div>
<h3><font color="#ffffff">Select Date</font></h3>
<input type="date" id="date" data-date="" data-date-format="DD MMMM YYYY" min="<?php
$datetime = new DateTime('today');
echo $datetime->format('Y-m-d');?>" class="date" name="selected_date" required>
</div>


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
      <input type="text" class="form-control" id="zipcode" placeholder="Additional Instructions(optional)" name="zipcode" >
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
//       echo $datetime;
    ?>
   
    <script>
var time = new Date();
var h = time.getHours();
console.log(h)

        
 
$(".date").on("change", function() {
       var daysArray = []; 
    console.log(this.value);
    if (h >= 20) {
	if(this.value == "<?php echo date('Y-m-d',strtotime("+1 days")) ?>" || this.value == "<?php echo date('Y-m-d') ?>"){
       alert("Order window has been closed at 8 PM. Please Contact Customer service Representative at 4423170768 to place an order");
        return false;
       }
}
    if (h <= 20) {
	if(this.value == "<?php echo date('Y-m-d') ?>"){
       alert("Order window has been closed at 8 PM. Please Contact Customer service Representative at 4423170768 to place an order");
        return false;
       }
}
    
    
    
    
    
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
        if(daysArray.length == 1){
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
    
    $data = array();




    
    $total = 0;
    $days = 1;
    // user info
//    $fname = $_POST['fname'];
//    $lname = $_POST['lname'];
//    $email = $_COOKIE['email'];
//    $mobile_number = $_POST['mobile_number'];
//    $street_name = $_POST['street_name'];
//    $unit_apt = $_POST['unit_apt'];
//    $city = $_POST['city'];
//    $zipcode = $_POST['zipcode'];


//    $daal_quantity  = $_POST['daal_quantity'];
//    $sabji_quantity = $_POST['sabji_quantity'];
//
//    $thali = $_POST['selected_thali'];
//    $roti_quantity = $_POST['roti_quantity'];
//    $roti_category = $_POST['roti_category'];

//    $selected_subscription = $_POST['selected_subscription'];
//    $tiffinbox_quantity = $_POST['tiffinbox_quantity'];
//    $rice_option = $_POST['rice_option'];
    

    
if (isset($_POST['mumbai_style_vada_pav']))
{
    $mumbai_style_vada_pav = $_POST['mumbai_style_vada_pav'];
    $mumbai_style_vada_pav_quantity = $_POST['mumbai_style_vada_pav_quantity'];
        $total +=7 * $mumbai_style_vada_pav_quantity;
//    $_SESSION["Mumbai Style Vada Pav with Green & Red Chatni"] = 7 * $mumbai_style_vada_pav_quantity;
    array_push($data,array("Mumbai Style Vada Pav with Green & Red Chatni",7,$mumbai_style_vada_pav_quantity,7 * $mumbai_style_vada_pav_quantity));
}
if (isset($_POST['potato_vada']))
{
    $potato_vada = $_POST['potato_vada'];
    $potato_vada_quantity = $_POST['potato_vada_quantity'];
     $total +=6 * $potato_vada_quantity;
//    $_SESSION["Potato Vada with Green & Red Chatni"] = 6 * $potato_vada_quantity;
    array_push($data,array("Potato Vada with Green & Red Chatni",6,$potato_vada_quantity,6 * $potato_vada_quantity));
}
if (isset($_POST['mumbai_street_pav_bhaji']))
{
    $mumbai_street_pav_bhaji = $_POST['mumbai_street_pav_bhaji'];
    $mumbai_street_pav_bhaji_quantity = $_POST['mumbai_street_pav_bhaji_quantity'];
     $total +=7 * $mumbai_street_pav_bhaji_quantity;
//    $_SESSION["Mumbai Street Pav Bhaji with 2 buttery Pav"] = 7 * $mumbai_street_pav_bhaji_quantity;
    array_push($data,array("Mumbai Street Pav Bhaji with 2 buttery Pav",7,$mumbai_street_pav_bhaji_quantity,7 * $mumbai_street_pav_bhaji_quantity));
}
if (isset($_POST['mumbai_famous_misal']))
{
    $mumbai_famous_misal = $_POST['mumbai_famous_misal'];
    $mumbai_famous_misal_quantity = $_POST['mumbai_famous_misal_quantity'];
     $total +=7 * $mumbai_famous_misal_quantity;
//    $_SESSION["Mumbai Famous Misal Pav with 2 pav"] = 7 * $mumbai_famous_misal_quantity;
    array_push($data,array("Mumbai Famous Misal Pav with 2 pav",7,$mumbai_famous_misal_quantity,7 * $mumbai_famous_misal_quantity));
}
if (isset($_POST['thaliPeeth']))
{
    $thaliPeeth = $_POST['thaliPeeth'];
    $thaliPeeth_quantity = $_POST['thaliPeeth_quantity'];
     $total +=8 * $thaliPeeth_quantity;
//    $_SESSION["ThaliPeeth(2) with Yogurt"]=8 * $thaliPeeth_quantity;
    array_push($data,array("ThaliPeeth(2) with Yogurt",8,$thaliPeeth_quantity,8 * $thaliPeeth_quantity));
}
if (isset($_POST['kanda_poha']))
{
    $kanda_poha = $_POST['kanda_poha'];
    $kanda_poha_quantity = $_POST['kanda_poha_quantity'];
     $total +=6 * $kanda_poha_quantity;
//    $_SESSION["Kanda Poha"]=6 * $kanda_poha_quantity;
    array_push($data,array("Kanda Poha",6,$kanda_poha_quantity,6 * $kanda_poha_quantity));
}
if (isset($_POST['sabudana_khichdi']))
{
    $sabudana_khichdi = $_POST['sabudana_khichdi'];
    $sabudana_khichdi_quantity = $_POST['sabudana_khichdi_quantity'];
    $total +=6 * $sabudana_khichdi_quantity;
//    $_SESSION["Sabudana Khichdi"]=6 * $sabudana_khichdi_quantity;
    array_push($data,array("Sabudana Khichdi",6,$sabudana_khichdi_quantity,6 * $sabudana_khichdi_quantity));
}
if (isset($_POST['poori_bhaji']))
{
    $poori_bhaji = $_POST['poori_bhaji'];
    $poori_bhaji_quantity = $_POST['poori_bhaji_quantity'];
    $total +=8 * $poori_bhaji_quantity;
//    $_SESSION["Poori Bhaji (Potato Bhaji) with 2 Poori"]=8 * $poori_bhaji_quantity;
    array_push($data,array("Poori Bhaji (Potato Bhaji) with 2 Poori",8,$poori_bhaji_quantity,8 * $poori_bhaji_quantity));
}
if (isset($_POST['greenPeas_pattice']))
{
    $greenPeas_pattice = $_POST['greenPeas_pattice'];
    $greenPeas_pattice_quantity = $_POST['greenPeas_pattice_quantity'];
    $total +=6 * $greenPeas_pattice_quantity;
//    $_SESSION["GreenPeas Pattice"]=6 * $greenPeas_pattice_quantity;
    array_push($data,array("GreenPeas Pattice",6,$greenPeas_pattice_quantit6,6 * $greenPeas_pattice_quantity));
}
if (isset($_POST['cilatro_bites']))
{
    $cilatro_bites = $_POST['cilatro_bites'];
    $cilatro_bites_quantity = $_POST['cilatro_bites_quantity'];
    $total +=6 * $cilatro_bites_quantity;
//    $_SESSION["Cilatro Bites with Green Spicy Chatni"]=6 * $cilatro_bites_quantity;
    array_push($data,array("Cilatro Bites with Green Spicy Chatni",6,$cilatro_bites_quantity,6 * $cilatro_bites_quantity));
}
if (isset($_POST['spinach_bites']))
{
    $spinach_bites = $_POST['spinach_bites'];
    $spinach_bites_quantity = $_POST['spinach_bites_quantity'];
    $total +=6 * $spinach_bites_quantity;
//    $_SESSION["Spinach Bites with Green Spicy Chatni"]=6 * $spinach_bites_quantity;
    array_push($data,array("Spinach Bites with Green Spicy Chatni",6,$spinach_bites_quantity,6 * $spinach_bites_quantity));
}
if (isset($_POST['pooran_pooli']))
{
    $pooran_pooli = $_POST['pooran_pooli'];
    $pooran_pooli_quantity = $_POST['pooran_pooli_quantity'];
    $total +=4 * $pooran_pooli_quantity;
//    $_SESSION["Pooran Pooli(1)"]=4 * $pooran_pooli_quantity;
    array_push($data,array("Pooran Pooli(1)",4,$pooran_pooli_quantity,4 * $pooran_pooli_quantity));
}
if (isset($_POST['srikand']))
{
    $srikand = $_POST['srikand'];
    $srikand_quantity = $_POST['srikand_quantity'];
    $total +=7 * $srikand_quantity;
//    $_SESSION["Srikand (12 Oz)"]=7 * $srikand_quantity;
    array_push($data,array("Srikand (12 Oz)",7,$srikand_quantity,7 * $srikand_quantity));
}
if (isset($_POST['gulab_jamun']))
{
    $gulab_jamun = $_POST['gulab_jamun'];
    $gulab_jamun_quantity = $_POST['gulab_jamun_quantity'];
    $total +=2 * $gulab_jamun_quantity;
//    $_SESSION["Gulab Jamun (2)"]=2 * $gulab_jamun_quantity;
    array_push($data,array("Gulab Jamun (2)",2,$gulab_jamun_quantity,2 * $gulab_jamun_quantity));
}
if (isset($_POST['rice_kheer']))
{
    $rice_kheer = $_POST['rice_kheer'];
    $rice_kheer_quantity = $_POST['rice_kheer_quantity'];
    $total +=6 *$rice_kheer_quantity;
//    $_SESSION["Rice Kheer(12 Oz)"]=6 *$rice_kheer_quantity;
    array_push($data,array("Rice Kheer(12 Oz)",6,$rice_kheer_quantity,6 *$rice_kheer_quantity));
}
if (isset($_POST['lapsi']))
{
    $lapsi = $_POST['lapsi'];
    $lapsi_quantity = $_POST['lapsi_quantity'];
    $total +=7 * $lapsi_quantity;
//    $_SESSION['Lapsi (Sweet Broken Wheat)(12 Oz)'] = 7 * $lapsi_quantity;
    array_push($data,array("Lapsi (Sweet Broken Wheat)(12 Oz)",7,$lapsi_quantity,7 *$lapsi_quantity));
}
    
    
    
    
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
        //print_r($_SESSION);
    ?>
    <script>
window.location = 'checkout/';
    </script>
    
    <?php
}


?>
