<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<meta http-equiv="Content-Type" content="application/xhtml+xml;
charset=UTF-8" />

<form action="wpis.php" method="POST" enctype="multipart/form-data">
Login: <input type="text" name="loginW" /> </br>
Haslo: <input type="password" name="pswdW" /> </br>
Wpis: <textarea name="wpis"></textarea> </br>
Data: <input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" /> </br>
Godzina: <input type="text" name="time" value="<?php echo date('G:i'); ?>" /> </br>
Pliki:</br> 
<input type="file" name="file1" value=""/> </br>
<input type="file" name="file2" value=""/> </br>
<input type="file" name="file3" value=""/> </br>
<input type="submit" value="Wyślij" />
<input type="reset" value="Wyczyść" />
</form>

<?php include 'navi.html'; ?>

</body>
</html>
