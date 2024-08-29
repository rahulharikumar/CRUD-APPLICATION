<?php include('header.php'); ?>
<?php include('db.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM student WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

?>
<?php

if (isset($_POST['Update'])) {
    $id = intval($_GET['id']);
    $fname = mysqli_real_escape_string($connection, $_POST['f_name']);
    $sname = mysqli_real_escape_string($connection, $_POST['s_mail']);
    $number = mysqli_real_escape_string($connection, $_POST['number']);

    $query = "UPDATE student SET NAME='$fname', STUDENT_MAIL='$sname', NUMBER='$number' WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?update_msg=Record updated successfully');
        exit();
    }
}
?>







<form action="update.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" id="f_name" name="f_name" class="form-control" value="<?php echo htmlspecialchars($row['NAME']); ?>">
    </div>
    <div class="form-group">
        <label for="s_mail">Student Email</label>
        <input type="email" id="s_mail" name="s_mail" class="form-control" value="<?php echo htmlspecialchars($row['STUDENT_MAIL']); ?>">
    </div>
    <div class="form-group">
        <label for="number">Number</label>
        <input type="text" id="number" name="number" class="form-control" value="<?php echo htmlspecialchars($row['NUMBER']); ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="Update" value="Update">
</form>




<?php include('footer.php'); ?>