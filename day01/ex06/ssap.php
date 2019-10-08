#!/usr/local/bin/php

<?php

if ($argc > 1)
{
	$array = [];
	for ($i=1; $i < $argc; $i++) {
		$array = array_merge($array, explode(" ", $argv[$i]));
	}
	sort($array);
	echo join("\n", $array);
	echo "\n";
}

?>