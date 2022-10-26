<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Path of Grzęska - Przegrana!</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="css/fontello.css" rel="stylesheet" type="text/css" /> 
    <script src="jquery-1.11.3.min.js"></script>
</head>
<body style="overflow:hidden;">
<?php session_start(); include "battlefunctions.php"; StatReset(); ?>
<div id="losewin">
<table border="0" align="center">
<tr><td align="center" style="color:red; font-size:120px;">You lost!</td></tr>
<tr><td align="center"><form action="menu.php" method="post"><button type="submit" name="back" value="true">Back</button></form></td></tr>
</table>
</div>

</body>
</html>