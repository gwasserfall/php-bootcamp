<?php
    include_once("./database/users.php");
    // Check if username and password are not empty
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
                echo "User created\n";
            }
            else
            {
                echo "Failed to create user\n";
            }
        }
        else
        {
            echo "Username has already been taken please try another";
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
    <div class="test">
        <pre><?php print_r(list_users());?>
        </pre>
    </div>
</body>
</html>