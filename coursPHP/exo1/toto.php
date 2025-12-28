<?php
include("connection.php");

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <!-- Form le plus simple possible -->
    <form method="POST" id="form" action="login.php">
        <input type="text" name="user" placeholder="Username"><br><br>
        <input type="password" name="pswd" placeholder="Password"><br><br>
        <button type="submit" id="btn">Login</button>
    </form>
    
    <script>
        // Force la soumission
        document.querySelector('form').onsubmit = function() {
            alert('Form submitted!');
            return true; // Autorise la soumission
        };
    </script>
</body>
</html>