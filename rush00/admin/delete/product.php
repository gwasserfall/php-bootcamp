<?php
include("../../database/products.php");

if (isset($_GET["id"]))
{
	if (delete_product($_GET["id"]))
	{
		header("Location: ../products.php");
	}
	else 
	{
		echo "Error deleting item";
	}
}
?>