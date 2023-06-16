<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <title>Update a Record</title>
</head>
<body class="container-home">
  <div class="headings">
    <h1>Update a SCP record</h1>
  </div>

  <div class="container">
    <?php
    
        include "connection.php";
        
        $id = $_GET['update'];
        $record = $connection->query("select * from scpspages where id=$id");
        $row = $record->fetch_assoc();
    
    ?>

    <form method="post" action="connection.php" class="form-group">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"

        <label class="form-label">Enter SCP</label>
        <br>
        <input type="text" name="model" placeholder="Model" class="form-control" value="<?php echo $row['model']; ?>">
        <br><br>
        <label class="form-label">Enter Tagline</label>
        <br>
        <input type="text" name="tagline" placeholder="Tagline" class="form-control" value="<?php echo $row['tagline']; ?>">
        <br><br>
        <label class="form-label">Enter Description</label>
        <br>
        <input type="text" name="paragraph" placeholder="Enter Description" class="form-control" value="<?php echo $row['paragraph']; ?>">
        <br><br>
        <br>
        <label class="form-label">Enter Image Address</label>
        <br>
        <input type="text" name="img" placeholder="images/nameOfImage.jpg or similar" class="form-control" value="<?php echo $row['img']; ?>">
        <br><br>
        <div class='button-container'>
            <input type="submit" name="update" value="Update Record" class="custom-button">
            <a href='index.php' class="custom-button">Cancel</a>
        </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</body>
</html>
