<?php
header('Content-Type: application/json');
include('dbcon.php');

$email= $_POST['email'];
$name = $_POST['name'];
$class_id = $_POST['class_id'];

try {
	$query = "SELECT * FROM student WHERE email = '$email' ";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	$ketemu_student = mysqli_num_rows($result);

	if(empty($email)) {
		throw new Exception("Email Wajib Diisi");
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		throw new Exception("Format Email Tidak Benar");
	} elseif ($ketemu_student > 0) {
		throw new Exception("Email Sudah Terdaftar");
	} else {
		$query_insert = " INSERT INTO student (email, name, location, class_id, status) VALUES ('$email', '$name','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered') ";
		$exec = mysqli_query($db, $query_insert) or die(mysqli_error($db));
		$data = [
			"message" => "Berhasil Memasukkan Data",
			"success" => "true"
		];
		echo json_encode($data);
	}	
} catch (Exception $e) {
	$error = [
		"message" => $e->getMessage(),
		"success" => "false"
	];
	echo json_encode($error);
}