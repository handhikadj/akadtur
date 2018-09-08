<?php
$get_id = $_GET['id'] ?? '' ;
$quiz_question_id = $_GET['quiz_question_id'];
// $noOtomate = $_POST['no_otomatis'] ?? '' ;

$question = $_POST['question'] ?? '' ;
// $noPlusQuestion = "$noOtomate $question";
$points = $_POST['points'] ?? '' ;
$type = $_POST['question_type'] ?? '' ;
	
// Jawaban Pilihan Ganda
$answerpg = $_POST['answerpg'] ?? '' ; 
$ans1 = $_POST['ans1'] ?? '' ;
$ans2 = $_POST['ans2'] ?? '' ;
$ans3 = $_POST['ans3'] ?? '' ;
$ans4 = $_POST['ans4'] ?? '' ;
$ans5 = $_POST['ans5'] ?? '' ;
$anshidden1 = $_POST['anshidden1'] ?? '' ;
$anshidden2 = $_POST['anshidden2'] ?? '' ;
$anshidden3 = $_POST['anshidden3'] ?? '' ;
$anshidden4 = $_POST['anshidden4'] ?? '' ;
$anshidden5 = $_POST['anshidden5'] ?? '' ;

// Jawaban True/False
$answertf = $_POST['answertf'] ?? '' ;

// Buat Nomor Otomatis Pada Setiap Pertanyaan

$queryQuestion = "SELECT * FROM quiz_question 
					LEFT JOIN answer 
					ON quiz_question.quiz_question_id = answer. quiz_question_id 
					LEFT JOIN quiz 
					ON quiz_question.quiz_id = quiz.quiz_id 
					LEFT JOIN question_type 
					ON quiz_question.question_type_id = question_type.question_type_id 
					WHERE quiz.quiz_id='$get_id' 
					AND quiz_question.quiz_question_id='$quiz_question_id'
					ORDER BY quiz_question.date_added DESC";
$resultQuestion = mysqli_query($db, $queryQuestion);
$rowQuestion = mysqli_fetch_assoc($resultQuestion);

$queryAnsText = "SELECT answer_id, answer_text FROM answer
				WHERE quiz_question_id = '$quiz_question_id'";
$resultAnsText = mysqli_query($db, $queryAnsText);

while ($rowAnsText = mysqli_fetch_assoc($resultAnsText)) {
	$getAnsText[] = $rowAnsText;
}


if (isset($_POST['save'])) {
	// Jika Jenis Pertanyaan == True/False
	if ($type  == '2') {
		$queryAnsTf = "UPDATE quiz_question
					SET question_text = '$question',
						points = '$points',
						answer = '$answertf'
					WHERE quiz_question_id = '$quiz_question_id' ";

		mysqli_query($db, $queryAnsTf) or die(mysqli_error($db));
	} else {

		$queryAnsPg = "UPDATE quiz_question
					SET question_text = '$question',
						points = '$points',
						answer = '$answerpg'
					WHERE quiz_question_id = '$quiz_question_id' ";

		$aQuery = "UPDATE answer 
				SET answer_text = '$ans1'
				WHERE answer_id = '$anshidden1'";
		$bQuery = "UPDATE answer 
				SET answer_text = '$ans2'
				WHERE answer_id = '$anshidden2'";
		$cQuery = "UPDATE answer 
				SET answer_text = '$ans3'
				WHERE answer_id = '$anshidden3'";
		$dQuery = "UPDATE answer 
				SET answer_text = '$ans4'
				WHERE answer_id = '$anshidden4'";
		$eQuery = "UPDATE answer 
				SET answer_text = '$ans5'
				WHERE answer_id = '$anshidden5'";

		mysqli_query($db, $queryAnsPg) or die(mysqli_error($db));
		mysqli_query($db, $aQuery) or die(mysqli_error($db));
		mysqli_query($db, $bQuery) or die(mysqli_error($db));
		mysqli_query($db, $cQuery) or die(mysqli_error($db));
		mysqli_query($db, $dQuery) or die(mysqli_error($db));
		mysqli_query($db, $eQuery) or die(mysqli_error($db));
	}
	echo "
	<script>
		window.location = 'quiz_question.php?id={$get_id}'
	</script>";
	
}
