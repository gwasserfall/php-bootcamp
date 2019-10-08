<?php

if ($argc > 1)
{
	$string = $argv[1];
	$array = explode(" ", $string);
	$array = array_diff($array, [""]);
	echo join(" ", $array);
	echo "\n";
}

?>