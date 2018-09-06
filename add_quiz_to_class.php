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
                            <div id="" class="muted pull-leftt">Tambah Quiz untuk Kelas</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
								<div class="pull-right">
									<a href="teacher_quiz.php<?php echo '?id='.$session_id; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Kembali</a>
								</div>
								
							    <form class="form-horizontal" method="post">
									<div class="control-group">
										<label class="control-label" for="inputEmail">Quiz</label>
										<div class="controls">
										<select name="quiz_id">
											<option></option>
												<?php
													$query = mysqli_query($db, "select * from quiz where teacher_id = '$session_id'")or die(mysqli_error($db));
													while ($row = mysqli_fetch_array($query)){
													 $id = $row['quiz_id'];
												?>
												<option value="<?php echo $id; ?>"><?php echo $row['quiz_title']; ?></option>
												<?php } ?>
										</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputPassword">Waktu Ujian (dalam menit)</label>
										<div class="controls">
											<input type="text" class="span3" name="time" id="inputPassword" placeholder="Waktu Ujian" required>
										</div>
									</div>
		
									<table class="table" id="question">
						                <th></th>
						                <th>Kelas</th>
						                <th>Mata Pelajaran</th>
						                <th></th>
										
										<tbody>
					<?php
						$query = mysqli_query($db, "select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' ")or die(mysqli_error($db));
						// kode original
						// $query = mysqli_query($db, "select * from teacher_class
						// 				LEFT JOIN class ON class.class_id = teacher_class.class_id
						// 				LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
						// 				where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error($db));
										$count = mysqli_num_rows($query);				

										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
					?>
											<tr>
												<td width="30">
													<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['class_name']; ?></td>
												<td><?php echo $row['subject_code']; ?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>

									<div class="control-group">
										<div class="controls">
											<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Simpan</button>
										</div>
									</div>
								</form>
										
								<?php
								if (isset($_POST['save'])){
									$quiz_id = $_POST['quiz_id'];
									$time = $_POST['time'] * 60;
									$id=$_POST['selector'];
									
									$name_notification  = 'Tambah Ujian Quiz file';
											
									$N = count($id);
									for($i=0; $i < $N; $i++)
									{
										mysqli_query($db, "insert into class_quiz (teacher_class_id,quiz_time,quiz_id) values('$id[$i]','$time','$quiz_id')")or die(mysqli_error($db));
										mysqli_query($db, "insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'student_quiz_list.php')")or die(mysqli_error($db));
									} ?>
									<script>
										window.location = "teacher_quiz.php?id=<?php echo $session_id; ?>"
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
	<?php include('footer.php'); ?>
    </div>
	<?php include('script.php'); ?>
</body>
</html>