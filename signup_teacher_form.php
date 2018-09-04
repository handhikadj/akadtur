<form id="email_teacher" class="form-signin" method="post">
	<h3 class="form-signin-heading"><i class="icon-lock"></i> Daftar Sebagai Guru</h3>
	<input type="text" class="input-block-level" name="email_teacher" placeholder="Email" required>
	<button id="signin_emailt" name="submit_email_teacher" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Daftar</button>
</form>

<form id="signin_teacher_form" class="form-signin signin_teacher_hide" method="post">
	<h3 class="form-signin-heading"><i class="icon-lock"></i> Daftar Sebagai Guru</h3>
	<input type="text" class="input-block-level" name="token" placeholder="Kode Aktivasi" required>
	<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
	<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
	<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Masukkan Kembali Password" required>
	<button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Daftar</button>
</form>

<script>
jQuery(document).ready(function(){
	jQuery("#signin_teacher_form").submit(function(e){
		e.preventDefault();
		var password = jQuery('#password').val();
		var cpassword = jQuery('#cpassword').val();
		if (password == cpassword) {
			var formData = jQuery(this).serialize();
			$.ajax({
				type: "POST",
				url: "teacher_signup.php",
				data: formData,
				dataType: "JSON",
				success: function(response) {
					console.log(response);
					if (response.not_token) {
						$.jGrowl("Kode aktivasi salah", { header: 'Daftar Gagal' });
					} else if (response.is_registered) {
						$.jGrowl(response.is_registered, { header: 'Daftar Gagal' });
					} else {
						$.jGrowl("Selamat Datang di SAKURA PUTIH Learning Management System",
						{ header: 'Daftar Berhasil' });
						var delay = 2000;
						setTimeout(function(){ window.location = 'dasboard_teacher.php' }, delay); 
					}
				}
			});
		} else {
			$.jGrowl("Konfirmasi password tidak sama!", { header: 'Daftar Gagal' });
		}
	});
});
</script>
<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Klik disini untuk Masuk ke akun</a>