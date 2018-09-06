<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
	<?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
			<?php include('quiz_sidebar_teacher.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
				    <!-- breadcrumb -->	
					<ul class="breadcrumb">
						<li><a href="#"><b>Quiz</b></a></li>
					</ul>
					<!-- end breadcrumb -->

                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left">Tambah Quiz</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
								<div class="pull-right">
									<a href="teacher_quiz.php<?php echo '?id='.$session_id; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Kembali</a>
								</div>
							
								<form class="form-horizontal" method="post">
									<div class="control-group">
										<label class="control-label" for="inputEmail">Nama Quiz</label>
										<div class="controls">
											<input type="text" class="span8" name="quiz_title" id="inputEmail" placeholder="Nama Quiz (Max. 50 Karakter)" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputPassword">Deskripsi Quiz</label>
										<div class="controls">
											<input type="text" class="span8" name="description" id="inputPassword" placeholder="Deskripsi Quiz (Max. 100 Karakter)" required>
										</div>
									</div>

									

									<div class="control-group">
										<div class="controls">										
											<button name="save" type="submit" class="btn btn-success"><i class="icon-save"></i> Simpan</button>
										</div>
									</div>
								</form>
								<?php
								if (isset($_POST['save'])) :
									$quiz_title = $_POST['quiz_title'];
									$description = $_POST['description'];
									
									mysqli_query($db, "insert into quiz (quiz_title,quiz_description,date_added,teacher_id) values('$quiz_title','$description',NOW(),'$session_id')")or die(mysqli_error($db));
								?>
								<script>
									window.location = "teacher_quiz.php?id=<?php echo $session_id; ?>";
								</script>
								<?php endif ?>

                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
	<?php include('footer.php'); ?>
    </div>
	<?php include('script.php'); ?>
</body>
</html>