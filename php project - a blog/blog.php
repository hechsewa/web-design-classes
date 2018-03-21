<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml;
	charset=UTF-8" />
	<link rel="stylesheet" title="default" href="css1.css" type="text/css" media="screen" />
	<link rel="stylesheet" title="print" href="css1-print.css" type="text/css" media="print" />
	<link rel="alternate stylesheet" title="alt: green" href="css1-alt.css" type="text/css" media="screen" />
	<script type="text/javascript" src="jspr2.js"></script>
</head>
<body onload="listStyles()">
<div id="ListStyles"></div>

<form action="blog.php" method="GET">
Tytuł bloga: <input type="text" name="blogName" /> </br>
<input type="submit" value="Wyślij" />
<input type="reset" value="Wyczyść" />
</form>

<?php
function listBlogs() {
	$blogs = glob('*', GLOB_ONLYDIR); //wszystkie katalogi z blogami
	echo "<ul>";
	foreach ($blogs as &$blog) {
		echo "<li><a href=blog.php?blogName=$blog>$blog</a></li>";
	}
	echo "</ul>";
}

$blogName = $_GET['blogName'];

			if(empty($blogName)){ //jak nie ma takiego bloga lub nie podano
				echo "<br/><b>Lista blogów: </b><br/>";
					listBlogs();
			} else {
				if(is_dir($blogName)){
					/* ----- info ------- */
					echo "<font color=#4b244a size=20><b>$blogName</b></font>";
					$info = fopen("$blogName/info", 'r');
					$nazwa = trim(fgets($info));
					$pswd = trim(fgets($info));
				
					while(!feof($info)){
						$desc = $desc."<br/>".fgets($info);
						} 
					echo "<br/><font color=#4b244a>".$desc."<br/><br/><br/></font>";
					fclose($info);
			
					$globs = glob("$blogName/*.k", GLOB_ONLYDIR); //wyszukuje katalogi z katalogami komentarzy
					$arr = scandir("$blogName");
					foreach ($arr as &$value) {
						if($value == "." || $value == "..") {} //usuwa . i .. 
						else {
						if($value != "info") { 
						/*------wpisy -------*/
						if(is_file("$blogName/$value")&&(substr($value, -3) != "ooo")){
						echo "<font color=#6969b3>Autor: ".$blogName."<br/>";
						$rok = substr($value, 0, 4)."-".substr($value, 4, 2)."-".substr($value, 6, 2);
						$czas = substr($value, 8, 2).":".substr($value, 10, 2).":".substr($value, 12, 2);
						echo "Data: ".$rok.", ".$czas."<br/>";
						$open = fopen("$blogName/$value", 'r');
						while(!feof($open)){
							echo fgets($open)."<br/>";
						}
						echo "Załączniki: <br/></font>";
						if(is_file("$blogName/$value"."1.ooo")){
							echo "<a href='".$blogName."/".$value."1.ooo'>".$value."1.ooo</a><br/>";
						}
						if(is_file("$blogName/$value"."2.ooo")){
							echo "<a href='".$blogName."/".$value."2.ooo'>".$value."2.ooo</a><br/>";
						}
						if(is_file("$blogName/$value"."3.ooo")){
							echo "<a href='".$blogName."/".$value."3.ooo'>".$value."3.ooo</a><br/>";
						}
						
						echo "<a href='http://charon.kis.agh.edu.pl/~hechsewa/formKom.php?date=".$value."&blogName=".$blogName."'>Dodaj komentarz</a><br/>";
						}
						/*----komentarze---*/
						elseif (is_dir("$blogName/$value")){
							echo "<font color=#533a7b>";
							$scanK = scandir("$blogName/$value");
							foreach ($scanK as &$k){
							$openz = fopen("$blogName/$value/$k", 'r');
							while(!feof($openz)){
							echo fgets($openz)."<br/>";
								}
							}
							echo "</font>";
						}
						}
					}
				}	
				}				
				else {
				echo "Nie ma takiego blogu"; }
				
			fclose($open);
			fclose($openz);
			}

?>
<?php include 'navi.html'; ?>
</body>
</html>