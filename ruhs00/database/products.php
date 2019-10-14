<?php 
    include_once("database.php");
    

    function create_category($name)
    {
        if ($db = connect())
        {
            $query = "INSERT INTO categories (name) VALUES (`%s`);";
            $result = mysqli_query($db, sprintf($query, $name));
            return $result;
            close($db);
        }
        return FALSE;
    }

    function create_product($name, $price, $color, $category, $image)
    {
        if ($db = connect())
        {
            $query = "INSERT INTO products (name, price, color, cat_id, image) VALUES ('%s', '%s', '%s', '%s', '%s')";
            echo sprintf($query, $name, $price, $color, $category, $image);
            $result = mysqli_query($db, sprintf($query, $name, $price, $color, $category, $image));
            return $result;
            print_r($db);
            close($db);
        }
        return FALSE;
    }

    function list_products()
    {
        if ($db = connect())
        {           
            $products = [];
            $query = 'SELECT * FROM products';
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $products[$row["id"]] = $row;
                }
            }
            close($db);
            return $products;
        }
    }

    function list_categories()
    {
        if ($db = connect())
        {           
            $categories = [];
            $query = 'SELECT * FROM categories';
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $categories[$row["id"]] = $row;
                }
            }
            close($db);
            return $categories;
        }
    }

    function products_by_category()
    {
        if ($db = connect())
        {           
            $products = [];
            $c_query = 'SELECT * FROM categories';
            $c = mysqli_query($db, $c_query);
            if (mysqli_num_rows($c) > 0) {
                while($row = mysqli_fetch_assoc($c)) {
                    $products[$row["name"]] = [];
                    $p_query = "SELECT * FROM products WHERE cat_id='{$row["id"]}'";
                    $p = mysqli_query($db, $p_query);
                    if (mysqli_num_rows($p) > 0) {
                        while($prod = mysqli_fetch_assoc($p)) {
                            $products[$row["name"]] = $prod;
                        }
                    }
                }
            }
            close($db);
            return $products;
        }
    }


    function delete_product($id)
    {
        if ($db = connect())
        {           
            $categories = [];
            $query = "DELETE FROM products where id='%s'";
            $result = mysqli_query($db, sprintf($query, $id));
            return $result;
        }
    }

    print_r(products_by_category());

?>