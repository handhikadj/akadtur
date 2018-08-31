<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($db, "delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysqli_error($db));
mysqli_query($db, "delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysqli_error($db));
?>

