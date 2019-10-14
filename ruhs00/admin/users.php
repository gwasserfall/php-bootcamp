<?php 
include("../database/users.php");

$users = list_users();

if (isset($_POST["username"]))
{
	echo "delete user";
	delete_user($_POST["username"]);
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
					<li class="bump tab"><a href="/admin/products">Products</a></li>
					<li class="tab"><a href="/">Home</a></li>
				</ul>
			</div>
		</div>
	</div>

	<style>
		td, th {
			border: 1px solid black;
		}
	</style>


	<div class="row">
		<div class="col content">
		<div class="users">
	<table cellpadding="10">
		<tr>
			<th>Username</th>
			<th>Type</th>
			<th>Actions</th>
		</tr>
		<tr>
		<?php
			if (count($users) > 0)
			{
				foreach ($users as $user) {
					echo "<tr>";
					echo "<td>" . $user["login"] . "</td>";
					echo "<td>" . $user["group"] . "</td>";
					echo "<td><form method='POST'>";
					echo "<input type='hidden' name='username' value='" . $user["login"] . "'>";
					echo "<input type='submit' value='delete'>";
					echo "</form></td>";
					echo "</tr>";
				}
			}
			else 
			{
				echo "<td colspan='3'>No users</td>";
			}
		?>
		</tr>
	</table>
</div>
		</div>
	</div>

</div>
</body>
</html>