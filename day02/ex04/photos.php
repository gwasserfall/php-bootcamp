<?php

if ($argc == 2)
{
    $ch = curl_init($argv[1]);

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $html = curl_exec($ch);

    $folder = str_replace("https://", "", $argv[1]);
    $folder = str_replace("http://", "", $folder);

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    preg_match('/<body.*<\/body/sm', $html, $body);
    preg_match_all('/<img[^>]+src="([^">]+)"/i', $body[0], $match);

    foreach ($match[1] as $img)
    {

        preg_match('/[^\/\\&\?]+\.\w{3,4}(?=([\?&].*$|$))/', $img, $filename);
        
        if (!preg_match("/http/i", $img))  
            $img = $argv[1] . $img;
     
        $contents = file_get_contents($img);
        $save = file_put_contents($folder . "/" .$filename[0], $contents);
    }
    curl_close($ch);
}
?>