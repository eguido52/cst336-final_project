<?php
    function displayFood($sort)
    {
        session_start();
    
        include 'connect.php';
        $connect = getDBConnection();
        
        if($sort == "name")
        {
            $sql = "SELECT * FROM foodInfo ORDER BY foodName";
        }
        else if($sort == "type")
        {
            $sql = "SELECT * FROM foodInfo ORDER BY type";
        }
        else if($sort == "calories")
        {
            $sql = "SELECT * FROM foodInfo ORDER BY calories";
        }
        else
        {
            $sql = "SELECT * FROM `foodInfo`";
        }
        
        $stmt = $connect->prepare($sql); 
        $stmt->execute($data);
        
        $foods = array();
        while($result = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($foods, $result);
        }
        
        echo "<table class='table' align= 'center'>";
            echo '<tr>';
                echo "<td><h4>Name</h4></td>";
                echo "<td><h4>Type</h4></td>";
                echo "<td><h4>Calories</h4></td>";
            echo '</tr>';
        
            foreach($foods as $food)
            {
                $foodId= $food['foodId'];
                $foodName = $food['foodName'];
                $foodType= $food['type'];
                $foodCalories= $food['calories'];
                
                echo '<tr>';
                
                echo "<td><h4>$foodName</h4></td>";
                echo "<td><h4>$foodType</h4></td>";
                echo "<td><h4>$foodCalories</h4></td>";
                
                if(isset($_SESSION['username'])&&$_SESSION['username']=="admin")
                {
                    echo "<form method='post'>";
                    echo "<input type= 'hidden' name='foodId' value= '$foodId'>";
                    
                    echo "</form>";
                }
                else if(isset($_SESSION['username']))
                {
                    echo "<form method='post'>";
                    echo "<input type= 'hidden' name='foodName' value= '$foodName'>";
                    echo "<input type= 'hidden' name='foodId' value= '$foodId'>";
                    echo "<input type= 'hidden' name='foodType' value= '$foodType'>";
                    echo "<input type= 'hidden' name='foodCalories' value= '$foodCalories'>";
                    
                    if($_POST['foodId'] == $foodId) 
                    {
                        echo "<td><button class='btn btn-success'>Added</button></td>";
                    } 
                    else 
                    {
                        echo "<td><button class='btn btn-warning'>Add</button></td>";
                    }
                    echo "</form>";
                }
                
                
                echo "</tr>";
            }
            echo "</table>";
            
            if(isset($_POST['action']) && !empty($_POST['action']))
            {
                echo $_POST['action'];
                $action = $_POST['action'];
                $id = $_POST['id'];
                deleteFood($id);
            }
    }
    
    // function deleteFood()
    // {
        
    // }
?>