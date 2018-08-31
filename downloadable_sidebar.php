<div class="span3" id="">
	<div class="row-fluid">
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Tambah Materi</h4></div>
            </div>

            <div class="block-content collapse in">
                <div class="span12">
				    <form class="" id="add_downloadble" method="post" enctype="multipart/form-data" name="upload" >
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">File</label>
                        <div class="controls">
            					
            				<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" required>
                            <label class="control-label" for="inputEmail">Max. Size: 2MB</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                            <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                            <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input type="text" name="name" Placeholder="Nama File"  class="input" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input type="text" name="desc" Placeholder="Deskripsi"  class="input" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button name="Upload" type="submit" value="Upload" class="btn btn-info" /><i class="icon-upload-alt"></i>&nbsp;Unggah</button>
                        </div>
                    </div>
                    </form>
					
			<script>
			jQuery(document).ready(function($){
				$("#add_downloadble").submit(function(e){
					$.jGrowl("Unggah File. Mohon Tunggu Sebentar......", { sticky: true });
					e.preventDefault();
					var _this = $(e.target);
					var formData = new FormData($(this)[0]);
					$.ajax({
						type: "POST",
						url: "upload_save.php",
						data: formData,
						success: function(html){
							$.jGrowl("Berhasil Tambah File", { header: 'Tambah File' });
							window.location = 'downloadable.php<?php echo '?id='.$session_id; ?>';
						},
						cache: false,
						contentType: false,
						processData: false
					});
				});
			});
			</script>

				</div>
            </div>
        </div>
        <!-- /block -->

	</div>
</div>