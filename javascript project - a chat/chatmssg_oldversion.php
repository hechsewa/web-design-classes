<?php
/* ma odczytywać kolejne linie z pliku i wyświetlać / rozpoczynać chat: tworzyć nowy plik */
$filepath = "mssglog.txt";

if(!file_exists($filepath)){ //jeżeli nie istnieje to utwórz
	$mssgfile = fopen($filepath, "w");
	fwrite($mssgfile, "New chat\n");
	fclose($mssgfile);
} else { //jeśli istnieje to wczytaj linie
	$mssgfile = fopen($filepath, "r"); 
	$mssgcont = fread($filepath,filesize($filepath));
	fclose($mssgfile);
	echo $mssgcont;
}

?>