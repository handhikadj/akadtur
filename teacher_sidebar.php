<?php 
$uri = $_SERVER['REQUEST_URI'];
$uri = substr($uri, 1);
$uri = explode(".", $uri);
$url = $uri[0];
?>

<div class="span3" id="sidebar">
	<img id="avatar" class="img-polaroid" src="admin/<?php echo $row['location']; ?>">
	<?php include('teacher_count.php'); ?>
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">		
		<!-- menu kelas -->
		<?php if ($url == "dasboard_teacher" || $url == "my_students" || $url == "print_student"): ?>
			<li class="active"><a href="dasboard_teacher.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Kelas</a></li>
		<?php else: ?>
			<li class=""><a href="dasboard_teacher.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Kelas</a></li>
		<?php endif ?>
		
		<!-- akhir menu kelas -->

		<!-- menu pemberitahuan -->
		<?php if ($url == "notification_teacher"): ?>
			<li class="active"><a href="notification_teacher.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Pemberitahuan
				<?php if ($not_read > 0): ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php endif ?>
			</a></li>
		<?php else: ?>
			<li class=""><a href="notification_teacher.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Pemberitahuan
				<?php if ($not_read == "0"): ?>
				<?php else: ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php endif ?>
			</a></li>
		<?php endif ?>

		<!-- menu pesan -->
		<!-- <li class=""><a href="teacher_message.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Pesan</a></li> -->
		<!-- akhir menu pesan -->

		<!-- <li class=""><a href="teacher_backack.php"><i class="icon-chevron-right"></i><i class="icon-suitcase"></i>&nbsp;Backpack</a></li> -->
		
		<!-- materi tambahan -->
		<!-- <li class=""><a href="downloadable.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Materi Tambahan</a></li>  -->
		<!-- akhir materi tambahan -->

		<!-- tambah materi tambahan -->
		<!-- <li class=""><a href="add_downloadable.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Tambah Materi Tambahan</a></li>  -->
		<!-- akhir tambah materi tambahan -->

		<!-- menu pengumuman -->
		<?php if ($url == "announcements" || $url == "add_announcement"): ?>
			<li class="active"><a href="announcements.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Pengumuman</a></li>
		<?php else: ?>
			<li class=""><a href="announcements.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Pengumuman</a></li>		
		<?php endif ?>
		
		<!-- akhir menu pengumuman -->
		
		<!-- menu tugas -->
		<?php if ($url == "assignment" || $url == "add_assignment" || $url == "view_submit_assignment"): ?>
			<li class="active"><a href="assignment.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Tugas</a></li>
		<?php else: ?>
			<li class=""><a href="assignment.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Tugas</a></li>
		<?php endif ?>
		
		<!-- akhir menu tugas -->

		<!-- <li class=""><a href="add_assignment.php"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Tambah Tugas</a></li> -->

		<!-- menu quiz -->
		<?php 
		if ($url == "teacher_quiz" || $url == "add_quiz" || $url == "add_quiz_to_class" || $url == "quiz_question" || $url == "add_question" || $url == "edit_question" || $url == "edit_quiz"): 
		?>
			<li class="active"><a href="teacher_quiz.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-list"></i>&nbsp;Quiz</a></li>	
		<?php else: ?>
			<li class=""><a href="teacher_quiz.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-list"></i>&nbsp;Quiz</a></li>
		<?php endif ?>
		
		<!-- akhir menu quiz -->

		<!-- menu kalender akademik -->
		<?php if ($url == "class_calendar"): ?>
			<li class="active"><a href="class_calendar.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>&nbsp;Kalender Akademik</a></li>	
		<?php else: ?>
			<li class=""><a href="class_calendar.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>&nbsp;Kalender Akademik</a></li>	
		<?php endif ?>
		
		<!-- akhir menu kalender akademik -->

		<!-- <li class=""><a href="teacher_share.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Shared Files</a></li> -->
		<?php
			ob_start();
			include('search_other_class.php');
			ob_end_clean();
		?>
	</ul>
</div>
