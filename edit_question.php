<?php 
include('header_dashboard.php');
include('session.php');

$get_id = $_GET['id'];
$quiz_question_id = $_GET['quiz_question_id'];
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
							<div id="" class="muted pull-left">Ubah Pertanyaan</div>
						</div>

						<div class="block-content collapse in">
							<div class="span12">
								<a href="quiz_question.php<?php echo '?id='.$session_id; ?>" class="btn btn-success"><i class="icon-arrow-left"></i> Kembali</a>

								<?php
								$query = mysqli_query($db, "select * FROM quiz_question
									LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
									where quiz_id = '$get_id'  order by date_added DESC ")or die(mysqli_error($db));
								$row = mysqli_fetch_array($query);
								?>
								<form class="form-horizontal" method="post">
									<div class="control-group">
										<label class="control-label" for="inputPassword">Pertanyaan</label>
										<div class="controls">
											<textarea name="question" id="ckeditor_full" required><?php echo $row['question_text']; ?></textarea>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputEmail">Nilai</label>
										<div class="controls">
											<input type="number" class="span1" name="points" min=1 max=5 value="<?php echo $row['points']; ?>" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputEmail">Jenis Pertanyaan:</label>
										<div class="controls">			
											<select 
											id="qtype" 
											name="question_type" 
											required
											disabled>
												<?php
												$query_question = mysqli_query($db, "select * from question_type")or die(mysqli_error($db));
												$query_question_row = mysqli_fetch_assoc($query_question);
												?>
												<option
												value="<?php echo $query_question_row['question_type_id']; ?>">
												<?php echo $query_question_row['question_type'];  ?>
												</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputEmail"></label>
										<div class="controls">			
											<div id="opt11">
											<?php
											$querysqlz = "SELECT * 
														FROM answer 
														WHERE quiz_question_id";
											$sqlz = mysqli_query($db, $querysqlz);
											while ($row = mysqli_fetch_assoc($sqlz)) {
												if ($row['choices'] == 'A') {
													$a = $row['answer_text'];
												} elseif ($row['choices'] == 'B') {
													$b = $row['answer_text'];
												} elseif ($row['choices'] == 'C') {
													$c = $row['answer_text'];
												} elseif ($row['choices'] == 'D' ) {
													$d = $row['answer_text'];
												}
											}
											?>
											A.)
											<input type="text" name="ans1" size="60" 
											value="<?php echo $a;?>">
											<input type="radio" name="correct_anspg" value="A" 
											<?php echo $row['correct'] == 'A' ? 'checked' : '' ; ?>>
											<br/><br/>
											B.)
											<input type="text" name="ans2" size="60" 
											value="<?php echo $b;?>">
											<input type="radio" name="correct_anspg" value="B" 
											<?php echo $row['correct'] == 'B' ? 'checked' : '' ; ?> >
											<br/><br/>
											C.)
											<input type="text" name="ans3" size="60" 
											value="<?php echo $c;?>">
											<input type="radio" name="correct_anspg" value="C" 
											<?php echo $row['correct'] == 'C' ? 'checked' : '' ; ?>>
											<br/><br/>
											D.)
											<input type="text" name="ans4" size="60" 
											value="<?php echo $d;?>">
											<input type="radio" name="correct_anspg" value="D" 
											<?php echo $row['correct'] == 'D' ? 'checked' : '' ; ?>>
											<br/><br/>
											</div>

											<div id="opt12">
											<input name="correct_anstf" <?php echo $row['answer'] == 'True' ? 'checked' : '' ; ?> value="t" type="radio">Benar<br /><br />
											<input name="correct_anstf" <?php echo $row['answer'] == 'False' ? 'checked' : '' ; ?> value="f" type="radio">Salah<br /><br />
											</div>
										</div>
									</div>

									<div class="control-group">
										<div class="controls">	
											<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Simpan</button>
										</div>
									</div>
								</form>

								<?php
								if (isset($_POST['save'])){
									$question = $_POST['question'];
									$points = $_POST['points'];
									$correct_answer = $_POST['correct_anspg'];
									$type = $_POST['question_type'];
									$answer = $_POST['answer']; 

									$ans1 = $_POST['ans1'];
									$ans2 = $_POST['ans2'];
									$ans3 = $_POST['ans3'];
									$ans4 = $_POST['ans4'];

									if ($type  == '2'){
										// mysqli_query($db, "insert into quiz_question (quiz_id,question_text,date_added,answer,question_type_id) values ('$get_id','$question',NOW(),'".$_POST['correctt']."','$type')")or die(mysqli_error($db));
										$query = "UPDATE quiz_question
												SET question_text = '$question'
													points = '$points'
													answer = '$correct_ans'
												";

									}else{
										mysqli_query($db, "insert into quiz_question (quiz_id,question_text,date_added,points,answer,question_type_id) 
											values('$get_id','$question',NOW(),'$points','$answer','$type')")or die(mysqli_error($db));
										$query = mysqli_query($db, "select * from quiz_question order by quiz_question_id DESC LIMIT 1")or die(mysqli_error($db));
										$row = mysqli_fetch_array($query);
										$quiz_question_id = $row['quiz_question_id'];

										mysqli_query($db, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans1','A')")or die(mysqli_error($db));
										mysqli_query($db, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans2','B')")or die(mysqli_error($db));
										mysqli_query($db, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans3','C')")or die(mysqli_error($db));
										mysqli_query($db, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans4','D')")or die(mysqli_error($db));
									}
									?>
									<script>
										window.location = 'quiz_question.php<?php echo '?id='.$session_id; ?>' 
									</script>
									<?php
								}
								?>
							</div>
						</div>

					</div>
					<!-- /block -->

				</div>
			</div>
		</div>
		<script>
			jQuery(document).ready(function(){
				jQuery("#opt11").hide();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();

				var qtype = $("#qtype").val()
				if (qtype == 1) $("#opt11").show()
				else $("#opt12").show()

				jQuery("#qtype").change(function(){	
					var x = jQuery(this).val();			
					if(x == '1') {
						jQuery("#opt11").show();
						jQuery("#opt12").hide();
						jQuery("#opt13").hide();
					} else if(x == '2') {
						jQuery("#opt11").hide();
						jQuery("#opt12").show();
						jQuery("#opt13").hide();
					}
				});

			});
		</script>
		<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>
</html>