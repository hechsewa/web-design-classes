<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<link rel="stylesheet" title="default" href="css1.css" type="text/css" media="screen" />
	<link rel="stylesheet" title="print" href="css1-print.css" type="text/css" media="print" />
	<link rel="alternate stylesheet" title="alt: green" href="css1-alt.css" type="text/css" media="screen" />
	<script type="text/javascript" src="jspr2.js"></script>
</head>
<body onload="listStyles()">
<div id="ListStyles"></div>

<form action="koment.php" method="POST">
Rodzaj komentarza: <select name = "rodzaj">
<option>pozytywny</option>
<option>negatywny</option>
<option>neutralny</option>
</select> </br>
Komentarz: <textarea name="kom"></textarea> </br>
Pseudonim: <input type="text" name="loginK" /> </br>
<input type="hidden" name="date" value="<?php echo $_GET['date']; ?>" /> </br>
<input type="hidden" name="blogName" value="<?php echo $_GET['blogName']; ?>" /> </br>
<input type="submit" value="Wyślij" />
<input type="reset" value="Wyczyść" />
</form>

<?php include 'navi.html'; ?>

</body>
</html>