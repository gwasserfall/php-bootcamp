#!/usr/bin/php
<?php

function ordify($a)
{
	return (ctype_digit($a) ? ord($a) * 3 : (ctype_alpha($a) ? ord($a) : ord($a) * 6));
}

function mysort($a, $b)
{
	$a = array_map("ordify", str_split(strtolower($a)));
	$b = array_map("ordify", str_split(strtolower($b)));
	$i = 0;
	while ($a[$i] == $b[$i] && $i < count($a))
		$i++;
	$l = $a[$i];
	$r = $b[$i];
	if ($l > $r)
		return 1;
	return -1;
}

if ($argc > 1)
{
	$array = [];
	for ($i=1; $i < $argc; $i++) {
		$array = array_merge($array, explode(" ", $argv[$i]));
	}
	usort($array, mysort);
	echo join("\n", $array), "\n";
}
?>