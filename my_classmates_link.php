<div class="span3" id="sidebar">
	<img id="avatar" src="admin/<?php echo $row['location']; ?>" class="img-polaroid">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
				<li class="active"><a href="dashboard_student.php"><i class="icon-chevron-right"></i><i class="icon-chevron-left"></i>&nbsp;Kembali</a></li>
				<!-- <li class="active"><a href="my_classmates.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Teman Sekelas Saya</a></li> -->
				<li class=""><a href="progress.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-bar-chart"></i>&nbsp;Perkembangan Saya</a></li>

				<!-- menu perkembangan saya -->
				<li class="">
					<a href="student_notification.php"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Pemberitahuan
					<?php if($not_read == '0'){
					}else{ ?>
						<span class="badge badge-important"><?php echo $not_read; ?></span>
					<?php } ?>
					</a>
				</li>
				<!-- akhir menu perkembangan saya -->

				<!-- menu pesan -->
				<?php
				$message_query = mysqli_query($db, "select * from message where reciever_id = '$session_id' and message_status != 'read' ")or die(mysqli_error($db));
				$count_message = mysqli_num_rows($message_query);
				?>
				<li class="">
				<a href="student_message.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Pesan
					<?php if($count_message == '0'){
					}else{ ?>
						<span class="badge badge-important"><?php echo $count_message; ?></span>
					<?php } ?>
				</a>
				</li>
				<!-- akhir menu pesan -->
				<!-- <li class=""><a href="subject_overview_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Subject Overview</a></li> -->
				<li class=""><a href="downloadable_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-download"></i>&nbsp;Materi Yang Dapat Diunduh</a></li>
				<li class=""><a href="assignment_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Tugas</a></li>
				<li class=""><a href="announcements_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Pengumuman</a></li>
				<li class=""><a href="class_calendar_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>&nbsp;Kalender Kelas</a></li>
				<li class=""><a href="student_quiz_list.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-reorder"></i>&nbsp;Quiz</a></li>
		</ul>
	<?php /* include('search_other_class.php'); */ ?>	
</div>