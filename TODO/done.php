<?php
include 'database.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $conn->query("UPDATE tasks SET is_done = 1 - is_done WHERE id = $id");
}
header("Location: index.php");
exit();
?>
