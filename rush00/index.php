<?php

include_once("database/products.php");
include_once("database/basket.php");

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$basket_count = 0;

if (isset($_SESSION['logged_on_user']))
{
	$user = $_SESSION['logged_on_user'];
}
else
{
	$user = "Guest";
	if (isset($_SESSION["basket"]))
	{
		$basket_count = count($_SESSION["basket"]);
	}
}

$promo = isset($_GET["category"]);

if (isset($_GET["category"]))
{
	$products = products_by_category($_GET["category"]);
}
else
{
	$products = list_products();
}

if (isset($_POST["product_id"]))
{
	if ($user == "Guest")
	{
		add_to_basket(session_id(), $_POST["product_id"], $_POST["amount"]);
	}
	else
	{
		add_to_basket($user, $_POST["product_id"], $_POST["amount"]);
	}

}

$admin = FALSE;
if (isset($_SESSION["admin"]))
	$admin = $_SESSION["admin"];


?>


<!DOCTYPE>
<html>
<head>
<title>Dunder Agon inc.</title>
<link rel="stylesheet" type="text/css" href="./styles/style_landing.css" media="screen" />
</head>
<body>
<div class="container">

	<div class="row">
		<div class="col">
			<div class="header">
				<div class="logo"><img ID="header" src="img/logo-large.png" alt="logo"></div>
				<div class="welcome">Welcome <?php echo $user; ?></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="menu">
				<ul class="menu-main">
					<?php if ($user == "Guest"): ?>
					<li class="bump tab"><a href="login.php">Login</a></li>
					<li class="tab"><a href="signup.php">Sign Up</a></li>
					<li class="tab"><a href="basket.php">Basket
						<?php echo user_basket_count(session_id()); ?>
					</a></li>
					<?php else: ?>
					<li class="bump tab"><a href="logout.php">Logout</a></li>
					<?php if($admin): ?>
					<li class="tab"><a href="admin">Admin</a></li>
					<?php endif; ?>
					<li class="tab"><a href="basket.php">Basket
						<?php echo "(" . user_basket_count($user) . ")"; ?>
					</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="row content">
		<div class="col s-10">
			<ul class="side-menu">
				<li class="category"><a href="/">All</a></li>
			<?php 
				$cats = list_categories();

				foreach ($cats as $cat) {
					echo "<li class='category'><a href='?category={$cat["id"]}'>{$cat["name"]}</a></li>";
				}
			?> 
			</ul>
		</div>
		<div class="col s-70">
			<div class="products">
			<?php if (!$promo): ?>
				<div class="sale">
					<img src="/img/sale.jpg" alt="">
				</div>
			<?php endif; ?>

			<?php 
				

				foreach ($products as $p) {
					echo "
					<div class='product' id='{$p["id"]}'>
						<div class='product-image'>
							<img src='img/{$p["image"]}' style='background: {$p["color"]}'>
						</div>
						<div class='name'>{$p["name"]}</div>
						<div class='price'>R{$p["price"]}</div>
						<div class='product-action'>
							<form id='{$p["id"]}' method='POST'>
								<input value='1' name='amount' type='number'>
								<input type='hidden' name='user' value='{$user}'>
								<input type='hidden' name='product_id' value='{$p["id"]}'>
								<input type='submit' value='add to basket'>
							</form>
						</div>
					</div>
					";
				}
			?>
			</div>
		</div>
	</div>

	<!-- <div class="row">
		<div class="col">
			<div class="footer">
				<div class="tile">
					<h4>About Us</h4>
				</div>
				<div class="tile">
					<h4>Facebook</h4>
				</div>
				<div class="tile">
					<h4>Reddit</h4>
				</div>
				<div class="tile">
					<h4>Twitter</h4>
				</div>
			</div>
		</div>
	</div>
	 -->
</div>
<script src="basket.js">
	
</script>


</body>
</html>