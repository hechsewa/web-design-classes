<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" title="default" href="css1.css" type="text/css" media="screen" />
	<link rel="stylesheet" title="print" href="css1-print.css" type="text/css" media="print" />
	<link rel="alternate stylesheet" title="alt: green" href="css1-alt.css" type="text/css" media="screen" />
	<script type="text/javascript" src="jspr2.js"></script>
	<title>Dodawanie wpisu</title>
</head>
<body onload="listStyles()">
<div id="ListStyles"></div>

	<?php
	
	$loginWpis = $_POST['loginW'];
	$pswdWpis = md5($_POST['pswdW']);
	$data = $_POST['date'];
	$time = $_POST['time'];

	if ($handle = opendir('.')) {
		while (false !== ($entry = readdir($handle))) {
			if ($entry != "." && $entry != "..") {
				if(is_dir($entry)){
				$open = fopen("$entry/info", 'r');
				$nazwa = trim(fgets($open));
				$haslo = trim(fgets($open));
					if(($nazwa == $loginWpis) && ($haslo == $pswdWpis)){
					$blogWpis = $entry;		
					}
				}	
			}
		}
	}
	
	$un = mt_rand(10,99);
	$trimmedDate = str_replace('-','',$data);
	$trimmedTime = str_replace(':','',$time);
	$sec = substr(time(),-2);
	$format = "$trimmedDate"."$trimmedTime"."$sec"."$un";
	
	$newFile = fopen("$blogWpis/$format", 'w');
	$wpis = $_POST['wpis'];
	fwrite($newFile, $wpis);
	$newFile = fclose("$blogWpis/$format");
	
	/* $file1 = basename($_FILES['file1']['name']);
	$file2 = basename($_FILES['file2']['name']);
	$file3 = basename($_FILES['file3']['name']);
	
	$format1 = $format."1.ooo";
	$format2 = $format."2.ooo";
	$format3 = $format."3.ooo";
	
	if($file1 != "") {
	move_uploaded_file($_FILES['file1']['tmp_name'], "$blogWpis/$format1"); }
	if ($file2 != "") {
	move_uploaded_file($_FILES['file2']['tmp_name'], "$blogWpis/$format2"); }
	if ($file3 != "") {
	move_uploaded_file($_FILES['file3']['tmp_name'], "$blogWpis/$format3"); } */
	
	
	/*----- wydruk wpisu -----*/
	echo "Autor: ".$loginWpis."<br/>";
	echo "Data: ".$data." ".$time."<br/>";
	echo $wpis."<br/>";
	/* if(is_uploaded_file($_FILES['file1']['tmp_name'])){
		echo "<a href='charon.kis.agh.edu.pl/~hechsewa/".$blogWpis."/".$format."1.ooo'>".$file1."</a><br/>"; 
	} else if (is_uploaded_file($_FILES['file2']['tmp_name'])){
		echo "<a href='".$blogWpis."/".$format."2.ooo'>".$file2."</a><br/>";
	} else if (is_uploaded_file($_FILES['file3']['tmp_name'])) {
		echo "<a href='".$blogWpis."/".$format."3.ooo'>".$file3."</a><br/>";
	} */
	
	//lista plików
	
	echo "<br/>Lista plików: <br/>";
	/*--------pliki --------*/
	foreach($_FILES as $key => $file) {
		$i = $i+1;
		$fileF = basename($_FILES[$key]['name']);
		$formatF = $format.$i.".ooo";
		//echo $formatF."<br/>";
		if($fileF != "") {
			move_uploaded_file($_FILES[$key]['tmp_name'], "$blogWpis/$formatF"); 
			echo "<a href='".$blogWpis."/".$formatF."'>".$fileF."</a><br/>";
		}
		echo "<br/>";
	}
	/*
	foreach ($_FILES as $key => $file) {
	echo basename($_FILES[$key]['name']);
	echo "<br/>";
	}*/
	
	?>
	 
	 <!----przekazanie wartosci do formularza z komentarzami ---->
	 <form action="formKom.php" method="GET">
	 <input type="hidden" name="date" value="<?php echo $format; ?>" /> 
	 <input type="hidden" name="blogName" value="<?php echo $blogWpis; ?>"/> 
	<input type="submit" value="Dodaj komentarz" />
	</form>
	 
	 <?php include 'navi.html'; ?>
	 
</body>
</html>
