<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body id="class_div">
	<?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
			<?php include('teacher_add_announcement_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
				    <!-- breadcrumb -->	
				    <ul class="breadcrumb">
						<li><a href="#"><b>Pengumuman</b></a></li>
					</ul>
					<!-- end breadcrumb -->
					 
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Tambah Pengumuman</div>
                        </div>

				<script>
					jQuery(document).ready(function($){
						$("#add_downloadble").submit(function(e){
							e.preventDefault();
							var formData = $(this).serialize();
							$.ajax({
								type: "POST",
								url: "add_announcement_save.php",
								data: formData,
								success: function(html){
									$.jGrowl("Pengumuman Berhasil Ditambahkan", { header: 'Tambah Pengumuman' });
									window.location = 'announcements.php<?php echo "?id=".$session_id; ?>';
								}

							});
						});
					});
					</script>

                        <div class="block-content collapse in">
                            <div class="span8">
								<form class="" id="add_downloadble" method="post"  >
			                        <div class="control-group">
			                            <div class="controls">
			                            	<a href="announcements.php<?php echo '?id='.$session_id; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Kembali</a>
			                            	<br><br>
											<textarea name="content" id="ckeditor_full"></textarea>
											<br>
											<center>
												<div class="control-group">
													<div class="controls">
														<button name="Upload" type="submit" value="Upload" class="btn btn-success" /><i class="icon-check"></i>&nbsp;Menerbitkan</button>
													</div>
												</div>
											</center>
			                            </div>
			                        </div>
					
									</div> <!-- akhir div .container-fluid -->
									<div class="span4">								
										<div class="alert alert-info">
											Pilih kelas yang anda ingin bagikan pengumuman ini.
										</div>
					
										<div class="pull-left">
											Pilih Semua <input type="checkbox"  name="selectAll" id="checkAll" />
											<script>
											$("#checkAll").click(function () {
												$('input:checkbox').not(this).prop('checked', this.checked);
											});
											</script>
										</div>

										<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
											<thead>
										        <tr>
												<th></th>
												<th>Nama Kelas</th>
												<th>Kode Mata Pelajaran</th>
												</tr>
											</thead>

											<tbody>
                              		<?php
	                              		$query = mysqli_query($db, "select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' ")or die(mysqli_error($db));
										// $query = mysqli_query($db, "select * from teacher_class
										// LEFT JOIN class ON class.class_id = teacher_class.class_id
										// LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										// where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error($db));
										$count = mysqli_num_rows($query);

										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
									?>                             
												<tr id="del<?php echo $id; ?>">
													<td width="30">
														<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $row['class_name']; ?></td>
													<td><?php echo $row['subject_code']; ?></td>
												</tr>
                         
									<?php } ?>

											</tbody>
										</table>
                                	</div>

								</form>
                            </div>
                        </div>
                        
                    </div>
                    <!-- /block -->
            </div>
        </div>
	<?php include('footer.php'); ?>
    </div>
	<?php include('script.php'); ?>
</body>
</html>