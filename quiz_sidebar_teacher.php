<div class="span3" id="sidebar">
	<img id="avatar" class="img-polaroid" src="admin/<?php echo $row['location']; ?>">
	<?php include('teacher_count.php'); ?>
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<!-- menu kelas -->
		<li class=""><a href="dasboard_teacher.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Kelas</a></li>
		<!-- akhir menu kelas -->

		<!-- menu pemberitahuan -->
		<li class=""><a href="notification_teacher.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Pemberitahuan
			<?php if($not_read == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
			<?php } ?>
		</a></li>
		<!-- akhir menu pemberitahuan -->

		<!-- menu pesan -->
		<li class=""><a href="teacher_message.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Pesan</a></li>
		<!-- akhir menu pesan -->

		<!-- <li class=""><a href="teacher_backack.php"><i class="icon-chevron-right"></i><i class="icon-suitcase"></i>&nbsp;Backpack</a></li> -->
		
		<!-- materi tambahan -->
		<li class=""><a href="downloadable.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Materi Tambahan</a></li> 
		<!-- akhir materi tambahan -->

		<!-- menu pengumuman -->
		<li class=""><a href="announcements.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Pengumuman</a></li>
		<!-- akhir menu pengumuman -->
		
		<!-- menu tugas -->
		<li class=""><a href="assignment.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Tugas</a></li>
		<!-- akhir menu tugas -->

		<!-- <li class=""><a href="add_assignment.php"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Tambah Tugas</a></li> -->

		<!-- menu quiz -->
		<li class="active"><a href="teacher_quiz.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-list"></i>&nbsp;Quiz</a></li>
		<!-- akhir menu quiz -->

		<!-- menu kalender akademik -->
		<li class=""><a href="class_calendar.php<?php echo '?id='.$session_id; ?>"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>&nbsp;Kalender Akademik</a></li>
		<!-- akhir menu kalender akademik -->

		<!-- <li class=""><a href="teacher_share.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Shared Files</a></li> -->
	</ul>
</div>

