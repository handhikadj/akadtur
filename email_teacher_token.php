<?php
header('Content-Type: application/json');

require_once 'dbcon.php';
require_once 'admin/helpers/helper.php';
require_once 'admin/vendors/PHPMailer/phpmailer.php';

$mail = new PHPMailer;

$email = $_POST['email_teacher'];
$token = genRand(12);

try {
	$email_query = " SELECT teacher_id, email, token, firstname, teacher_status FROM teacher WHERE email = '$email' ORDER BY teacher_id DESC LIMIT 1 ";
	$result = mysqli_query($db, $email_query) OR die(mysqli_error($db));
	$row = mysqli_fetch_assoc($result);
	$ketemu_email = mysqli_num_rows($result);

	if (empty($email)) {
		throw new Exception("Email Tidak Boleh Kosong");
	} elseif (filter_var($email, FILTER_VALIDATE_EMAIL === false)) {
		throw new Exception("Harus Diisi Dengan Email");
	} elseif (!$ketemu_email) {
		throw new Exception("Email Tidak Ditemukan. Mohon Masukkan Kembali Dengan Benar Atau Hubungi Admin");
	} elseif ($row['teacher_status'] == "Registered") {
		throw new Exception("Email Telah Terdaftar");
	} else {

		$teacherid = $row['teacher_id'];
		$send_query = " UPDATE teacher SET token = '$token' WHERE teacher_id = '$teacherid' ";
		$result = mysqli_query($db, $send_query) OR die(mysqli_error($db));

		$token_query = " SELECT token FROM teacher WHERE teacher_id = '$teacherid' ";
		$result2 = mysqli_query($db, $token_query) OR die(mysqli_error($db));
		$row2 = mysqli_fetch_assoc($result2);

	    //Server settings
	    $mail->SMTPDebug = 0;                               // Enable verbose debug output
	    $mail->isSMTP();                                    // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';						// Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                             // Enable SMTP authentication
	    $mail->Username = 'dadangsukatoro@gmail.com';       // SMTP username
	    $mail->Password = 'sukatoro456';                    // SMTP password
	    $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                  // TCP port to connect to

	    //Recipients
	    $mail->setFrom('dadangsukatoro@gmail.com', 'Admin');
	    $mail->addAddress($email, $row['firstname']);     // Add a recipient

	    $if_token = empty($row2['token']) ? $token : $row2['token'];
	    $html_template = "<h3 style='text-align: center;'> $if_token </h3>";
	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Kode Aktivasi';
	    $mail->Body    = $html_template;
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $sendto = $mail->send();
	    if ($sendto) {
	    	$sukses[] = [
	    		"message" => "Sukses Terkirim",
	    		"success" => "true"
	    	];
	    	echo json_encode($sukses);
	   	} else {
	   		throw new Exception("Terjadi Error Pada Sistem");
	   	}
	}
} catch (Exception $e) {

	$error[] = [
		'message' => $e->getMessage(),			
		'mail_error' => $mail->ErrorInfo,
		"success" => "false"
	];
	echo json_encode($error);
}