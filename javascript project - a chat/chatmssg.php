<?php 

$filename = "mssglog.txt";
$file = fopen($filename, "a");
$count = count(file($filename)); //zwraca długość pliku
$format = $_GET["nick"].": ".$_GET["mssg"]."\n";
fwrite($file, $format);
fclose($file);

?>