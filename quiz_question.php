<?php 
include('header_dashboard.php');
include('session.php');
$get_id = $_GET['id']; 
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
							<div id="" class="muted pull-left">Daftar Pertanyaan</div>
						</div>

						<div class="block-content collapse in">
							<div class="span12">
								<div class="pull-right">
									<div class="container-for-excel">
										<a href="teacher_quiz.php?id=<?php echo $session_id; ?>" class="btn btn-success"><i class="icon-arrow-left"></i> Kembali</a>
										<form 
										id="excel-questions-form"
										class="form-excel-students" 
										action="add_question_excel_process.php" 
										method="post" enctype="multipart/form-data"
										target="_blank">
											<div class="input-file-container">
												<input type="hidden" 
												id="get-id-excel"
												name="hidden-excel" 
												value="<?php echo $get_id; ?>"
												>
												<input 
												type="file"
												class="input-file" 
												id="my-file" 
												name="file-quiz-question">
												<label 
												tabindex="0" 
												for="my-file" 
												class="btn btn-warning for-excel-label">
													<i class="icon-upload the-upload-excel"></i>Import Excel
												</label>
											</div>
											<p class="file-return"></p>
										</form>
										<a href="add_question.php?id=<?php echo $get_id; ?>" class="btn btn-info"><i class="icon-plus-sign"></i> Tambah Pertanyaan</a>
									</div>
								</div>
								<form action="delete_quiz_question.php" method="post">
									<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
										<a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
										<?php include('modal_delete_quiz_question.php'); ?>
										<div id="for-loader-excel" style="width: 0%;"></div>
										<thead>
											<tr>
												<th />
												<th>No.</th>
												<th>Pertanyaan</th>
												<th>Nilai</th>
												<th>Jenis Pertanyaan</th>
												<th>Jawaban</th>
												<th>Tanggal Ditambahkan</th>
											</tr>
										</thead>

										<tbody>
											<?php
											$query = "SELECT * FROM quiz_question 
													LEFT JOIN question_type 
													ON quiz_question.question_type_id=question_type.question_type_id 
													WHERE quiz_id = '$get_id' 
													ORDER BY date_added ASC";
											$result = mysqli_query($db, $query) or die(mysqli_error($db));
											$no_oto = 1;
											while($row = mysqli_fetch_array($result)){
												$id  = $row['quiz_question_id'];
											?>
												<tr id="del<?php echo $id; ?>">
													<td width="30">
														<input 
														type="checkbox"
														id="optionsCheckbox" 
														name="selector[]" 
														value="<?php echo $id; ?>">
													</td>
													<td>
														<?php echo $no_oto++ ?>
													</td>
													<td>
														<div id="substr-qtext">
														<?php echo $row['question_text']; ?>
														</div>
													</td>
													<td><?php echo $row['points']; ?></td>
													<td><?php echo $row['question_type']; ?></td>
													<td><?php echo $row['answer']; ?></td>
													<td><?php echo $row['date_added']; ?></td>
													<td width="30">
														<a 
														href="edit_question.php?id=<?php echo $get_id; ?>&quiz_question_id=<?php echo $id; ?>" 
														class="btn btn-success">
															<i class="icon-pencil"></i>
														</a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</form>
								
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