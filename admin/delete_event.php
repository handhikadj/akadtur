<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysqli_query($db, "delete from event where event_id = '$get_id'")or die(mysqli_error($db));
?>
<script>
window.location = 'calendar_of_events.php';
</script>