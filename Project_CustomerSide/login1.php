<!DOCTYPE html>
<html>
    <head>
        <title> Login Page </title>
        <link href="login1.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="log">
            <img src="download (4).jpeg"/><br><br><br>
            <form action="verify.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                
                <input type="submit" value="Login">
            </form>
            
        </div>
</body>
</html>