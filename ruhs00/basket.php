<?php
session_start();

include_once("database/basket.php");

$user = "";
if (isset($_SESSION["logged_on_user"]))
{
	$items = get_basket($_SESSION["logged_on_user"]);
	$user = $_SESSION["logged_on_user"];
}
else
{
	$items = $_SESSION["basket"];
}



?>





<!DOCTYPE>
<html>
<head>
<title>Dunder Agon inc. Admin</title>
<link rel="stylesheet" type="text/css" href="/styles/style_landing.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/styles/style_admin.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/styles/style_basket.css" media="screen" />
</head>
<body>
<div class="container">

	<div class="row">
		<div class="col">
			<div class="header">
				<div class="logo"><img ID="header" src="/img/logo-large.png" alt="logo"></div>
				<h1 class="admin">Basket</h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="menu">
				<ul class="menu-main">
					<li class="bump tab"><a href="/">Home</a></li>
				</ul>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col content">
			<div class="items">
				<div class="item">
					<div class="name heading">Name</div>
					<div class="amount heading">Amount</div>
					<div class="price heading">Price per Item</div>
					<div class="total heading">Line Total</div>
				</div>
				<?php
					$total = 0;
					foreach ($items as $item) {
						$total += $item["amount"] * $item["price"];

						echo "
						<div class='item'>
						<div class='name'>{$item["name"]}</div>
						<div class='amount'>
							<form id='{$item["id"]}' method='POST'>
								<input type='number' name='amount' value='{$item["amount"]}'>
								<input type='hidden' name='product_id' value='{$item["id"]}'>
								<input type='hidden' name='user' value='$user'>
							</form>
						</div>
						<div class='price'>{$item["price"]}</div>
						<div class='total'>R {$item["total"]}</div>
						<div class='update'><input type='submit' form='{$item["id"]}' value='update'></div>
						</div>
					";
					}
				
				?>
				<div class="item">
					<div class="grand-total">Grand total : R <?php echo $total; ?></div>
				</div>
			</div>
			<div class="action">
				<button>Check Out</button>
			</div>
		</div>
	</div>

</div>
</body>
</html>