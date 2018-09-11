<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
	<?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
			<?php include('teacher_sidebar.php'); ?>
            <div class="span9" id="content">
                 <div class="row-fluid">
				  	<!-- breadcrumb -->
					<ul class="breadcrumb">
						<li><a href="#"><b>Pengumuman</b></a></li>
					</ul>
					<!-- end breadcrumb -->
				 
                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left">Daftar Pengumuman</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                            	<a href="add_announcement.php<?php echo '?id='.$session_id; ?>" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Tambah Pengumuman</a>
							<br><br>
							<?php
								$query_announcement = mysqli_query($db, "select * from teacher_class_announcements
																	where teacher_id = '$session_id' order by date DESC
																	")or die(mysqli_error($db));
								// $query_announcement = mysqli_query($db, "select * from teacher_class_announcements
								// 									where teacher_id = '$session_id'  and  teacher_class_id = '$get_id' order by date DESC
								// 									")or die(mysqli_error($db));
								$count = mysqli_num_rows($query_announcement);
								if ($count > 0){
									while($row = mysqli_fetch_array($query_announcement)){
									$id = $row['teacher_class_announcements_id'];
							?>
								<div class="post"  id="del<?php echo $id; ?>">
									<?php echo $row['content']; ?>
							
									<hr>
								
									<strong><i class="icon-calendar"></i> <?php echo $row['date']; ?></strong>
									
									<div class="pull-right">
										<a class="btn btn-link" href="#<?php echo $id; ?>" data-toggle="modal" ><i class="icon-remove"></i> </a>
									</div>
						
									<div class="pull-right">
										<form method="post" action="edit_post.php<?php echo '?id='.$get_id; ?>">
											<input type="hidden" name="id" value="<?php echo $id; ?>">
											<button class="btn btn-link" name="edit"><i class="icon-pencil"></i> </button>
										</form>
									</div>
								
								</div>
							<?php include("remove_sent_message_modal.php"); ?>
							<?php }}else{ ?>
							<div class="alert alert-info"><i class="icon-info-sign"></i> Tidak Ada Pengumuman.</div>
							<?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
							<form method="post">
							<textarea name="content" id="ckeditor_full"></textarea>
							<br>
							<button name="post" class="btn btn-info"><i class="icon-check icon-large"></i> Post</button>
							</form>
                            </div>
							
							<?php
								if (isset($_POST['post'])){
								$content = $_POST['content'];
								mysqli_query($db, "insert into teacher_class_announcements (teacher_class_id,teacher_id,content,date) values('$get_id','$session_id','$content',NOW())")or die(mysqli_error($db));
								mysqli_query($db, "insert into notification (teacher_class_id,notification,date_of_notification,link) value('$get_id','Add Annoucements',NOW(),'announcements_student.php')")or die(mysqli_error($db));
								?>
								<script>
								window.location = 'announcements.php<?php echo '?id='.$get_id; ?>';
								</script>
								<?php
								}
							?>
                        </div>
                    </div> -->
                    <!-- /block -->
                </div> <!-- .row-fluid -->


                </div> <!-- span5 #content -->
				
				<!-- <div class="span4 row-fluid"> -->
					<!-- block -->
                    
                    <!-- /block -->
                <!-- </div> -->


<script type="text/javascript">
	$(document).ready( function() {
		
		$('.remove').click( function() {
		
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_announcements.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your Post is Successfully Deleted", { header: 'Data Delete' });
		
			}
			}); 
			
			return false;
		});				
	});
</script>
					
                </div>
            </div>
			
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>