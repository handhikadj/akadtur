<?php
	include('admin/dbcon.php');
	include('session.php');
	if (isset($_POST['read'])){
		$id=$_POST['selector'];
		$N = count($id);
		for($i=0; $i < $N; $i++)
		{

			mysqli_query($db, "insert into notification_read (student_id,student_read,notification_id) values('$session_id','yes','$id[$i]')")or die(mysqli_error($db));

		}
?>
<script>
	window.location = 'student_notification.php';
</script>
<?php
	}
?>
