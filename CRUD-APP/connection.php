<?php
$username = "a30073191_Raman";
$password = "Toiohomai1234";
$dbname = "a30073191_CrudApp";

// Create connection
$connection = new mysqli('localhost', $username, $password, $dbname);

// variable that returns all records in database input name of your DB Table
    $result = $connection->query("select * from scpspages");
    
    // check if form data has been send via post
    if(isset($_POST['submit']))
    {
        // create variables from our form post data
        $model = $_POST['model'];
        $tagline = $_POST['tagline'];
        $paragraph = $_POST['paragraph'];
        $image = $_POST['img'];
        
        // create a sql insert command
        $insert = "insert into scpspages(model, tagline, paragraph, img) 
        values('$model', '$tagline', '$paragraph', '$img')";
        
        if($connection->query($insert) === TRUE)
        {
            echo "
                <h1>Record added succesfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                <h1>Error submitting data</h1>
                <p>{$connection->error}</p>
                <p><a href='form.php'>Return to form</a></p>
            
            ";
        }
    } // end isset post

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $model = $_POST['model'];
        $tagline = $_POST['tagline'];
        $paragraph = $_POST['paragraph'];
        $img = $_POST['img'];

        // Create a SQL UPDATE command
        $update = "UPDATE scpspages SET model='$model', tagline='$tagline', paragraph='$paragraph', img='$img' WHERE id=$id";

        if($connection->query($update) === TRUE)
        {
            echo "<h1>Record updated successfully</h1><p><a href='index.php'>Return to index page</a></p>";
        }
        else
        {
            echo "<h1>Error updating data</h1><p>{$connection->error}</p><p><a href='index.php'>Return to index page</a></p>";
        }    
    }

    // delete record
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        // delete sql command
        $del = "delete from scpspages where id=$id";
        
        if($connection->query($del) === TRUE)
        {
            echo "
                <h1>Record Deleted</h1>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
        else
        {
             echo "
                <h1>Error deleting record</h1>
                <p>{$connection->error}</p>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
    }   

?>
