<?php

// Day_of_the_week Number_of_day Month Year Hours:Minutes:Seconds

// "Mardi 12 Novembre 2013 12:02:21"

// "Mercreday 1stJuily 99"

// lundi - Monday.
// mardi - Tuesday.
// mercredi - Wednesday.
// jeudi - Thursday.
// vendredi - Friday.
// samedi - Saturday.
// dimanche - Sunday.

// janvier - January
// février - February
// mars - March
// avril - April
// mai - May
// juin - June
// juillet - July
// aout - August
// septembre -September
// octobre - October
// novembre - November
// décembre - December
var_dump( setlocale(LC_TIME, "fr_FR") );

// Set the locale to French
setlocale(LC_TIME, "fr_FR");

$date = DateTime::createFromFormat('l d F Y h:i:s', "Mardi 12 Novembre 2013 12:02:21");

echo $date == FALSE;

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
	
	$date = [
		"dow" => $dow,
		"dom" => $dom,
		"month" => $month,
		"year" => $year,
		"time" => $time,
	];

	return $date;
}

if ($argc > 1)
{
	
	$date = collect_date($argv[1]);
	if (validate($date))
	{

	}
	else
	{
		echo "Wrong Format\n";
	}

}


?>