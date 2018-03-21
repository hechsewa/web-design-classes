<?php
$filename = "mssglog.txt";

if (!file_exists($filename)) { // Jak nie ma pliku wiadomosci
	$file = fopen($filename, "w");
	fwrite($file, "New chat\n");
	fclose($file);
} else { // Jak jest
	$file = fopen($filename, "r");
	$mssgs = fread($file, filesize($filename)); //filesize - zwraca ilość bitów pliku/długość pliku
	fclose($file);
	echo $mssgs;
	sleep(1);
}

?>