<?php
$host = 'mysql:host=localhost;dbname=tiffinbox';
$user = 'root';
$pass ='';

$con = new PDO($host,$user,$pass);
$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>