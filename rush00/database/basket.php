<?php 

	include_once("database.php");
	include_once("products.php");

	function add_to_basket($user, $product, $amount)
	{
		if ($db = connect())
        {
            // 
            // close($db);

            // Check if item exists

            $exists = "SELECT * FROM basket WHERE user='{$user}' and product_id=$product";
            $result = mysqli_query($db, $exists);


            if (mysqli_num_rows($result) == 0)
            {
                $query = "INSERT INTO basket (user, product_id, amount) VALUES ('%s', '%s', '%s')";
                $result = mysqli_query($db, sprintf($query, $user, $product, $amount));
                return $result;
            }
            else
            {
                $row = mysqli_fetch_assoc($result);

                $query = "UPDATE basket SET amount= amount + '%s' WHERE id='%s'";
                $result = mysqli_query($db, sprintf($query, $amount, $row["id"]));
                return $result;
            }


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

    function get_basket($username)
    {
        if ($db = connect())
        {
            $items = [];
            $query = "SELECT * ,(price * amount) as total FROM basket LEFT JOIN products on basket.product_id=products.id WHERE user='$username'";
            $result = mysqli_query($db, sprintf($query, $username));
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $items[$row["id"]] = $row;
                }
            }
            return $items;
            close($db);
        }
    }


    function checkout($username)
    {
        if ($db = connect())
        {
            $items = [];
            $query = "DELETE FROM basket WHERE user='%s'";
            $result = mysqli_query($db, sprintf($query, $username));
            return $result;
            close($db);
        }
    }

?>