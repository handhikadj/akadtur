<div class="row-fluid">
	<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left">Tambah Guru</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
				<form method="post">
							<!--
									<label>Photo:</label>
									<div class="control-group">
                                      <div class="controls">
                                           <input class="input-file uniform_on" id="fileInput" type="file" required>
                                      </div>
                                    </div>
                                -->	

                                <div class="control-group">
                                 <label>Jurusan:</label>
                                 <div class="controls">
                                    <select name="department"  class="" required>
                                       <option></option>
                                       <?php
                                       $query = mysqli_query($db, "select * from department order by department_name");
                                       while($row = mysqli_fetch_array($query)){

                                          ?>
                                          <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                          </div>

                          <div class="control-group">
                            <div class="controls">
                              <input class="input focused" name="email" id="focusedInput" type="email" placeholder = "Email">
                          </div>
                      </div>

                      <div class="control-group">
                         <div class="controls">
                            <input class="input focused" name="name" id="focusedInput" type="text" placeholder = "Nama Lengkap">
                        </div>
                    </div>

                  <div class="control-group">
                     <div class="controls">
                        <button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /block -->
</div>


<?php
if (isset($_POST['save'])) {

    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department_id = $_POST['department'];


    $query = mysqli_query($db, "SELECT * FROM teacher WHERE email = '$email' ")or die(mysqli_error($db));
    $count = mysqli_num_rows($query);

    if ($count > 0){ ?>
      <script>
        alert('Email Sudah Terdaftar');
    </script>
    <?php
}else{
    $query6 = "INSERT INTO teacher (email, firstname, lastname, location,department_id)
    VALUES ('$email', '$firstname', '$lastname', 'uploads/NO-IMAGE-AVAILABLE.jpg', '$department_id')"; 
    mysqli_query($db, $query6) or die(mysqli_error($db)); 
    ?>
    <script>
     window.location = "teachers.php"; 
 </script>
<?php   }} ?>

