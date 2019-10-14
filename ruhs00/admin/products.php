<?php 
	include("../database/products.php");
	
	$products = list_products();
	$categories = list_categories();

	if (isset($_POST["new-product"]))
	{
		$name = $_POST["name"];
		$price = $_POST["price"];
		$color = $_POST["color"];
		$cat_id = $_POST["category"];

		if(!empty($_FILES['image']))
		{
			$path = "../img/";
			$path = $path . basename( $_FILES['image']['name']);
			if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
			
				create_product($name, $price, $color, $cat_id, $_FILES['image']['name']);
			}
		}
	}

	if (isset($_POST["new-category"]))
	{
		$category = $_POST["category"];
		create_category($category);
	}

?>






<!DOCTYPE>
<html>
<head>
<title>Dunder Agon inc. Admin</title>
<link rel="stylesheet" type="text/css" href="/styles/style_landing.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/styles/style_admin.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/styles/style_admin-product.css" media="screen" />
</head>
<body>
<div class="container">

	<div class="row">
		<div class="col">
			<div class="header">
				<div class="logo"><img ID="header" src="/img/logo-large.png" alt="logo"></div>
				<h1 class="admin">Admin - Products</h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="menu">
				<ul class="menu-main">
					<li class="bump tab"><a href="/admin/users.php">Users</a></li>
					<li class="tab"><a href="/">Home</a></li>
				</ul>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col content">
		
		<div class="products">
			<div class="list">
				<?php 
				foreach ($products as $product) {

					echo "
						<div class='product'>
							<div class='image'>
								<img style='background: {$product["color"]}' src='../img/{$product["image"]}'>
							</div>
							<div class='control'>
								<div class='name'>{$product["name"]}</div>
								<div class='price'>R {$product["price"]}</div>
								<a href='delete/product?id={$product["id"]}'>delete</a>
								
							</div>
						</div>
					";
				}		
				?>
			</div>
		</div>

		<div class="forms">
		
		<div class="form">
		<div class="title">Add Product</div>
		<form method="POST" enctype="multipart/form-data">
			<div class="field">
				<div class="label">Product Name</div>
				<input type="text" name="name">
			</div>
			<div class="field">
				<div class="label">Product Category</div>
				<select name="category">
					<option value="">Please select a category</option>
					<?php 
						foreach ($categories as $cat) {
							echo "<option value='{$cat["id"]}'>{$cat["name"]}</option>";
						}
					?>
				</select>
			</div>
			<div class="field">
				<div class="label">Product Price</div>
				<input name="price" type="text">
			</div>
			<div class="field">
				<div class="label">Product Image</div>
				<input name="image" type="file">
			</div>
			<div class="field">
				<div class="label">Product Colour</div>
				<input name="color" type="text">
			</div>
			<input type="hidden" name="new-product" value="1">
			<button  class="submit" type="submit">Submit</button>
			</form>

		</div>
		

		
			<div class="form">
				<div class="title">Add Category</div>
			<div class="categories">
				<form method="POST">
				<div class="field">
					<div class="label">Category Name</div>
					<input name="category" type="text">
				</div>
				<input type="hidden" name="new-category" value="1">
				<button class="submit" type="submit">Add</button>
			</form>
		</div>
		
	</div>
</div>
	
	</div>

</div>
</body>
</html>