<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- //5)style sheet sets tablica, selected style sheet sets <- sprawdzamy aktywny styl, ustawiamy aktywny styl -->
<head> 
<link rel="stylesheet" title="default" href="css1.css" type="text/css" media="screen" />
<link rel="stylesheet" title="print" href="css1-print.css" type="text/css" media="print" />
<link rel="alternate stylesheet" title="alt: green" href="css1-alt.css" type="text/css" media="screen" />
<script type="text/javascript" src="jspr1.js"></script>
</head>

<body onload="dater(); fileButton(); listStyles();">
<meta http-equiv="Content-Type" content="application/xhtml+xml;
charset=UTF-8" />
<div id="ListStyles"></div>

<form id="form" action="wpis.php" method="POST" enctype="multipart/form-data">
Login: <input type="text" name="loginW" /> </br>
Haslo: <input type="password" name="pswdW" /> </br>
Wpis: <textarea name="wpis"></textarea> </br>
Data: <input type="text" name="date" id="date" value="" onchange="checkDate()" /> </br>
Godzina: <input type="text" name="time" id="time" value="" onchange="checkDate()"/> </br>
Pliki:</br> 
<div id="fdiv"></div>
<input type="submit" value="Wyślij"/>
<input type="reset" value="Wyczyść" />
</form>

<?php include 'navi.html'; ?>

</body>
</html>
