<?php include('header.php'); ?>
<?php include('db.php'); ?>
<div class="box1">

  <h2>ALL STUDENT DETAILS</h2>
  <!DOCTYPE html>
  <html>
  <style>
    input[type=text],
    select {
      width: 100%;
      padding: 12px 20px;
      margin: 7px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background-color: #f2f2f2;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: dodgerblue;
    }

    div {
      border-radius: 5px;
      background-color: #f2f2f2;

    }
  </style>
  <!-- Button trigger modal -->
  <html>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <body>

    <div class="w3-container">
      <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">ADD STUDENT DETAILS</button>



      <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <div>
              <form action="insert_data.php" method="post">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="f_name" placeholder="Your name..">

                <label for="STUDENT MAIL">STUDENT MAIL</label>
                <input type="text" id="studentmail" name="s_mail" placeholder="Your student mail id">

                <label for="NUMBER">NUMBER</label>
                <input type="text" id="NUMBER" name="NUMBER" placeholder="Your MOBILE NUMBER">

      
                <input type="submit" value="ADD" name="add_student">
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- button end -->
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>STUDENT MAIL</th>
          <th>NUMBER</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM student";  // No quotes around the table name
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("Query failed: " . mysqli_error($connection));  // Use mysqli_error with the correct variable
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>
              <td><?php echo $row['ID']; ?></td>
              <td><?php echo $row['NAME']; ?></td>
              <td><?php echo $row['STUDENT_MAIL']; ?></td>
              <td><?php echo $row['NUMBER']; ?></td>
              <td><a href="update.php?id=<?php echo $row['ID']; ?>"class="btn btn-success">Update</a></td>
              <td><a href="delete.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php


          }
        }
        ?>
      </tbody>
    </table>
    <?php
    if(isset($_GET['message'])){
      echo "<h6>".$_GET['message']."</h6>";
    }
    ?>

<?php
    if(isset($_GET['insert_msg'])){
      echo "<h6>".$_GET['insert_msg']."</h6>";
    }
    ?>

    <?php include('footer.php'); ?>