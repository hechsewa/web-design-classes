<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" title="default" href="css1.css" type="text/css" media="screen" />
	<link rel="stylesheet" title="print" href="css1-print.css" type="text/css" media="print" />
	<link rel="alternate stylesheet" title="alt: green" href="css1-alt.css" type="text/css" media="screen" />
	<script type="text/javascript" src="jspr2.js"></script>
	<title>Komentarze</title>
</head>
<body onload="listStyles()">
<div id="ListStyles"></div>

	<?php
	$katalog = $_POST['date'];
	$blogWpis = $_POST['blogName'];
	
	$katalogk = $katalog.".k";
	
	if(!is_dir("$blogWpis/$katalogk")) { //jesli brak katalogu to tworzymy
		mkdir("$blogWpis/$katalogk", 0777);
	} 
	
	$liczba = 0;
	
	/* ---- sekcja krytyczna: dwa komentarze w tym samym czasie ---- */ 
	//$key = ftok("$blogWpis/$katalogk/$liczba", 'm'); //zamienia sciezke na System V IPC key
	define(KLUCZ,123456);
	$sem = sem_get(KLUCZ); //id semaforu
	ob_flush(); flush(); //flush the output buffer, flush system output buffer
	sem_acquire($sem); ///blokada
	
	while(file_exists("$blogWpis/$katalogk/$liczba")){
		$liczba = $liczba+1;
	}
	
	$kom = fopen("$blogWpis/$katalogk/$liczba", 'w');
	
	$rodzaj = $_POST['rodzaj']."\n";
	fwrite($kom, $rodzaj);
	
	$dataPlik = date('Y-m-d')." ".date('G:i:s')."\n";
	fwrite($kom, $dataPlik);
	
	$pseudo = $_POST['loginK']."\n";
	fwrite($kom, $pseudo);
	
	$komentarz = $_POST['kom']."\n";
	fwrite($kom, $komentarz);
	
	ob_flush(); flush();
	sleep(5);
	sem_release($sem); //odblokowanie
	 ?>
	 
	 <?php include 'navi.html'; ?>
</body>
</html>