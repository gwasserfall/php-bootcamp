#!/usr/bin/php
<?php

function do_op($num_one, $op, $num_two)
{
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
    else
        echo "Syntax Error\n";
}

if ($argc > 1)
{

}

?>