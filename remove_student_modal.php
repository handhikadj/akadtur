		<!-- Modal -->
<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Hapus Siswa</h3>
	</div>
		<div class="modal-body">
		<div class="alert alert-danger">
			Apa anda yakin ingin menghapus Siswa ini di dalam kelas ini?
		</div>
		</div>
	<div class="modal-footer">

		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Tutup</button>
	
		<button name="remove" class="btn btn-danger remove" id="<?php echo $id; ?>" ><i class="icon-check icon-large"></i> Ya</button>

	</div>
</div>
				