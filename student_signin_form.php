			<form id="signin_student" class="form-signin" method="post">
				<h3 class="form-signin-heading"><i class="icon-lock"></i> Daftar Sebagai Siswa</h3>
				<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
				<input type="text" class="input-block-level" id="firstname" name="firstname" placeholder="Nama Depan" required>
				<input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Nama Belakang" required>
				<label>Kelas</label>
				<select name="class_id" class="input-block-level span5">
					<option></option>
					<?php
					$query = mysqli_query($db, "select * from class order by class_name ")or die(mysqli_error($db));
					while($row = mysqli_fetch_array($query)){
						?>
						<option value="<?php  echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
						<?php
					}
					?>
				</select>
				<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
				<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Masukkan Kembali Password" required>
				<button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Daftar</button>
			</form>
			
			
			
			<script>
				jQuery(document).ready(function(){
					jQuery("#signin_student").submit(function(e){
						e.preventDefault();
						
						var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
						
						
						if (password == cpassword){
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								url: "student_signup.php",
								data: formData,
								success: function(html){
									if(html=='true')
									{
										$.jGrowl("Selamat Datang di SAKURA PUTIH Learning Management System", { header: 'Daftar Berhasil' });
										var delay = 2500;
										setTimeout(function(){ window.location = 'dashboard_student.php'  }, delay);  
									}else if(html=='false'){
										$.jGrowl("Data Siswa Tidak Ditemukan di Database.", { header: 'Daftar Gagal' });
									}
								}
								
								
							});
							
						}else
						{
							$.jGrowl("Data Siswa Tidak Ditemukan di Database, Harap Pastikan Kembali untuk Memeriksa Username Anda atau Nama Depan, Nama Belakang dan Bagian Yang Anda Isi Dengan Benar.", { header: 'Daftar Gagal' });
						}
					});
				});
			</script>

			
			
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Klik disini untuk Masuk ke akun</a>
			
			
			
			
			
			