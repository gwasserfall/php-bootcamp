<?php

function ft_is_sort($array)
{
	$res = TRUE;
	
	$sorted = $array;
	sort($sorted);

	for ($i=0; $i < count($array); $i++) { 
		if ($array[$i] != $sorted[$i])
			$res = FALSE;
	}
	return $res;
}
?>