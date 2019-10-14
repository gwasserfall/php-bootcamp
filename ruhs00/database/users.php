<?php 

    include("database.php");

    function auth($username, $password)
    {
        $users = list_users();

        if (!array_key_exists($username, $users))
        {
            return FALSE;
        }
        else
        {
            if (hash("sha512", $password) == $users[$username]["hash"])
                return TRUE;
            return FALSE;
        }
    }


    function create_user($username, $password, $email)
    {
        if (user_exists($username))
            return FALSE;

        if ($db = connect())
        {
            $hash = hash("sha512", $password);
            $query = "INSERT INTO users (login, hash, email, `group`) VALUES ('%s', '%s', '%s', 'user')";
            $result = mysqli_query($db, sprintf($query, $username, $hash, $email));
            return $result;
            close($db);
        }
    }

    function user_exists($username)
    {
        return array_key_exists($username, list_users());
    }


    function user_is_admin($username)
    {
        $users = list_users();

        if ($users[$username]["group"] == "admin")
            return TRUE;
        return FALSE;
    }

    function list_users()
    {
        if ($db = connect())
        {           
            $users = [];
            $query = 'SELECT * FROM users';
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $users[$row["login"]] = $row;
                }
            }
            close($db);
            return $users;
        }
    }

    function delete_user($username)
    {
        if ($db = connect())
        {
            $query = "DELETE FROM users WHERE login='$username'";
            echo $query;
            $result = mysqli_query($db, $query);
            return $result;
        }
    }

    
?>