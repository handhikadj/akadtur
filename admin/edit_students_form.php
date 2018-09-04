<div class="row-fluid">
    <a href="students.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Tambah Siswa</a>
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Ubah Siswa</div>
        </div>
        <div class="block-content collapse in">
            <?php
            $query = mysqli_query($db, "select * from student LEFT JOIN class ON class.class_id = student.class_id where student_id = '$get_id'")or die(mysqli_error($db));
            $row = mysqli_fetch_array($query);
            ?>
            <div class="span12">
                <form method="post">

                    <div class="control-group">

                        <div class="controls">
                            <select  name="cys" class="" required>
                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                                <?php
                                $cys_query = mysqli_query($db, "select * from class order by class_name");
                                while($cys_row = mysqli_fetch_array($cys_query)){

                                    ?>
                                    <option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="un" value="<?php echo $row['username']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Username" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="name"  value="<?php echo $row['name']; ?>"  class="input focused" id="focusedInput" type="text" placeholder = "Nama Lengkap" required>
                        </div>
                    </div>


                    <div class="control-group">
                        <div class="controls">
                            <button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>



<?php
if (isset($_POST['update'])) {

    $un = $_POST['un'];
    $name = $_POST['name'];
    $cys = $_POST['cys'];


    mysqli_query($db, "update student set username = '$un' , name ='$name' , class_id = '$cys' where student_id = '$get_id' ")or die(mysqli_error($db));

    ?>

    <script>
        window.location = "students.php"; 
    </script>

<?php     }  ?>
