<?php
    include_once("./database/users.php");
    
    $errors = [];

    if (isset($_POST["login"]) && isset($_POST["passwd"]))
    {
        $user = $_POST["login"];
        $pass = $_POST["passwd"];
        $email = $_POST["email"];

        // Check if username is in database
        echo "this is the user $user";
        if (!user_exists($user))
        {
            if (create_user($user, $pass, $email))
            {
                header("Location: /login.php");
            }
            else
            {
                array_push($errors, "Failed to create user");
            }
        }
        else
        {
            array_push($errors, "This username is already taken please try another");
        }

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
        login<input name="login" type="text" autocomplete="off"><br>
        password <input name="passwd" type="password" autocomplete="off"><br>
        email <input name="email" type="email" autocomplete="off"><br>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
