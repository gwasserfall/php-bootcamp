#!/usr/bin/php
<?php

if ($argc > 1)
{
	$array = explode(" ", $argv[1]);
	$array = array_diff($array, [""]);
	
	$array[count($array)] = $array[0];

	echo join(" ", array_splice($array, 1)), "\n";
}

?>