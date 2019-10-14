<?php 

    function connect() 
    {
        $HOST = "127.0.0.1";
        $USER = "database";
        $PASS = "password";
        $DATABASE = "minishop";

        $conn = mysqli_connect($HOST, $USER, $PASS, $DATABASE);
        if (mysqli_connect_errno($conn)) {
            echo "Error connecting";
            return FALSE;
        }
        return $conn;
    }

    function close($conn)
    {
        if ($conn)
            mysqli_close($conn);
    }

    // $db = connect();

    // if ($db)
    //     echo "No database connection";

    // $sql = 'SELECT * FROM users';
    // $result = mysqli_query($db, $sql);

    // if (mysqli_num_rows($result) > 0) {
    //     while($row = mysqli_fetch_assoc($result)) {
    //         print_r($row);
    // }
    // } else {
    //     echo "0 results";
    // }

?>

