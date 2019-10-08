#!/usr/bin/php
<?php

if ($argc == 4)
{
    $num_one = $argv[1];
    $op = $argv[2];
    $num_two = $argv[3];

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
        echo "Incorrect Parameters\n";
}
else
{
    echo "Incorrect Parameters\n";
}

?>