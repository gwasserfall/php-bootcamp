#!/usr/local/bin/php

<?php

function ft_split($string)
{
	$array = explode(" ", $string);
	$array = array_diff($array, [""]);
	sort($array);
	return ($array);
}
?>