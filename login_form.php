<form id="login_form1" class="form-signin" method="post">
	<h3 class="form-signin-heading"><i class="icon-lock"></i> Masuk ke Akun</h3>
	<input type="text" class="input-block-level" id="username" name="username" placeholder="Username">
	<input type="password" class="input-block-level" id="password" name="password" placeholder="Password">
	<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Masuk</button>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#signin').tooltip('show');
		$('#signin').tooltip('hide');
	});
	</script>
</form>
	<script>
	$(document).ready(function(){
	$("#login_form1").submit(function(e){
			e.preventDefault();
			var formData = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "login.php",
				data: formData,
				dataType: "JSON",
				success: function(response){
					console.log(response)
					if(response.success == 'true_teacher') {
						console.log(response.success)
						$.jGrowl("Mohon Tunggu Sebentar......", { sticky: true });
						$.jGrowl("Selamat Datang di E-Learning SMK KARYA BAHANA MANDIRI 1", { header: 'Akses Diberikan' });
						var delay = 1500;
						setTimeout(function(){ window.location.href = 'dasboard_teacher.php'  }, delay);  
					} else if (response.success == 'true_student') {
						console.log(response.success)
						$.jGrowl("Selamat Datang di E-Learning SMK KARYA BAHANA MANDIRI 1", { header: 'Akses Diberikan' });
						var delay = 1500;
						setTimeout(function(){ window.location = 'dashboard_student.php'  }, delay);  
					} else {
						console.log(response.message)
						$.jGrowl(response.message, { header: 'Gagal Masuk' });
						$("#username").css('border', '2px solid red')
						$("#password").css('border', '2px solid red')
					}
					
				}
			});
			return false;
		});
	});
	</script>

	<div id="button_form" class="form-signin" >
	Baru di E-Learning <br>SMK KARYA BAHANA MANDIRI 1
	<hr>
		<h3 class="form-signin-heading"><i class="icon-edit"></i> Daftar</h3>
		<button data-placement="top" title="Sign In as Student" id="signin_student" onclick="window.location='signup_student.php'" id="btn_student" name="login" class="btn btn-info" type="submit">Sebagai Murid</button>
		<div class="pull-right">
			<button data-placement="top" title="Sign In as Teacher" id="signin_teacher" onclick="window.location='signup_teacher.php'" name="login" class="btn btn-info" type="submit">Sebagai Guru</button>
		</div>
	</div>

		<script type="text/javascript">
		$(document).ready(function(){
			$('#signin_student').tooltip('show'); $('#signin_student').tooltip('hide');
		});
		</script>	
		<script type="text/javascript">
		$(document).ready(function(){
			$('#signin_teacher').tooltip('show'); $('#signin_teacher').tooltip('hide');
		});
		</script>