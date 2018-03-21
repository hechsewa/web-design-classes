<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<meta http-equiv="Content-Type" content="application/xhtml+xml;
charset=UTF-8" />

<?php
$file = basename($_FILES['fileA']['tmp_name']);
if($file != "") echo "jest";
else echo "nie ma";

?>

</body>
</html>