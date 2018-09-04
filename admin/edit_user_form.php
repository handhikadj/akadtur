<div class="row-fluid">
    <a href="admin_user.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Tambah Admin</a>
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Ubah Admin</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <?php
                $query = mysqli_query($db, "select * from users where user_id = '$get_id'")or die(mysqli_error($db));
                $row = mysqli_fetch_array($query);
                ?>
                <form method="post">
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="<?php echo $row['name']; ?>" name="name" id="focusedInput" type="text" placeholder = "Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="<?php echo $row['username']; ?>"  name="username" id="focusedInput" type="text" placeholder = "Username" required>
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
if (isset($_POST['update'])){

    $name = $_POST['name'];
    $username = $_POST['username'];


    mysqli_query($db, "update users set username = '$username'  , name = '$name' where user_id = '$get_id' ")or die(mysqli_error($db));

    mysqli_query($db, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit User $username')")or die(mysqli_error($db));
    ?>
    <script>
        window.location = "admin_user.php"; 
    </script>
    <?php
}
?>