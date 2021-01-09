<?php 
/* 
 * PayPal and database configuration 
 */ 
  
// PayPal configuration 
define('PAYPAL_ID', 'Dailydietsd@gmail.com'); 
define('PAYPAL_SANDBOX', FALSE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'http://dailydietsd.com/order_form/checkout/pay_pal_integration/success.php'); 
define('PAYPAL_CANCEL_URL', 'http://dailydietsd.com/order_form/checkout/pay_pal_integration/cancel.php'); 
//define('PAYPAL_NOTIFY_URL', 'http://localhost/tiffinbox/checkout/pay_pal_integration/ipn.php'); 
define('PAYPAL_CURRENCY', 'USD'); 
 
// Database configuration 
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'tiffinbox'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");