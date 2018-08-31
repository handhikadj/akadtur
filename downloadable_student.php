<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
	<?php include('navbar_student.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
			<?php include('downloadable_link_student.php'); ?>
            <div class="span6" id="content">
                <div class="row-fluid">
				    <!-- breadcrumb -->
					<!-- <?php
						$class_query = mysqli_query($db, "select * from teacher_class
						LEFT JOIN class ON class.class_id = teacher_class.class_id
						LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
						where teacher_class_id = '$get_id'")or die(mysqli_error($db));
						$class_row = mysqli_fetch_array($class_query);
						$class_id = $class_row['class_id'];
						$school_year = $class_row['school_year'];
					?> -->
				    <ul class="breadcrumb">
						<!-- <li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
						<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
						<li><a href="#">Tahun Ajara: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li> -->
						<li><a href="#"><b>Daftar Materi Tambahan</b></a></li>
					</ul>
					<!-- end breadcrumb -->
					 
                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
							<?php
								$query = mysqli_query($db, "select * FROM files where class_id = '$get_id' order by fdatein DESC ")or die(mysqli_error($db));
								$count = mysqli_num_rows($query);
							?>
                            <div id="" class="muted pull-right"><span class="badge badge-info"><?php echo $count; ?></span></div>
                        </div>

                        <div class="block-content collapse in">
                            <div class="span12">
								<div class="pull-right">
									Pilih Semua <input type="checkbox"  name="selectAll" id="checkAll" />
									<script>
									$("#checkAll").click(function () {
										$('input:checkbox').not(this).prop('checked', this.checked);
									});
									</script>					
								</div>

								<?php
									$query = mysqli_query($db, "select * FROM files where class_id = '$session_id' order by fdatein DESC ")or die(mysqli_error($db));
									$count = mysqli_num_rows($query);	
									if ($count == '0'){
								?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> Saat ini tidak ada materi tambahan.</div>
								
								<?php
								}else{
								?>
							
								<form action="copy_file_student.php" method="post">
							
								<a data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-info" name=""><i class="icon-copy"></i> Salin Data Dipilih ke backpack</a>
									<?php include('copy_to_backpack_modal.php'); ?>
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
					
									<thead>
								        <tr>
										<th></th>
										<th>Tanggal Unggah</th>
										<th>Nama File</th>
										<th>Deskripsi</th>
										<th>Diunggah oleh</th>
										<th></th>
										</tr>
									</thead>

									<tbody>
	                          		<?php
										$query = mysqli_query($db, "select * FROM files where class_id = '$get_id' order by fdatein DESC ")or die(mysqli_error($db));
										while($row = mysqli_fetch_array($query)){
											$id  = $row['file_id'];
									?>
									<tr>
									<td width="30">
										<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									</td>
	                     
									<td><?php echo $row['fdatein']; ?></td>
	                                <td><?php  echo $row['fname']; ?></td>
	                                <td><?php echo $row['fdesc']; ?></td>                                      
	                                <td><?php echo $row['uploaded_by']; ?></td>                                      
	                                <td width="30">
										<a  data-placement="bottom" title="Download" id="<?php echo $id; ?>Download" href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a>
									</td>            
										<script type="text/javascript">
										$(document).ready(function(){
											$('#<?php echo $id; ?>Download').tooltip('show');
											$('#<?php echo $id; ?>Download').tooltip('hide');
										});
										</script>					 
	                        		</tr>
					 				<?php } ?>
									</tbody>

									</table>
								</form>
								<?php } ?>		
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
			<?php include('downloadable_sidebar_student.php'); ?>
        </div>
	<?php include('footer.php'); ?>
    </div>
	<?php include('script.php'); ?>
</body>
</html>