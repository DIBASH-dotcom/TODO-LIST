<?php
include 'database.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $conn->query("DELETE FROM tasks WHERE id = $id");
}
header("Location: index.php");
exit();
?>
