<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$class_id = $_POST['class_id'];

$query = mysqli_query($db, "select * from student where username='$username' and firstname='$firstname' and lastname='$lastname' and class_id = '$class_id'")or die(mysqli_error($db));
$row = mysqli_fetch_array($query);
$id = $row['student_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	mysqli_query($db, "update student set password = '$password', status = 'Registered' where student_id = '$id'")or die(mysqli_error($db));
	$_SESSION['id']=$id;
	echo 'true';
}else{
	echo 'false';
}
?>