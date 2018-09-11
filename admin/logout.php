<?php
session_start();
include('dbcon.php');
include('session.php');
mysqli_query($db, "update user_log set logout_Date = NOW() where user_id = '$session_id' ")or die(mysqli_error($db));

unset($_SESSION['admin']);
header('location:index.php'); 
?>