<?php
include('admin/dbcon.php');
$id = $_POST['id'];
mysqli_query($db, "delete from teacher_class_student where teacher_class_student_id = '$id'")or die(mysqli_error($db));
?>

