<?php
session_start();

if (isset($_GET["product"]))
	$product = $_GET["product"];
else
	$product = false;


$user = $_SESSION["user"];





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
				<div class="actions">
					<button class="login">Login</button>
					<button class="login">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php if ($product): ?>
			<div class="menu">
				<ul class="menu-main">
					<li>Paper</li>
					<li>Staplers</li>
					<li>Staples</li>
					<li>Pens</li>
					<li>Paper Weights</li>
					<li>Rubber Bands</li>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>


	<div class="row content">
		<div class="col aside-menu">
			<?php
				print_r($_SESSION);
				
				echo "Welcome";
				echo session_id();
			?>
		</div>
		<div class="col">
			
		</div>
	</div>

	<div class="row">
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
</div>


<script>
	var active = "<?php echo 'product' ?>"

	console.log("active", active)

	if (active.length > 0)
	{
		var items = document.querySelectorAll(".menu-main li");

		items.forEach(el => {
			if (el.innerText.toLowerCase() == active.toLowerCase())
			{
				el.classList.add("active")
			}
			else
			{
				el.classList.remove("active")
			}
		})
	}
</script>


</body>
</html>