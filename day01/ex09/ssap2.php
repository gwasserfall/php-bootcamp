#!/usr/bin/php
<?php

function mysort($a, $b)
{
	// alpha, number, other

	$a = strtolower($a);
	$b = strtolower($b);

	$i = 0;

	while ($a[$i] == $b[$i])
	{
		$i++;
	}
	if ($a > $b)
		return 1;
}

if ($argc > 1)
{
	$array = [];
	for ($i=1; $i < $argc; $i++) {
		$array = array_merge($array, explode(" ", $argv[$i]));
	}
	//usort($array, mysort);
	echo join("\n", $array), "\n";
}

?>