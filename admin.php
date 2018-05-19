<?php
session_start();

    if(isset($_SESSION['username']))
    {
        include 'display.php';
    
    }
    else
    {
        header("Location: login.php");
    }
    
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset= "utf-8" />
        <title>Final Project</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <div class="menu-bar">
            <?php echo "Welcome ".$_SESSION['username']."! ";?>
            <input type="button" id="logoutBtn" value="Logout" />    
        </div>
        
        <h1>OnTrack</h1>
        
        <br/>
        
        <button id= "addBtn">Add Food</button>
        <button id= "deleteBtn">Delete Food</button>
         <button id= "editBtn">Edit Food</button>
        <br /><br />
        
        <form enctype="text/plain">
            Sort by: 
            <input type="radio" name="ordering" value="name">Name 
            <input type="radio" name="ordering" value="type">Type
            <input type="radio" name="ordering" value="calories">Calories
            <br/><br />
            <input type="submit" value="Submit">
            <br /><br />
        </form>
        
        <?php
            $ordering = "id";
            if (isset($_GET["ordering"]) && !empty($_GET["ordering"])) 
            {
                $ordering = $_GET["ordering"];
            }
            
            displayFood($ordering);
        ?>
        
        <br/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src= "js/functions.js"></script>   
    </body>
    
</html>