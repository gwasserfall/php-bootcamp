#!/usr/bin/php
<?php

function day_to_int($day)
{
	$fre = [
		"lundi",
		"mardi",
		"mercredi",
		"jeudi",
		"vendredi",
		"samedi",
		"dimanche"
	];

	$index = array_search(strtolower($day), $fre);

	return $index + 1;
}

function month_to_int($month)
{
	$fre = [
		"janvier",
		"février",
		"mars",
		"avril",
		"mai",
		"juin",
		"juillet",
		"aout",
		"septembre",
		"octobre",
		"novembre",
		"décembre"
	];

	$index = array_search(strtolower($month), $fre);

	return $index + 1;

}


function validate($date)
{
	foreach ($date as $key => $value) {
		if (count($value) < 1)
			return FALSE;
	}
	return TRUE;
}

function collect_date($string)
{
	preg_match("/(lundi|mardi|mercredi|jeudi|vendredi|samedi|dimanche)/i", $string, $dow);
	preg_match("/(janvier|février|mars|avril|mai|juin|juillet|aout|septembre|octobre|novembre|décembre)/i", $string, $month);
	preg_match("/(\d{2}:\d{2}:\d{2})/", $string, $time);
	preg_match("/(\d{4})/", $string, $year);
	preg_match("/\s(\d{2})\s/", $string, $dom);
	
	$a = explode(":", $time[0]);
	$hour = $a[0];
	$minute = $a[1];
	$second = $a[2];

	$date = [
		"dow" => $dow[0], //string
		"dom" => $dom[0], //int
		"month" => $month[0], //string
		"year" => $year[0], // int
		"time" => $time[0], // string
		"hour" => $hour, //int
		"min" => $minute, //int
		"sec" => $second
	];

	return $date;
}

if ($argc > 1)
{
	
	$date = collect_date($argv[1]);
	if (validate($date))
	{
		date_default_timezone_set("Europe/Paris");
		print_r(mktime($date["hour"], $date["min"], $date["sec"], month_to_int($date["month"]), $date["dom"], $date["year"]));
		echo "\n";
	}
	else
	{
		echo "Wrong Format\n";
	}
}


?>