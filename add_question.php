<?php 
include('header_dashboard.php');
include('session.php');
include('add_question_process.php');
?>

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
                        <div id="" class="muted pull-left">Tambah Pertanyaan</div>
                    </div>

                    <div class="block-content collapse in">
                        <div class="span12">
                        	<a href="quiz_question.php?id=<?php echo $get_id; ?>" class="btn btn-success"><i class="icon-arrow-left"></i> Kembali</a>

					    	<form class="form-horizontal" method="post">

						        <div class="control-group">
									<label class="control-label" for="inputPassword">Pertanyaan</label>
									<div class="controls">
										<textarea name="question" id="ckeditor_full" required></textarea>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputEmail">Nilai</label>
									<div class="controls">
										<input type="number" class="span1" name="points" min=1 max=5 required>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputEmail">Jenis Pertanyaan:</label>
									<div class="controls">			
										<select id="qtype" name="question_type" required>
											<option value="">--Silahkan Pilih--</option>
											<?php

											$findAllQuestion = "SELECT * FROM question_type";
											$query_question = mysqli_query($db, $findAllQuestion) 
											or die(mysqli_error($db));

											while ($query_question_row = mysqli_fetch_array($query_question)) :
											?>
											<option value="<?php echo $query_question_row['question_type_id']; ?>">
												<?php echo $query_question_row['question_type']; ?>
											</option>
											<?php endwhile; ?>
											<!-- end of $question_question_row -->
										</select>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputEmail"></label>
									<div class="controls">			
										<div id="opt11">
											A: <input type="text" name="ans1" size="60">
											<input name="answerpg" value="A" type="radio">
											<br><br>
											B: <input type="text" name="ans2" size="60">
											<input name="answerpg" value="B" type="radio">
											<br><br>
											C: <input type="text" name="ans3" size="60">
											<input name="answerpg" value="C" type="radio">
											<br><br>
											D: <input type="text" name="ans4" size="60">
											<input name="answerpg" value="D" type="radio">
											<br><br>
											E: <input type="text" name="ans5" size="60">
											<input name="answerpg" value="E" type="radio">
											<br><br>
										</div>

										<div id="opt12">
											<input name="answertf" value="True" type="radio">True
											<br><br>
											<input name="answertf"  value="False" type="radio">False
											<br><br>
										</div>
									</div>
								</div>

								<div class="control-group">
									<div class="controls">
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Simpan</button>
									</div>
								</div>
							</form>
	
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div> <!-- end of span9 id content -->

    </div> <!-- end of row-fluid -->
	<?php include('footer.php'); ?>
</div> <!-- end of container fluid -->

<?php include('script.php'); ?>
</body>
</html>