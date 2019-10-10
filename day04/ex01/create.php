<?php
  function create_login()
  {
    if ($_POST["submit"] != "OK" || $_POST["passwd"] == "")
      return "ERROR\n";

    if (!file_exists("../private"))
      mkdir("../private");

    if (file_exists("../private/passwd"))
      $db = unserialize(file_get_contents("../private/passwd"));
    else
      $db = [];

    if ($db[$_POST["login"]] != "")
      return "ERROR\n";

    $db[$_POST["login"]] = hash("sha512", $_POST["passwd"]);

    file_put_contents("../private/passwd", serialize($db));

    return "OK\n";
  }
  echo create_login();
?>