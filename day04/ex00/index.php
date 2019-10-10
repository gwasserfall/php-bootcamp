<?php 
session_start();
if ($_GET["submit"] == "OK")
{
	$_SESSION["login"] = $_GET["login"];
	$_SESSION["passwd"] = $_GET["passwd"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Session</title>
	<style>
		.container {
			width: 100vw;
			height: 100vh;
			display: flex;
			padding-top: 15vh;
			justify-content: center;
		}

		.login {
			background: whitesmoke;
			width: 50vw;
			height: 20vh;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: space-between;
			padding: 0px 20px 0px 20px;
		}

	</style>
</head>
<body>
	<div class="container">
		<form class="form" method="get">
			<div class="login">
				Username  <input type="text" name="login" value="<?= $_SESSION["login"] ?>">
				Password  <input type="text" name="passwd" value="<?= $_SESSION["passwd"] ?>">
				<input type="submit" name="submit" value="OK">
			</div>
		</form>
	</div>
</body>
</html>