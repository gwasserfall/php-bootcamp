<?php
    if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "Ilovemylittleponey")
    {
        $file = file_get_contents("./img/42.png");
        $enc = base64_encode($file);
        $str = '<html><body>Hello Zaz<br><img src="data:image/png;base64,';
        $str .= $enc;
        $str .= "\"></body></html>";
        echo $str;
    }
    else
    {
        echo "<html><body>That area is accessible for members only</body></html>";
        header("WWW-Authenticate: Basic realm=''Member area''");
        header("HTTP/1.0 401 Unauthorized");
        header("Connection: close");
    }
?>