<?php
function auth($login, $passwd)
{
	if ($login == "" || $passwd == "")
		return FALSE;
	if (file_exists("../private/passwd"))
		$db = unserialize(file_get_contents("../private/passwd"));
	else
		return FALSE;
	if ($db[$login] == "")
		return FALSE;
	if ($db[$login] == hash("sha512", $passwd))
		return TRUE;
	else
		return FALSE;
}
?>