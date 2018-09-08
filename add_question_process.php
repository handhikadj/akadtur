<?php
$get_id = $_GET['id'] ?? '' ;
$quiz_question_id = $_GET['quiz_question_id'] ?? '' ;
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

// Jawaban True/False
$answertf = $_POST['answertf'] ?? '' ;

if (isset($_POST['save'])) {
	// Jika Jenis Pertanyaan == True/False
	if ($type  == '2') {
		$queryAnsTf = "INSERT INTO quiz_question 
					(quiz_id, question_text, date_added, points, answer, question_type_id) 
					VALUES ('$get_id', '$question', NOW(), '$points', '$answertf', '$type')";

		mysqli_query($db, $queryAnsTf) or die(mysqli_error($db));
	} else {
		$queryAnsPg = "INSERT INTO quiz_question 
					(quiz_id, question_text, date_added, points, answer, question_type_id) 
					VALUES ('$get_id', '$question', NOW(), '$points', '$answerpg', '$type')";

		mysqli_query($db, $queryAnsPg) or die(mysqli_error($db));

		// Memasukkan quiz_question_id ke table answer
		$queryFindQuestion = "SELECT * FROM quiz_question
							ORDER BY quiz_question_id DESC LIMIT 1";
		$resultFindQuestion = mysqli_query($db, $queryFindQuestion) or die(mysqli_error($db));

		$row = mysqli_fetch_assoc($resultFindQuestion);
		$quiz_question_id = !empty($row['quiz_question_id']) ? $row['quiz_question_id'] : '' ;

		$aQuery = "INSERT INTO answer 
				(quiz_question_id, answer_text, choices) 
				VALUES ('$quiz_question_id', '$ans1', 'A')";
		$bQuery = "INSERT INTO answer 
				(quiz_question_id, answer_text, choices) 
				VALUES ('$quiz_question_id', '$ans2', 'B')";
		$cQuery = "INSERT INTO answer 
				(quiz_question_id, answer_text, choices) 
				VALUES ('$quiz_question_id', '$ans3', 'C')";
		$dQuery = "INSERT INTO answer 
				(quiz_question_id, answer_text, choices) 
				VALUES ('$quiz_question_id', '$ans4', 'D')";
		$eQuery = "INSERT INTO answer 
				(quiz_question_id, answer_text, choices) 
				VALUES ('$quiz_question_id', '$ans5', 'E')";

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