		<!-- Modal -->
<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Hapus Tugas</h3>
	</div>
		<div class="modal-body">
		<div class="alert alert-danger">
			Apa anda yakin ingin menghapus Tugas ini?
		</div>
		</div>
	<div class="modal-footer">
		<form method="post" action="delete_assignment.php">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Tutup</button>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
		<button class="btn btn-danger" name="change"><i class="icon-check icon-large"></i> Ya</button>
		</form>
	</div>
</div>
				