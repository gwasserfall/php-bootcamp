<?php 

	include_once("database.php");
	include_once("products.php");

	function add_to_basket($user, $product, $amount)
	{
		if ($db = connect())
        {
            $query = "INSERT INTO basket (user, product_id, amount) VALUES ('%s', '%s', '%s')";
            $result = mysqli_query($db, sprintf($query, $user, $product, $amount));
            return $result;
            close($db);
        }
	}

    function user_basket_count($username)
    {
        if ($db = connect())
        {
            $count = 0;
            $query = "SELECT COUNT(*) AS count FROM basket WHERE user='{$username}'";
            $result = mysqli_query($db, sprintf($query, $username));
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $count = $row["count"];
                }
            }
            return $count;
            close($db);
        }
    }
?>