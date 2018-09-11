<?php 
include('header.php');
include('session.php'); 
include('modal_update_teacher.php');
?>
<body>

<?php include('navbar.php'); ?>
<div class="container-fluid">
    <div class="row-fluid">

        <?php include('teacher_sidebar.php'); ?>
        <div class="span3" id="adduser">
            <?php include('add_teacher.php'); ?>		   			
        </div>
        <div class="span6" id="">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Daftar Guru</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="delete_teacher.php" method="post">

                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                    <a data-toggle="modal" href="#teacher_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
                                    <?php include('modal_delete.php'); ?>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Photo</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $teacher_query = "SELECT * FROM teacher";
                                    $result_teacher = mysqli_query($db, $teacher_query) 
                                                    or die(mysqli_error($db));
                                    while ($row = mysqli_fetch_array($result_teacher)) :
                                        $id = $row['teacher_id'];
                                        $teacher_stat = $row['teacher_stat'];
                                        ?>
                                        <tr>
                                            <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                            </td>
                                            <td width="40">
                                                <img class="img-circle" 
                                                src="<?php echo $row['location']; ?>" height="50" 
                                                width="50">
                                            </td> 
                                            <td><?php echo $row['name']; ?></td> 
                                            <td><?php echo $row['username']; ?></td> 
                                            <td width="50">
                                                <a href="javascript:void(0)" 
                                                class="btn btn-success adminUTeacher"
                                                data-toggle="modal" data-target="#adminUpdateTeacher" 
                                                rel="<?= $row['teacher_id'] ?>" >
                                                    <i class="icon-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile ?>
                                    </tbody>
                                </table>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
</body>

</html>

<!-- <td width="50"><a href="edit_teacher.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i></a></td>
<?php if ($teacher_stat == "Activated"): ?>
<td width="120"><a href="de_activate.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-remove"></i> Menonaktifkan</a></td>
<?php else: ?>
<td width="120"><a href="edit_teacher.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-check"></i> Diaktifkan</a></td>              
<?php endif ?> -->