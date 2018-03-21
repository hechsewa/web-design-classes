<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Słownik PHP</title>
</head>
<body>
	<?php 
	$plik = fopen('slownik.txt', 'r');
	$slowo = $_GET['slowo'];
	while (!feof($plik)) {
 	$s = fgets($plik);
	for($i=0; ($i<=strlen($slowo) && (($slowo[$i] == $s[$i]) || ($slowo[$i] == '_'))); $i++){
		if($i = strlen($slowo)) {
				echo $s; 
			}
		}
	}
	fclose($plik);
	?>
</body>
</html>
