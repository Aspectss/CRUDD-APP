<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <title>SCP Foundation</title>
</head>

<body class="container-home">
  <?php 
    include 'connection.php';
    if(isset($_GET['link']))
    {
      $model = trim($_GET['link'], "'");

      // run sql command to retrieve record based on GET value
      $record = $connection->query("select * from scpspages where model ='$model'") or die($connection->error);

      // turn record into an associative array
      $array = $record->fetch_assoc();

      // variables to hold our update and delete url strings
      $id = $array['id'];
      $update = "update.php?update=" . $id;
      $delete = "connection.php?delete=" . $id;

      echo "
      <!-- Navbar appears only when an SCP model is selected -->
      <nav class='navbar navbar-expand-lg'>
        <div class='container-fluid'>
          <a class='navbar-brand' href='index.php'> </a>
          <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
            <div class='navbar-nav'>
      ";
      
      $result = $connection->query("select * from scpspages") or die($connection->error);

      foreach($result as $link)
      {
        echo "
          <div class='navtxt'>
            <a class='nav-link' href='index.php?link={$link['model']}'>{$link['model']}</a>
          </div>
        ";
      }

      echo "
            <div class='navtxt add-sub'>
              <a class='nav-link add-btn' href='form.php'>Add a SCP Subject</a>
            </div>
          </div>
        </div>
      </nav>
      ";

      // display selected SCP model's details
        echo "
        <div class='card card-body shadow mb-3'>
            <h2 class='card-title model-text'>{$array['model']}</h2>
            <h4 class='tagline-text'>{$array['tagline']}</h4>
            <div class='text-center-div'>
                <p class='card-text'>{$array['paragraph']}</p>
            </div>
            <div class='card card-body shadow mb-3'>
                <p class='text-center'><img src='{$array['img']}' class='img-fluid'></p>
            </div>
            <div class='button-container'>
                <a href='{$update}' class='custom-button'>Update Record</a>
                <a href='{$delete}' class='custom-button'>Delete Record</a>
            </div>
            <div class='button-row'>
                <a href='index.php' class='custom-button'>Home</a>
            </div>
        </div>
        ";
    }
    else
    {
      echo "
        <div class='headings'>
          <h1>SCP Foundation</h1>
          <h2>Secure, Contain, Protect</h2>
        </div>
        <div class='logo-img'>
          <img src='scp-logo.png' alt='SCP Logo' />
        </div>
        <div class='button-container'>
          <a href='form.php' class='custom-button'>Add SCP Subject</a>
        </div>

        <div class='container'>
        <div class='row'>
          
      ";

      // run a select query to get all SCP model rows from scpspages
      $result = $connection->query("select * from scpspages") or die($connection->error);
      foreach($result as $model)
      {
        echo "
          <div class='col-sm-12 col-md-6 col-lg-4'>
            <div class='card mb-3'>
              <div class='card-body'>
                <h5 class='card-title'>{$model['model']}</h5>
                <a href='index.php?link={$model['model']}' class='btn btn-dark'>Read More</a>
              </div>
            </div>
          </div>
        ";
      }

      echo "
        </div>
      </div>
      ";
    }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
