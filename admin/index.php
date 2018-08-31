<?php include('header.php'); ?>
  <body id="login">
    <div class="container">

      <form id="login_form" class="form-signin" method="post">
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Masuk ke Akun</h3>
        <input type="text" class="input-block-level" id="usernmae" name="username" placeholder="Username" required>
        <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
        <button name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-"></i> Masuk</button>
		
		      </form>
				<script>
			$(document).ready(function(){
			$("#login_form").submit(function(e){
					e.preventDefault();
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(response){
						if(html=='true')
						{
						$.jGrowl("Selamat Datang di SMK KARYA BAHANA MANDIRI 1", { header: 'Akses Diberikan' });
						var delay = 2500;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
						}
						else
						{
						$.jGrowl("Mohon Periksa Kembali Username dan Password", { header: 'Gagal Masuk' });
						}
						}
						
					});
					return false;
				});
			});
			</script>

		


    </div> <!-- /container -->
<?php include('script.php'); ?>
  </body>
</html>