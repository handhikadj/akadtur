 <?php
 include('dbcon.php');
 include('session.php');
 $new_password  = $_POST['new_password'];
 mysqli_query($db, "update student set password = '$new_password' where student_id = '$session_id'")or die(mysqli_error($db));
 ?>