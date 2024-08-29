<?php include('db.php'); ?>

<?php
if (isset($_GET['id'])) {
    // Sanitize input
    $id = intval($_GET['id']); // Convert to integer for security

    // Prepare and execute the DELETE query
    $query = "DELETE FROM student WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection)); // Pass $connection to mysqli_error()
    } else {
        header('Location: index.php?delete_msg=You have deleted the record.');
        exit(); // Always use exit after redirecting
    }
}
?>
