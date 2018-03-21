<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Lab PHP</title>
</head>
<body>
	<?php
	function witaj($imie){
	return 'Cześć ' . $imie .'!';
	}

	$x = $_GET['imie'];
	$liczba = $_GET['liczba'];
	
	if ($x == 'Ewa' ) { echo witaj($x); }
	else { 
	for($i=0; $i<$liczba; $i++){
	echo 'Brak dostępu '; }
	} ?>
</body>
</html>
