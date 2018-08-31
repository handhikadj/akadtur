<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($db, "delete from message where message_id = '$id'")or die(mysqli_error($db));
?>

