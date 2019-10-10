<?php
  function modify_login()
  {
    if ($_POST["submit"] != "OK" || $_POST["oldpw"] == "" || $_POST["newpw"] == "")
      return "ERROR\n";

    if (!file_exists("../private"))
      mkdir("../private");

    if (file_exists("../private/passwd"))
      $db = unserialize(file_get_contents("../private/passwd"));
    else
		return "ERROR No passwd file create a user\n";

	$oldpw_hash = hash("sha512", $_POST["oldpw"]);

	if ($oldpw_hash == $db[$_POST["login"]])
	{
		$db[$_POST["login"]] = hash("sha512", $_POST["newpw"]);
		file_put_contents("../private/passwd", serialize($db));
		return "OK\n";
	}
	else
		return "ERROR\n";
  }
  echo modify_login();
?>