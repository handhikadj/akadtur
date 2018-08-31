<?php
		include('dbcon.php');
		session_start();
		$username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
		$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

		$query = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'")or die(mysqli_error($db));
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);


		if ($count > 0){
		
		$_SESSION['id']=$row['user_id'];
		
		echo 'true';
		
		mysqli_query($db, "insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysqli_error($db));
		 }else{ 
		echo 'false';
		}	
				
		?>