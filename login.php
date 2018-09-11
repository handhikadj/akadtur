<?php
session_start();
header('Content-Type: application/json');

include('admin/dbcon.php');
$username = $_POST['username'];
$password = $_POST['password'];

try {
	if (empty($username) && empty($password)) {
		throw new Exception('Username dan password tidak boleh kosong');
		// $error['error_all'] = 'Username dan password tidak boleh kosong';
	} elseif (empty($username)) {
		throw new Exception('Username tidak boleh kosong');
		// $error['error_username'] = 'Username tidak boleh kosong';
	} elseif (empty($password)) {
		throw new Exception('Password tidak boleh kosong');
		// $error['error_pass'] = 'Password tidak boleh kosong';
	} else {
		/* student */
		$result = mysqli_query($db, "SELECT * FROM student WHERE username='$username'")or die(mysqli_error($db));
		$num_row = mysqli_num_rows($result);

		/* teacher */
		$query_teacher = mysqli_query($db, "SELECT * FROM teacher WHERE username='$username'")or die(mysqli_error($db));
		$num_row_teacher = mysqli_num_rows($query_teacher);

		if( $num_row > 0) { 
			$row = mysqli_fetch_assoc($result);
			
			if (password_verify($password, $row['password'])) {
				$_SESSION['id']=$row['student_id'];
				$data['success'] = "true_student";
				echo json_encode($data);
			} else throw new Exception("Mohon Periksa Kembali Username dan Password");
		} elseif ( $num_row_teacher > 0 ) {
			$row_teacher = mysqli_fetch_assoc($query_teacher);

			if (password_verify($password, $row_teacher['password'])) {
				$_SESSION['id']=$row_teacher['teacher_id'];
				$data['success'] = "true_teacher";
				echo json_encode($data);
			} else throw new Exception("Mohon Periksa Kembali Username dan Password");
		} else throw new Exception("Mohon Periksa Kembali Username dan Password");
	}
} catch (Exception $e) {
	$error = [
		"message" => $e->getMessage()
	];
	echo json_encode($error);
}

