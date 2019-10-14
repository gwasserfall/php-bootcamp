<?php 
	include("../database/products.php");
	
	$products = list_products();
	$categories = list_categories();

	print_r($categories);

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
				echo "The file ".  basename( $_FILES['image']['name']). 
				" has been uploaded";
				create_product($name, $price, $color, $cat_id, $_FILES['image']['name']);
			} else{
				echo "There was an error uploading the file, please try again!";
			}
		}
	}

	if (isset($_POST["new-category"]))
	{
		$category = $_POST["category"];
		echo "Creating category";
		create_category($category);
	}

?>

<div class="products">
	<div class="list">
		<?php 
		foreach ($products as $product) {

			echo "
				<div class='product'>
					<div class='image' style='background: {$product["color"]}'>
						<img src='../img/{$product["image"]}'>
					</div>
					<div class='name'>{$product["name"]}</div>
					<div class='price'>{$product["price"]}</div>
					<a href='delete/product?id={$product["id"]}'>delete</a>
					<a href='edit/product?id={$product["id"]}'>edit</a>
				</div>
			";
		}		
		?>
	</div>
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
					# code...
				}
				echo "<option value='{$cat["id"]}'>{$cat["name"]}</option>"
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
	<button type="submit">Submit</button>
</form>

</div>

<div class="categories">
<form method="POST">
<div class="field">
	<div class="label">Product Category</div>
	<input name="category" type="text">
</div>
<input type="hidden" name="new-category" value="1">
<button type="submit">Add</button>
</form>
</div>