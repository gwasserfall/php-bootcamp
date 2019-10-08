<?php

if ($argc > 1)
{
	$array = explode(" ", $argv[1]);
	$array = array_diff($array, [""]);
	$array = array_reverse($array);

	echo join("\n", $array);
	echo "\n";
}

?>