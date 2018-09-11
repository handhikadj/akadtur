<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body id="class_div">
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('teacher_sidebar.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<!-- <?php
								$school_year_query = mysqli_query($db, "select * from school_year order by school_year DESC")or die(mysqli_error($db));
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?> -->
								<li><a href="#"><b>Daftar Kelas Saya</b></a><!-- <span class="divider">/</span> --></li>
								<!-- <li><a href="#">Tahun Ajaran: <?php echo $school_year_query_row['school_year']; ?></a></li> -->
						</ul>
						 <!-- end breadcrumb -->
                        <!-- block -->
                        <div class="block">
								<div class="navbar navbar-inner block-header">
									<div id="count_class" class="muted pull-right"></div>
								</div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<?php include('teacher_class.php'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
									<script type="text/javascript">
									$(document).ready( function() {
										$('.remove').click( function() {
										var id = $(this).attr("id");
											$.ajax({
											type: "POST",
											url: "delete_class.php",
											data: ({id: id}),
											cache: false,
											success: function(html){
											$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
											$('#'+id).modal('hide');
											$.jGrowl("Kelas Berhasil Dihapus", { header: 'Hapus Kelas' });
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