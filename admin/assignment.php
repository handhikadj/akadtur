<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('assignment_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Daftar File Tugas Yang Terupload</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
						
										<thead>
										    <tr>
												<th>Nama File</th>
												<th>Deskripsi</th>
												<th>Tanggal Upload</th>
												<th>Diupload Oleh</th>
												<th>Kelas</th>
											</tr>
												
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($db, "select * FROM assignment
											LEFT JOIN teacher ON teacher.teacher_id = assignment.teacher_id 
											LEFT JOIN teacher_class ON teacher_class.teacher_class_id = assignment.class_id 
											INNER JOIN class ON class.class_id = teacher_class.class_id  ")or die(mysqli_error($db));
										while($row = mysqli_fetch_array($query)){
									?>
							

					
                              
										<tr>

	                                        <td><?php  echo $row['fname']; ?></td>
	                                        <td><?php echo $row['fdesc']; ?></td>
	                                        <td><?php echo $row['fdatein']; ?></td>
	                                        <td><?php echo $row['name'] ?></td>
	                                        <td><?php echo $row['class_name']; ?></td>

                               			</tr>
                         
						 				<?php } ?>
						   
                              
										</tbody>
									</table>
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