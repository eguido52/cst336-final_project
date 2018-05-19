<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>Login</h1>
        <h2>Please enter your email address and password below</h2>
        
        <!--Form to enter credentials-->
        <form method= "post" action= "verifyUser.php">
            <input type="text" name="username" placeholder= "Username"/><br/>
            <input type="password" name="password" placeholder= "Password"/><br/>
            <input type="submit" name="submit" placeholder= "LOGIN NOW"/><br>
        </form>

    </body>
</html>