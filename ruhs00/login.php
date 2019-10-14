<?php
    include_once("./database/users.php");

    if (session_status() == 1) {
        session_start();
    }

    if (isset($_POST["login"]) && isset($_POST["passwd"]))
    {
        if (auth($_POST["login"], $_POST["passwd"]))
        {
            $_SESSION['logged_on_user'] = $_POST["login"];
            if (user_is_admin($_POST["login"]))
            {
                $_SESSION["admin"] = TRUE;
                header("Location: admin/");
            }
            else
                header("Location: index.php");
            
        }
    }

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
				<div class="welcome">Please Login</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="menu">
				<ul class="menu-main">
				</ul>
			</div>
		</div>
	</div>

	<div class="row content">
	
    <div class="login-form">
    <form method="POST">
        <div class="field">
            <div class="label">Username</div>
            <input name="login" type="text">
        </div>
        <div class="field">
            <div class="label">Password</div>
            <input name="passwd" type="password">
        </div>

        <button type="submit">Login</button>
    </form>
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

</body>
</html>