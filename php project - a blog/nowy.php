<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" title="default" href="css1.css" type="text/css" media="screen" />
	<link rel="stylesheet" title="print" href="css1-print.css" type="text/css" media="print" />
	<link rel="alternate stylesheet" title="alt: green" href="css1-alt.css" type="text/css" media="screen" />
	<script type="text/javascript" src="jspr2.js"></script>
	<title>Obsluga blogu</title>
</head>
<body onload="listStyles()">
<div id="ListStyles"></div>

	<?php
	/* ---- sprawdz dostepnosc loginu ----- */
	$blogs = glob('*', GLOB_ONLYDIR); // wyszukiwanie tylko katalogow
	foreach ($blogs as &$blog) {
	$info = fopen($blog."/info", "r") or die("Brak informacji o loginie");
	$login = fgets($info);
	if ($login == $_POST['login']."\n") { //przerwanie jesli login zajety
		echo "Login zajety! <br/>";
		echo '<a href="http://charon.kis.agh.edu.pl/~hechsewa/form1.php">Powrót</a>';
		exit();
		}
	}
	
	/*----------- SEKCJA KRYTYCZNA: dwa blogi o tej samej nazwie w tym samym czasie ---------- */
	/*----------sprawdzenie dostepnosci blogu ---------*/
	$blog = $_POST['blog'];
	define(KLUCZ,123457);
	$sem = sem_get(KLUCZ); //id semaforu
	ob_flush(); flush(); //flush the output buffer, flush system output buffer
	sem_acquire($sem); ///blokada
	
	if(is_dir($blog)) {
		echo " Blog już istnieje<br/>";
		echo '<a href="http://charon.kis.agh.edu.pl/~hechsewa/form1.php">Powrót</a>';
	}
	elseif($blog == "") { 
		echo "Podaj nazwę blogu!<br/>";
		echo '<a href="http://charon.kis.agh.edu.pl/~hechsewa/form1.php">Powrót</a>';
		exit();
	}
	else {
		mkdir($blog, 0777);
		echo "Blog utworzony<br/>";
	}
	
	
	/* ---- zapis informacji z formularza do pliku info ------ */
	$info = fopen("$blog/info", 'w');
	$nazwa = $_POST['login']."\n";
	fwrite($info, $nazwa);
	$pswd = md5($_POST['password'])."\n";
	fwrite($info, $pswd);
	$desc = $_POST['desc'];
	fwrite($info, $desc);
	fclose($info);
	
	ob_flush(); flush();
	sleep(5);
	sem_release($sem);
	 ?>
	 <?php include 'navi.html'; ?>
	 

	 
</body>
</html>
