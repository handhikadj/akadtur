<?php
require_once 'dbcon.php';

$teacherId = $_GET['teacher_id'];

$queryGetTeacher = "SELECT * FROM teacher WHERE teacher_id = '$teacherId' ";
$resultGetTeacher = mysqli_query($db, $queryGetTeacher);
$rowGetTeacher = mysqli_fetch_assoc($resultGetTeacher);

$data = [
	"data"		=> $rowGetTeacher,
	"success"	=> true
];

echo json_encode($data);
