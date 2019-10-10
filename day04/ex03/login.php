<?php
session_start();
include("auth.php");

if ($_GET["login"] != "" && $_GET["passwd"] != "")
{
	$result = (auth($_GET["login"], $_GET["passwd"]));
	$_SESSION['logged_on_user'] = ($result) ? $_GET["login"] : "";
	echo ($result) ? "OK\n" : "ERROR\n";
}
else
	echo "ERROR\n";
?>