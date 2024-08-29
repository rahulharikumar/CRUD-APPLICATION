<?php
if (isset($_POST['add_student'])) {
    // Get the form data
    $fname = $_POST['f_name'];
    $smail = $_POST['s_mail'];
    $number = $_POST['NUMBER']; // Changed $NUMBER to $number for consistency

    // Check if the first name is empty
    if (empty($fname)) {
        // Redirect to index.php with a message
        header('Location: index.php?message=You need to fill in the first name!');
        exit(); // Always use exit() after a header redirect
    }

    // Include database connection
    include('db.php'); // Ensure the database connection is included

    // Prepare the SQL query
    $query = "INSERT INTO student (NAME, STUDENT_MAIL, NUMBER) VALUES (?, ?, ?)";

    // Prepare the statement
    if ($stmt = mysqli_prepare($connection, $query)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sss", $fname, $smail, $number);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect with success message
            header('Location: index.php?insert_msg=Your data has been added successfully');
        } else {
            // Redirect with error message
            header('Location: index.php?insert_msg=Failed to add data');
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Redirect with error message if preparation fails
        header('Location: index.php?insert_msg=Failed to prepare statement');
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
