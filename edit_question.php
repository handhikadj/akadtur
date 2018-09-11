<?php 
include('header_dashboard.php');
include('session.php');
require_once 'edit_question_process.php';
?>
<body>
<?php include('navbar_teacher.php'); ?>
<div class="container-fluid">
	<div class="row-fluid">

		<?php include('teacher_sidebar.php'); ?>
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
							<a href="quiz_question.php?id=<?php echo $get_id; ?>"
							class="btn btn-success">
								<i class="icon-arrow-left"></i> Kembali
							</a>
							<form class="form-horizontal" method="post">

								<div class="control-group">
									<label class="control-label" for="inputPassword">Pertanyaan</label>
									<div class="controls">
										<textarea name="question" id="ckeditor_full" required>
											<?php echo $rowQuestion['question_text']; ?>
										</textarea>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputEmail">Nilai</label>
									<div class="controls">
										<input type="number" class="span1" name="points" min=1 max=5 value="<?php echo $rowQuestion['points']; ?>" required>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputEmail">Jenis Pertanyaan:</label>
									<div class="controls">			
										<select 
										id="qtype" 
										name="question_type" 
										required
										readonly>
											<option
											value="<?php echo $rowQuestion['question_type_id']; ?>">
											<?php echo $rowQuestion['question_type'];  ?>
											</option>
										</select>
									</div>
								</div>
							
								<div class="control-group">
									<label class="control-label" for="inputEmail"></label>
									<div class="controls">			
										<div id="opt11">
										<input type="hidden" name="anshidden1" 
										value="<?php echo $getAnsText[0]['answer_id']; ?>">
										<input type="hidden" name="anshidden2" 
										value="<?php echo $getAnsText[1]['answer_id']; ?>">
										<input type="hidden" name="anshidden3" 
										value="<?php echo $getAnsText[2]['answer_id']; ?>">
										<input type="hidden" name="anshidden4" 
										value="<?php echo $getAnsText[3]['answer_id']; ?>">
										<input type="hidden" name="anshidden5" 
										value="<?php echo $getAnsText[4]['answer_id']; ?>">
										A.)
										<input type="text" name="ans1" size="60" 
										value="<?php echo $getAnsText[0]['answer_text'];?>">
										<input type="radio" name="answerpg" value="A" 
										<?php echo $rowQuestion['answer'] == 'A' ? 'checked' : '' ; ?>>
										<br/><br/>
										B.)
										<input type="text" name="ans2" size="60" 
										value="<?php echo $getAnsText[1]['answer_text'];?>">
										<input type="radio" name="answerpg" value="B" 
										<?php echo $rowQuestion['answer'] == 'B' ? 'checked' : '' ; ?> >
										<br/><br/>
										C.)
										<input type="text" name="ans3" size="60" 
										value="<?php echo $getAnsText[2]['answer_text'];?>">
										<input type="radio" name="answerpg" value="C" 
										<?php echo $rowQuestion['answer'] == 'C' ? 'checked' : '' ; ?>>
										<br/><br/>
										D.)
										<input type="text" name="ans4" size="60" 
										value="<?php echo $getAnsText[3]['answer_text'];?>">
										<input type="radio" name="answerpg" value="D" 
										<?php echo $rowQuestion['answer'] == 'D' ? 'checked' : '' ; ?>>
										<br/><br/>
										E.)
										<input type="text" name="ans5" size="60" 
										value="<?php echo $getAnsText[4]['answer_text'];?>">
										<input type="radio" name="answerpg" value="E" 
										<?php echo $rowQuestion['answer'] == 'E' ? 'checked' : '' ; ?>>
										<br/><br/>
										</div>

										<div id="opt12">
										<input name="answertf" 
										<?php echo $rowQuestion['answer'] == "True" ? 'checked' : '' ; ?> value="True" type="radio">
										Benar<br /><br />

										<input name="answertf" 
										<?php echo $rowQuestion['answer'] == "False" ? 'checked' : '' ; ?> 
										value="False" type="radio">Salah<br /><br />
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

		</div> <!-- end of row fluid -->
	</div> <!-- end of container fluid -->
	
	<?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
</body>
</html>