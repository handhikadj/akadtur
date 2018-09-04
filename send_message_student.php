<?php
include('admin/dbcon.php');
include('session.php');
$teacher_id = $_POST['teacher_id'];
$my_message = $_POST['my_message'];


$query = mysqli_query($db, "select * from teacher where teacher_id = '$teacher_id'")or die(mysqli_error($db));
$row = mysqli_fetch_array($query);
$name = $row['name'];

$query1 = mysqli_query($db, "select * from student where student_id = '$session_id'")or die(mysqli_error($db));
$row1 = mysqli_fetch_array($query1);
$name1 = $row1['name'];



mysqli_query($db, "insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error($db));
mysqli_query($db, "insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error($db));
?>