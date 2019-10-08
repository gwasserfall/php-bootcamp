#!/usr/bin/php
<?php

while (TRUE)
{
	echo "Enter a number: ";
	$in = fgets(STDIN);
	
	if ($in == NULL)
		exit(1);
	$in = trim($in);
	
	if (ctype_digit($in) == TRUE)
	{
		echo "The number $in is ";
		if ($in % 2 == 0)
		{
			echo "even\n";
		}
		else
		{
			echo "odd\n";
		}
	}
	else
	{
		$in = str_replace("\n", "", $in);
		echo "'$in' is not a number\n";
	}
}

?>