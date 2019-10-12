<?php


    function array_count($array)
    {
        $i = 0;
        while ($array[$i] != "")
            $i++;
        return $i;
    }

    function contains_login($array, $login)
    {
        if (!$array)
            return FALSE;    

        print_r($array);

        for ($i=0; $i < array_count($array); $i++) {
            if ($array[$i]["login"] == $login)
                return TRUE;
        }
        return FALSE;
    }

    function create_login()
    {

        $submit = $_POST["submit"];
        $login = $_POST["login"];
        $passwd = $_POST["passwd"];

        if ($submit != "OK" || $passwd == "")
            return "ERROR\n";

        if (!file_exists("../private"))
            mkdir("../private");

        if (file_exists("../private/passwd"))
            $db = unserialize(file_get_contents("../private/passwd"));
        else
            $db = [];

        if (contains_login($db, $login))
            return "ERROR\n";

        $db[array_count($db)] = [
            "login" => $login,
            "passwd" => hash("sha512", $passwd)
        ];

        file_put_contents("../private/passwd", serialize($db));

        return "OK\n";
    }
  echo create_login();
?>