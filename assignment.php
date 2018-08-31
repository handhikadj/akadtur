<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
	<?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
			<?php include('assignment_link.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
				    
				    <!-- breadcrumb -->
					<ul class="breadcrumb">
						<li><a href="#"><b>Tugas</b></a></li>
					</ul>
					<!-- end breadcrumb -->

                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                        	<?php $query = mysqli_query($db, "select * FROM assignment where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error($db)); 
								  $count  = mysqli_num_rows($query);
							?>
                            <div id="" class="muted pull-right">
                            	<span class="badge badge-info"><?php echo $count; ?></span>
                            </div>
                            <div class="muted pull-left">Daftar Tugas</div>
                        </div>

                        <div class="block-content collapse in">
                            <div class="span12">
                            	<a href="add_assignment.php<?php echo '?id='.$session_id; ?>" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Tambah Tugas</a>
                            	<br><br>
                            	<?php
									$query = mysqli_query($db, "select * FROM assignment where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error($db));
									$count = mysqli_num_rows($query);
									if ($count == '0'){?>
									<div class="alert alert-info">Tidak Ada Tugas Yang Terupload Saat Ini</div>
									<?php
									}else{
								?>
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
									<thead>
									        <tr>
											<th>Tanggal Unggah</th>
											<th>Nama File</th>
											<th>Deskripsi</th>
											<th></th>
											</tr>
									</thead>
									<tbody>
												
	                          		<?php
										$query = mysqli_query($db, "select * FROM assignment where class_id = '$get_id' and teacher_id = '$session_id' order by fdatein DESC ")or die(mysqli_error($db));
										while($row = mysqli_fetch_array($query)){
											$id  = $row['assignment_id'];
											$floc  = $row['floc'];
									?>
										<tr>
											<td><?php echo $row['fdatein']; ?></td>
		                                    <td><?php  echo $row['fname']; ?></td>
		                                    <td><?php echo $row['fdesc']; ?></td>                                      
		                                    <td width="150">
												<form method="post" action="view_submit_assignment.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$id ?>">
												 	<button data-placement="bottom" title="Lihat Siapa Siswa Yang Sudah Mengirimkan Tugas" id="<?php echo $id; ?>view" class="btn btn-success"><i class="icon-folder-open-alt icon-large"></i></button>
												</form>

												<?php 
												if ($floc == ""){
												}else{
												?>
													<a data-placement="bottom" title="Download" id="<?php echo $id; ?>download"  class="btn btn-info" href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a>
												<?php } ?>
													<a data-placement="bottom" title="Remove" id="<?php echo $id; ?>remove" class="btn btn-danger"  href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-remove icon-large"></i></a>
												<?php include('delete_assigment_modal.php'); ?>
											</td>
												<script type="text/javascript">
												$(document).ready(function(){
													$('#<?php echo $id; ?>download').tooltip('show');
													$('#<?php echo $id; ?>download').tooltip('hide');
												});
												</script>
												<script type="text/javascript">
												$(document).ready(function(){
													$('#<?php echo $id; ?>remove').tooltip('show');
													$('#<?php echo $id; ?>remove').tooltip('hide');
												});
												</script>
												<script type="text/javascript">
												$(document).ready(function(){
													$('#<?php echo $id; ?>view').tooltip('show');
													$('#<?php echo $id; ?>view').tooltip('hide');
												});
												</script>
	                                	</tr>
									<?php } ?>
									</tbody>
								</table>
								<?php } ?>
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