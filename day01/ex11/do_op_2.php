#!/usr/bin/php
<?php

function do_op($num_one, $op, $num_two)
{
    if (!is_numeric($num_one) || !is_numeric($num_two))
    {
        echo "Syntax Error\n";
        return;
    }
    if (trim($op) == "+")
        echo $num_one + $num_two, "\n";
    elseif (trim($op) == "-")
        echo $num_one - $num_two, "\n";
    elseif (trim($op) == "*")
        echo $num_one * $num_two, "\n";
    elseif (trim($op) == "/")
        echo $num_one / $num_two, "\n";
    elseif (trim($op) == "%")
        echo $num_one % $num_two, "\n";
}

if ($argc == 2)
{
    $op = FALSE;
    if (strpos($argv[1], "+"))
        $op = (!$op) ? "+" : FALSE;
    if (strpos($argv[1], "-"))
        $op = (!$op) ? "-" : FALSE;
    if (strpos($argv[1], "*"))
        $op = (!$op) ? "*" : FALSE;
    if (strpos($argv[1], "/"))
        $op = (!$op) ? "/" : FALSE;
    if (strpos($argv[1], "%"))
        $op = (!$op) ? "%" : FALSE;
    if ($op)
    {
        $a = explode($op, $argv[1]);
        if (count($a) > 2)
        {
            echo "Syntax Error\n";
            return;
        }
        do_op(trim($a[0]), $op, trim($a[1]));
    }
    else
        echo "Syntax Error\n";
}

?>