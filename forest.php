<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Path of Grzęska - Game</title>
<link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body style="overflow:hidden;">
<?php
session_start();
include_once "battlefunctions.php";
include_once "AdventureFunctions.php";
include_once "opponentfunctions.php";
LoginCheck();
OpponentInfo("Dungeon1");
echo
'<div id="gamemenu">
	<h1 style="font-size:60px; text-align:center;">Forest</h1>
	<p style="text-align:center;"><img src="grafika/forest.jpg"></p>
	<form action="battle.php" method="post">
		<div style="text-align:center;"><select style="width:600px; height:80px; font-size:40px; background-color:lightgreen;" name="opponent">'; forest(); echo '</select></div>
		<div style="text-align:center;"><button type="submit" name="battlesubmit" value="true" style="width:350px; height:100px; font-size:40px;">Battle!</button></form><form action="adventure.php" method="post"><button type="submit" name="battleback" value="true" style="width:350px; height:100px; font-size:40px;">Back</button></form></div>
	</form>
</div>';
?>
</body>
</html>