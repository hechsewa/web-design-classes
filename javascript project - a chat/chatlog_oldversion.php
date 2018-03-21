<?php 
/* ma pobierać metodą get nick i wiadomość i zapisywać do pliku txt */

$filepath = "mssglog.txt";

$mssgfile = fopen($filepath, "w");

$nick = $_GET["nick"];
$mssg = $_GET["mssg"];
$format = $nick.": ".$mssg."\n";

fwrite($mssgfile, $format);
fclose($mssgfile);

/*
while ($count > 4) { // max 5 wiadomosci w pliku
	$file = file($filepath);
	unset($file[0]);
	file_put_contents($filepath, $file);
	$count--;
}
 */
?>