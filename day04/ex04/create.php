<?php

  function create_login()
  {
	$result = [];
    if ($_POST["submit"] != "OK" || $_POST["passwd"] == "")
    {
		$result["status"] = FAILED;
		$result["error"] = "Submit value incorrect or no password supplied";
		return $result;
	}

    if (!file_exists("../private"))
      mkdir("../private");

    if (file_exists("../private/passwd"))
      $db = unserialize(file_get_contents("../private/passwd"));
    else
      $db = [];

    if ($db[$_POST["login"]] != "")
    {
		$result["status"] = FALSE;
		$result["error"] = "This username is being used, please try another";
		return $result;
	}

    $db[$_POST["login"]] = hash("sha512", $_POST["passwd"]);

    file_put_contents("../private/passwd", serialize($db));
	$result["status"] = TRUE;
    return $result;
  }

  $result = create_login()

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>42 Chat Login</title>
	<style>
		* {
			font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
		}

		.container {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			height: 100%;
			padding-top: 10vh;
			font-size: 1.5em;
		}

		.green {
			font-size: 1.8em;
			color: darkgreen;
		}

		.red {
			font-size: 1.8em;
			color: red;
		}

	</style>
</head>
<body>
	<div class="container">

		<?php if ($result["status"]): ?>
			<p class="green"><strong>OK</strong></p>
			<div>Account created successfully</div>
			<div>You will be redirected to login shortly</div>
			<script>
				setTimeout(function () {
				window.location.href = 'index.html';
				}, 7000);
			</script>
		<?php endif; ?>

		<?php if (!$result["status"]): ?>
		<p class="red"><strong>ERROR</strong></p>
				<p><?= $error ?></p>
		<?php endif; ?>

	</div>
</body>
</html>