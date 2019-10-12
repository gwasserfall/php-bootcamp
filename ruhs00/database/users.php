<?php 

    include("database.php");

    function create_user($username, $password, $email)
    {
        if ($db = connect())
        {
            $hash = hash("sha512", $password);
            $query = "INSERT INTO users (login, password, email, group_type) VALUES ('%s', '%s', '%s', 'user')";
            $result = mysqli_query($db, sprintf($query, $username, $hash, $email));
            return $result;
            close($db);
        }
        echo "DB COnnection failed";
    }

    function user_exists($username)
    {
        return array_key_exists($username, list_users());
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

    // function delete_users()
    // {
    //     if ($db = connect())
    //     {
            
    //     }
    // }

    // function update_user()
    // {
    //     if ($db = connect())
    //     {

    //     }
    // }

    
?>