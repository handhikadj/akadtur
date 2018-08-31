<?php  
$host = "localhost";  
$user = "root";  
$pass = "";  
$dbnm = "lms-fatur";  

$db = mysqli_connect($host, $user, $pass, $dbnm);

if($db) true;
else mysqli_error($db);
