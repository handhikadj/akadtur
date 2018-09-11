<?php
require_once 'dbcon.php';

$hiddenId = $_POST['hidden-updateT'];
$email = $_POST['email'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

try {
	$queryPassTeacher = "SELECT password FROM teacher WHERE teacher_id = '$hiddenId' ";
	$resultPassTeacher= mysqli_query($db, $queryPassTeacher);
	$rowPassTeacherId = mysqli_fetch_assoc($resultPassTeacher);

	$newPassword = empty($password) ? $rowPassTeacherId['password'] 
					: password_hash($password, PASSWORD_DEFAULT);

	$queryUpdateTeacher = "UPDATE teacher 
						SET email = '$email',
						name = '$name',
						username = '$username',
						password = '$newPassword'
						WHERE teacher_id = '$hiddenId' ";
	$executeTheTeacher = mysqli_query($db, $queryUpdateTeacher);
	if (!$executeTheTeacher) throw new Exception("Gagal Mengupdate Data");
	else {
		$success = [
			"message" => "Berhasil Mengupdate Data",
			"success" => true
		];
		echo json_encode($success);
	}

} catch (Exception $e) {
	$error = [
		"message" => $e->getMessage(),
		"success" => false
	];

	echo json_encode($error);
}
