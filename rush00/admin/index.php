<?php
session_start();

include_once("../database/users.php");
include_once("../database/products.php");

?>

<!DOCTYPE>
<html>
<head>
<title>Dunder Agon inc. Admin</title>
<link rel="stylesheet" type="text/css" href="../styles/style_landing.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../styles/style_admin.css" media="screen" />
</head>
<body>
<div class="container">

	<div class="row">
		<div class="col">
			<div class="header">
				<div class="logo"><img ID="header" src="/img/logo-large.png" alt="logo"></div>
				<h1 class="admin">Admin</h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="menu">
				<ul class="menu-main">
					<li class="bump tab"><a class="bumo link" href="/">Home</a></li>
					<li class="tab"><a class="link" href="/admin/products.php">Products</a></li>
					<li class="tab"><a class="link" href="/admin/users.php">Users</a></li>
				</ul>
			</div>
		</div>
	</div>


	<div class="row content">
		<div class="col data">
			
		   <div class="usercount">
			   Users: 
			   <?php echo count(list_users()); ?>
		   </div>
		   <div class="productcount">
			   Products: 
		   <?php echo count(list_products()); ?>
		   </div>
		   <div class="categorycount">
			   Product Categories: 
			   <?php echo count(list_categories()); ?>
		   </div>

		</div>
	</div>

</div>
</body>
</html>