#!/usr/bin/php
<?php 
if ($argc > 1)
{
    $content = explode("\n", file_get_contents($argv[1]));
    print($html."\n\n");
    foreach ($content as $line)
    {
        preg_match('/<a.*?>([^<]+)/', $line, $matches);
        if (count($matches) == 2)
            $line = str_replace($matches[1], strtoupper($matches[1]), $line);
        preg_match('/<a.*title="(.*)"/', $line, $matches);
        if (count($matches) == 2)
            $line = str_replace($matches[1], strtoupper($matches[1]), $line);
        echo $line, "\n";
    }
}
?>