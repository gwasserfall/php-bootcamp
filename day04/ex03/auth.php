<?php

function get_user_index($array, $user)
{
  for ($i=0; $i < array_count($array); $i++) {
	if ($array[$i]["login"] == $user)
	  return $i;
  }
  return -1;
}

function auth($login, $passwd)
{
	if ($login == "" || $passwd == "")
		return FALSE;
	if (file_exists("../private/passwd"))
		$db = unserialize(file_get_contents("../private/passwd"));
	else
		return FALSE;

	$user_id = get_user_index($login);

	if ($user_id < 0)
		return FALSE;

	if ($db[$user_id]["passwd"] == hash("sha512", $passwd))
		return TRUE;
	else
		return FALSE;
}
?>