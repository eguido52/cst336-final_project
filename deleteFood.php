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
    
        <form>
		    <br /><br />
		    Food to Delete: <input type="text" name="foodName"/>
		    <br /><br />
		    <input type="submit" name="Submit" value= "Delete"/> 
		    <input type="button" value= "Back" onclick="prevPage()"/>
        </form>
        
        <?php
            include 'connect.php';
            $connect = getDBConnection();
            
            //Checking credentials in database
            $sql = "SELECT * FROM `foodInfo` WHERE foodName = :name";
            $stmt = $connect->prepare($sql);
            $data = array(":name"=> $_GET['foodName']);
            
            $stmt->execute($data);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            //redirecting user to quiz if credentials are valid
            if(isset($user['foodName']))
            {
                $id = $user['foodId'];
                
                $sql = "DELETE FROM `foodInfo` WHERE foodId = :id";
                $stmt = $connect->prepare($sql);
                $data = array(":id"=> $id);
            
                $stmt->execute($data);
                
                header("Location: admin.php");
            } 
            else 
            {
                echo "The values you entered were incorrect. <a href='deleteFood.php'>Retry</a>";
            }
        ?>
        
        <br/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            function prevPage()
            {
                 window.location.href="admin.php";
            }
        </script>   
    </body>
    
</html>