<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
	<?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
			<?php include('calendar_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
					<!-- breadcrumb -->
					<ul class="breadcrumb">
						<li><a href="#"><b>Kalender Akademik</b></a></li>
					</ul>
					<!-- end breadcrumb -->

                        <!-- block -->
                        <div id="block_bg" class="block">
							<div class="block-content collapse in">
								<div class="span8">
						<!-- block -->
									<div class="navbar navbar-inner block-header">
										<div class="muted pull-left">Kalender</div>
									</div>

									<div id='calendar'></div>		
								</div>
									
								<div class="span4">
									<?php include('add_class_event.php'); ?>
								</div>
						<!-- block -->
							</div>
                        </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        
	<?php include('footer.php'); ?>
    
	<?php include('script.php'); ?>
	<?php include('class_calendar_script.php'); ?>
</body>
</html>