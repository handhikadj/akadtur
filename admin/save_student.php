<?php
include('dbcon.php');

$fn = $_POST['fn'];
$ln = $_POST['ln'];
$class_id = $_POST['class_id'];

$query = "INSERT INTO student (firstname, lastname, location, class_id, status) 
	VALUES ('$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered')";

mysqli_query($db, $query) or die(mysqli_error($db));
