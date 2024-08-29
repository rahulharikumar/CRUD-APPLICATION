<?php include('header.php'); ?>
<?php include('db.php'); ?>


<?php
// Establish a connection to the database

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$row = []; // Initialize $row variable

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM student WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" specifies the type as integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch a single row as an associative array
    } else {
        echo "No results found.";
    }

    $stmt->close();
}

$connection->close();
?>

<form action="process_form.php" method="post"> <!-- Adjust the action URL and method as needed -->
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" id="f_name" name="f_name" class="form-control" value="<?php echo htmlspecialchars($row['First_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div class="form-group">
        <label for="s_mail">Student Email</label>
        <input type="email" id="s_mail" name="s_mail" class="form-control" value="<?php echo htmlspecialchars($row['Student_mail'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div class="form-group">
        <label for="number">Number</label>
        <input type="text" id="number" name="number" class="form-control" value="<?php echo htmlspecialchars($row['Number'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


