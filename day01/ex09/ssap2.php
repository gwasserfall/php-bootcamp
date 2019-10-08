#!/usr/local/bin/php

<?php

if ($argc > 1)
{
	$alpha = [];
	$numeric = [];
	$special = [];
	for ($i=1; $i < $argc; $i++) {
		$current = explode(" ", $argv[$i]);
		$current = array_diff($current, [""]);

		for ($j=0; $j < count($current); $j++) { 
			
			if (ctype_alpha($current[$j][0]))
				array_push($alpha, $current[$j]);
			else if (ctype_digit($current[$j][0]))
				array_push($numeric, $current[$j]);
			else
				array_push($special, $current[$j]);
		}
	}
	natcasesort($alpha);
	print_r($numeric);
	asort($numeric, SORT_NUMERIC);
	print_r($numeric);
	natcasesort($special);
	echo join("\n", $alpha), "\n";
	echo join("\n", $numeric), "\n";
	echo join("\n", $special), "\n";

}

?>