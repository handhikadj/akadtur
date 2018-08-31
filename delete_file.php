<?php
include('admin/dbcon.php');
$id = $_POST['id'];
mysqli_query($db, "delete from files where file_id = '$id' ")or die(mysqli_error($db));
?>
