<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (empty($_SESSION['id'])) {
    header("location: index.php");
}

$session_id=$_SESSION['id'];
?>