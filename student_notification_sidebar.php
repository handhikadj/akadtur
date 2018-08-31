<div class="span3" id="sidebar">
	<img id="avatar" class="img-polaroid" src="admin/<?php echo $row['location']; ?>">
	<?php include('count.php'); ?>
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<li class=""><a href="dashboard_student.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Kelas Saya</a></li>
		<li class=""><a href="progress.php?id=.$get_id"><i class="icon-chevron-right"></i><i class="icon-bar-chart"></i>&nbsp;Perkembangan Saya</a></li>
		<li class=""><a href="downloadable_student.php?id=.$get_id"><i class="icon-chevron-right"></i><i class="icon-download"></i>&nbsp;Materi Yang Dapat Diunduh</a></li>
		<li class=""><a href="assignment_student.php?id=.$get_id"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Tugas</a></li>
		<!-- menu pemberitahuan -->
		<li class="active">
			<a href="student_notification.php"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Pemberitahuan
			<?php if($not_read == '0'){
			}else{ ?>
				<span class="badge badge-important"><?php echo $not_read; ?></span>
			<?php } ?>
			</a>
		</li>
		<!-- akhir menu pemberitahuan -->
		<?php
		$message_query = mysqli_query($db, "select * from message where reciever_id = '$session_id' and message_status != 'read' ")or die(mysqli_error($db));
		$count_message = mysqli_num_rows($message_query);
		?>
		<li class="">
		<a href="student_message.php"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Pesan
			<?php if($count_message == '0'){
			}else{ ?>
				<span class="badge badge-important"><?php echo $count_message; ?></span>
			<?php } ?>
		</a>
		</li>
		<li class=""><a href="backpack.php"><i class="icon-chevron-right"></i><i class="icon-suitcase"></i>&nbsp;Backpack</a></li>
	</ul>
	<?php /* include('search_other_class.php'); */ ?>	
</div>

