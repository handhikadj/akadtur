<div class="span3" id="">
	<div class="row-fluid">

        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left"><h4><i class="icon-pencil"></i> Buat Pesan Baru</h4></div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
				
				    <ul class="nav nav-tabs">
						<li class="active">
							<a href="student_message.php">Untuk Guru</a>
						</li>
						<li><a href="student_message_student.php">Untuk Siswa</a></li>
					</ul>


					<form method="post" id="send_message">
						<div class="control-group">
							<label>Ke:</label>
                            <div class="controls">
                                <select name="teacher_id" class="chzn-select" required>
                                  	<option></option>
								<?php
								$query = mysqli_query($db, "select * from teacher order by firstname");
								while($row = mysqli_fetch_array($query)){
								
								?>
								
								<option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
								
								<?php } ?>
                                </select>
                            </div>
                        </div>
					
				
						<div class="control-group">
							<label>Konten:</label>
                          <div class="controls">
							<textarea name="my_message" class="my_message" required></textarea>
                          </div>
                        </div>
						<div class="control-group">
                            <div class="controls">
								<button  class="btn btn-success"><i class="icon-envelope-alt"></i> Kirim </button>
                            </div>
                        </div>
                    </form>

								
			<script>
			jQuery(document).ready(function(){
			jQuery("#send_message").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "send_message_student.php",
						data: formData,
						success: function(html){
						
						$.jGrowl("Pesan Berhasil Dikirim", { header: 'Kirim Pesan' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'student_message.php'  }, delay);  
						
						
						}
						
					});
					return false;
				});
			});
			</script>
			
					
				</div>
            </div>
        </div>
        <!-- /block -->

	</div>
</div>