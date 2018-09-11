<?php
session_start();
include('dbcon.php');
//Check whether the session variable SESS_MEMBER_ID is present or not
if (empty($_SESSION['admin'])) echo "<script>window.location = 'index.php'</script>";

$session_id=$_SESSION['admin'];

$user_query = mysqli_query($db, "select * from users where user_id = '$session_id'")or die(mysqli_error($db));
$user_row = mysqli_fetch_array($user_query);
$user_username = $user_row['username'];
