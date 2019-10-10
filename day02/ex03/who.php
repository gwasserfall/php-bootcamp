#!/usr/bin/php
<?php
date_default_timezone_set("Europe/Paris");
$file_d = fopen("/var/run/utmpx", "rb");
while ($line = fread($file_d, 628)) {
    $line = unpack("a256user/a4id/a32line/ipid/itype/I2time", $line);
    if ($line['type'] == "7")
        echo $line['user'], " ", $line['line'], "  ", date("M  j H:i", $line['time1']), "\n";
}
?>