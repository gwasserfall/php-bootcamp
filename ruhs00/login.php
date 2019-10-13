<?php
    session_start();
    
    $user = $_POST["login"];
    $pass = $_POST["passwd"];

    if (isset($_GET["login"]) && isset($_GET["passwd"]))
    {
        $_SESSION['logged_on_user'] = ((auth($_GET["login"], $_GET["passwd"]))) ? $_GET["login"] : "Guest";
    }

    


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <form method="POST">
        <input name="login" type="text">
        <input name="passwd" type="password">
        <button type="submit">Login</button>
    </form>
    <div class="test">
        <pre>
            <?php 
                echo $user;
                echo $pass;
            ?>
        </pre>
    </div>
</body>
</html>