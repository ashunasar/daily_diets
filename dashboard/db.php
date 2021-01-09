<?php
$host = 'mysql:host=localhost;dbname=dailydiets';
$user = 'dailydiets';
$pass ='ashu0786';

$con = new PDO($host,$user,$pass);
$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>