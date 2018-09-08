<?php 
require_once 'dbcon.php';
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$get_id = $_POST['hidden-excel'];

$fileQuizQuestion = $_FILES['file-quiz-question'];

$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

try {
	if (isset($fileQuizQuestion) && in_array($fileQuizQuestion['type'], $file_mimes)) {

		$fileExtension = explode('.', $fileQuizQuestion['name']);
		$fileExtension = end($fileExtension);

		if ($fileExtension == 'csv') {
			$reader = new Csv();
		} elseif ($fileExtension == 'xls') {
			$reader = new Xls();
		} else {
			$reader = new Xlsx();
		}

		$spreadsheet = $reader->load($fileQuizQuestion['tmp_name']);

		$sheetData = $spreadsheet->getActiveSheet()->toArray();

		for($row = 2; $row < count($sheetData); $row++) {

			$questionTextRow	= $sheetData[$row][0];
			$pointsRow			= (string) $sheetData[$row][1];
			$questionTypeRow	= (string) $sheetData[$row][2];
			$TrueRow			= $sheetData[$row][3];
			$FalseRow			= $sheetData[$row][4];
			$aPgRow				= $sheetData[$row][5];
			$bPgRow				= $sheetData[$row][6];
			$cPgRow				= $sheetData[$row][7];
			$dPgRow				= $sheetData[$row][8];
			$ePgRow				= $sheetData[$row][9];
			$keyAnswerPgRow		= $sheetData[$row][10];

			if ($questionTypeRow == "2") {
				if ($TrueRow == NULL || empty($TrueRow)) {
					$answerTfRow = $FalseRow;
				} else $answerTfRow = $TrueRow;
				$queryAnsTf = "INSERT INTO quiz_question 
					(quiz_id, question_text, question_type_id, points, date_added, answer) 
					VALUES ('$get_id', '$questionTextRow', '$questionTypeRow', '$pointsRow', NOW(), '$answerTfRow')";
				mysqli_query($db, $queryAnsTf) or die(mysqli_error($db));
			} else {
				
				$queryAnsPg = "INSERT INTO quiz_question 
					(quiz_id, question_text, question_type_id, points, date_added, answer) 
					VALUES ('$get_id', '$questionTextRow', '$questionTypeRow', '$pointsRow', NOW(), '$keyAnswerPgRow')";
				mysqli_query($db, $queryAnsPg) or die(mysqli_error($db));

				// Memasukkan quiz_question_id ke table answer
				$queryFindQuestion = "SELECT * FROM quiz_question
									ORDER BY quiz_question_id DESC";
				$resultFindQuestion = mysqli_query($db, $queryFindQuestion) or die(mysqli_error($db));
				
				$rowFindQuestion = mysqli_fetch_assoc($resultFindQuestion);

				$quiz_question_id = !empty($rowFindQuestion['quiz_question_id']) ? 
									$rowFindQuestion['quiz_question_id'] : '' ;

				$aQuery = "INSERT INTO answer 
						(quiz_question_id, answer_text, choices) 
						VALUES ('$quiz_question_id', '$aPgRow', 'A')";
				$bQuery = "INSERT INTO answer 
						(quiz_question_id, answer_text, choices) 
						VALUES ('$quiz_question_id', '$bPgRow', 'B')";
				$cQuery = "INSERT INTO answer 
						(quiz_question_id, answer_text, choices) 
						VALUES ('$quiz_question_id', '$cPgRow', 'C')";
				$dQuery = "INSERT INTO answer 
						(quiz_question_id, answer_text, choices) 
						VALUES ('$quiz_question_id', '$dPgRow', 'D')";
				$eQuery = "INSERT INTO answer 
						(quiz_question_id, answer_text, choices) 
						VALUES ('$quiz_question_id', '$ePgRow', 'E')";

				mysqli_query($db, $aQuery) or die(mysqli_error($db));
				mysqli_query($db, $bQuery) or die(mysqli_error($db));
				mysqli_query($db, $cQuery) or die(mysqli_error($db));
				mysqli_query($db, $dQuery) or die(mysqli_error($db));
				mysqli_query($db, $eQuery) or die(mysqli_error($db));

			}
		}

		// Munculkan Pesan Sukses Jika Data Berhasil Terupload Dengan Baik
		$success = ["success" => true];
		echo json_encode($success);
	} else throw new Exception("Format File Tidak Diijinkan"); // end of if isset fileQuizQuestion

} catch (Exception $e) {
	$error = [
		"message" => $e->getMessage(),
		"success" => false
	];
	echo json_encode($error);
}
	
	

