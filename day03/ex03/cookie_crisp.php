<?php
    $action = $_GET["action"];
    $name = $_GET["name"];
    $value = $_GET["value"];

    if ($action == "get")
        echo $_COOKIE[$name];
    if ($action == "set")
        setcookie($name, $value, time() + (60 * 120));
    if ($action == "del")
        setcookie($name, "", time(-1));
?>