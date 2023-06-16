<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <title>Create a Record</title>
</head>
<body class="container-home">
  <div class="headings">
    <h1>Create a SCP record</h1>
  </div>

  <div class="container">
    <form method="post" action="connection.php" class="form-group">
        
      <label class="form-label">Enter SCP</label>
      <br>
      <input type="text" name="model" placeholder="Model" class="form-control">
      <br><br>
      <label class="form-label">Enter Tagline</label>
      <br>
      <input type="text" name="tagline" placeholder="Tagline" class="form-control">
      <br><br>
      <label class="form-label">Enter Description</label>
      <br>
      <textarea name="paragraph" class="form-control"> </textarea>
      <br><br>
      <br>
      <label class="form-label">Enter Image Address</label>
      <br>
      <input type="text" name="img" placeholder="images/nameOfImage.jpg or similar" class="form-control">
      <br><br>
        <div class='button-container'>
            <input type="submit" name="submit" value="Submit record" class="custom-button">
            <a href='index.php' class='custom-button'>Cancel</a>
        </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</body>
</html>
