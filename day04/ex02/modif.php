<?php


  function array_count($array)
  {
      $i = 0;
      while ($array[$i] != "")
          $i++;
      return $i;
  }

  function contains_login($array, $login)
  {
      for ($i=0; $i < array_count($array); $i++) { 
          if ($array[$i]["login"] == $login)
              return TRUE;
      }
      return FALSE;
  }

  function get_user_index($array, $user)
  {
    for ($i=0; $i < array_count($array); $i++) {
      if ($array[$i]["login"] == $user)
        return $i;
    }
    return -1;
  }

  function modify_login()
  {
    $submit = $_POST["submit"];
    $login = $_POST["login"];
    $oldpw = $_POST["oldpw"];
    $newpw = $_POST["newpw"];

    if ($submit != "OK" || $oldpw == "" || $newpw == "")
      return "ERROR\n";

    if (!file_exists("../private"))
      mkdir("../private");

    if (file_exists("../private/passwd"))
      $db = unserialize(file_get_contents("../private/passwd"));
    else
		  return "ERROR\n";

	  $oldpw_hash = hash("sha512", $oldpw);
    $user_index = get_user_index($db, $login);

    if ($user_index == -1)
      return "ERROR\n";

	  if ($oldpw_hash === $db[$user_index]["passwd"])
    {
      $db[$user_index]["passwd"] = hash("sha512", $newpw);
      file_put_contents("../private/passwd", serialize($db));
      return "OK\n";
    }
    else
      return "ERROR\n";
    }
  echo modify_login();
?>