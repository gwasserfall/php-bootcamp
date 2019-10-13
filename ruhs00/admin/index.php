<?php
session_start();
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
				<div class="logo"><img ID="header" src="/ruhs00/img/logo-large.png" alt="logo"></div>
				<h1 class="admin">Admin</h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="menu">
				<ul class="menu-main">
					<li>Products</li>
					<li>Users</li>
				</ul>
			</div>
		</div>
	</div>


	<div class="row content">
		<div class="col aside-menu">
			<ul class="menu">
                <li class="a-menu-item active">Edit Products</li>
                <li class="a-menu-item">Add New Product</li>
                <li class="a-menu-item">Add Category</li>
            </ul>
		</div>
		<div class="col data">
			
            <!-- New product -->
            <form action="products" method="POST">
            
                Name : <input type="text"><br>
                Category : <input type="text"><br>
                <input type="text"><br>
                <input type="text"><br>
                <input type="file" name="image" id=""><br>
            
            
            </form>
		</div>
	</div>

    Category: 


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
					<h4>Fuck you</h4>
				</div>
				<div class="tile">
					<h4>Twitter</h4>
				</div>
			</div>
		</div>
	</div> -->
</div>
</body>
</html>