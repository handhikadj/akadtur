<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<?php
 	$get_id1 = $_POST['id'];
 ?>
<body>
	<?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
			<?php include('annoucement_link.php'); ?>
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
                            <div id="" class="muted pull-left">Ubah Pengumuman</div>
                        </div>

                        <div class="block-content collapse in">
                            <div class="span12">
                            	<a href="announcements.php<?php echo '?id='.$session_id; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Kembali</a>

								<form method="post">
								<?php
									$query_announcement = mysqli_query($db, "select * from teacher_class_announcements
																		where teacher_id = '$session_id' and teacher_class_announcements_id = '$get_id1' order by date DESC")or die(mysqli_error($db));
									$row = mysqli_fetch_array($query_announcement);
									$id = $row['teacher_class_announcements_id'];
								?>
									<br>
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<textarea name="content" id="ckeditor_full">
									<?php echo $row['content']; ?>
									</textarea>
									<br>
									<button name="post" class="btn btn-info"><i class="icon-check icon-large"></i> Simpan</button>
								</form>
                            </div>
								
							<?php
								if (isset($_POST['post'])){
								$content = $_POST['content'];
								$id = $_POST['id'];
								
								mysqli_query($db, "update teacher_class_announcements  set content = '$content' where teacher_class_announcements_id = '$id' ")or die(mysqli_error($db));
								?>
								<script>
								 	window.location = 'announcements.php<?php echo '?id='.$session_id; ?>'; 
								</script>
								<?php
								}
							?>
                        </div>
                    </div>
                    <!-- /block -->

                </div>
            </div>
				
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
			$.jGrowl("Pengumuman Berhasil Dihapus", { header: 'Hapus Pengumuman' });
		
			}
			}); 
			
			return false;
		});				
	});
</script>
					
	    </div>
	</div>

	<?php include('footer.php'); ?>
	<?php include('script.php'); ?>
</body>
</html>