<?php 
header("Content-Type: image/png");
header('Content-Disposition: attachment; filename="42.png"');
echo readfile("./img/42.png");
?>