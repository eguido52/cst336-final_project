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
        
		<form>
		    <br /><br />
		    Name: <input type="text" name="addName"/><br /><br />
		    Type: <input type="text" name="addType"/><br /><br />
		    Calories: <input type="text" name="addCalories"/><br /><br />
		    <input type="submit" name="Submit" value= "Add"/> 
		    <input type="button" value= "Back" onclick="prevPage()"/>
		    <br />
		</form>
        
        <br/>
        
        <?php
            include 'connect.php';
            $connect = getDBConnection();
            
            if (isset($_GET["addName"]) && !empty($_GET["addName"])) 
            {
                if (isset($_GET["addType"]) && !empty($_GET["addType"])) 
                {
                    if (isset($_GET["addCalories"]) && !empty($_GET["addCalories"])) 
                    {
                        $sql= "INSERT INTO `foodInfo`(`foodName`, `calories`, `type`, `addedBy`) VALUES (:name,:calories,:type,'admin')";
                        $data = array(
                            ":name" => $_GET["addName"],
                            ":calories" => $_GET["addCalories"],
                            ":type" => $_GET["addType"]
                        );
                        $stmt = $connect->prepare($sql);
                        $stmt->execute($data);
                        
                        header("Location: admin.php");
                    }
                }
            }
        ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            function prevPage()
            {
                 window.location.href="admin.php";
            }
        </script>   
    </body>
    
</html>