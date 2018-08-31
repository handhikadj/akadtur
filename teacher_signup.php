<?php
include('admin/dbcon.php');
// header('Content-Type: application/json');
session_start();

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$token = $_POST['token'];

$query = mysqli_query($db, "SELECT teacher_id, username, token, teacher_status FROM teacher WHERE token = '$token'") or die (mysqli_error($db));
$row = mysqli_fetch_assoc($query);

if ($token != $row['token']) {
	$data['not_token'] = 'Kode tidak benar';
} elseif ($row['teacher_status'] == "Registered") {
	$data['is_registered'] = 'Username telah terdaftar';	
} else {
	$id = $row['teacher_id'];
	mysqli_query($db, "update teacher set username='$username', password = '$password', teacher_status = 'Registered' where teacher_id = '$id'")or die(mysqli_error($db));
	$_SESSION['id'] = $id;
	$data['success'] = 'success';
}

echo json_encode($data);
