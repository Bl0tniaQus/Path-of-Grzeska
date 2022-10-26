<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Path of Grzęska - Adventure</title>
<link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style type="text/css">
		.adventurehref
		{
			border:2px solid darkgreen;
			width:350px;
			height:250px;
			float:left;
		}
	</style>
</head>
<body style="overflow:hidden;">
<?php
session_start();
include_once "battlefunctions.php";
include_once "opponentfunctions.php";
LoginCheck();
echo
'<div id="gamemenu">
	<h1 style="font-size:60px; text-align:center;">Adventure</h1>
	<div style="margin-left:auto;margin-right:auto; width:1050px;">
		<div class="adventurehref"><a href="forest.php"><img src="Grafika/Forest.jpg"></a></div><div class="adventurehref"></div><div class="adventurehref"></div>
		<div class="adventurehref"></div><div class="adventurehref"></div><div class="adventurehref"></div>
	</div>
	<div style="text-align:center;"><form action="menu.php" method="post"><button type="submit"style="width:400px; font-size:50px;" value="true">Back</button></form>
</div>';
?>
</body>
</html>