<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Path of Grzęska - Stats</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
	function DisableStatButtons()
	{
		/*
		document.getElementById("str1").disabled = true;
		document.getElementById("str5").disabled = true;
		document.getElementById("dex1").disabled = true;
		document.getElementById("dex5").disabled = true;
		document.getElementById("int1").disabled = true;
		document.getElementById("int5").disabled = true;
		*/
	}
</script>
</head>
<body style="overflow:hidden;">
<?php
session_start();
include_once "battlefunctions.php";
LoginCheck();
stats();
dbbattleinfo();
echo '<div id="gamemenu">
		<h1 style="font-size:60px; text-align:center;">Attributes</h1>
		<form action="stats.php" method="post" onsubmit="DisableStatButtons()">
		<div>
		<div class="stat" style="border-right: solid 5px darkgreen;">
		<p style="font-size:50px; color: red;">Strength</p>
		<p style="font-size:50px; color: red;">'.$_SESSION['str'].'</p>
		<p><button type="submit" name="stat" value="str1" id="str1" style="width:100px; margin:5px; height:100px; font-size:40px;">+1</button><button type="submit" name="stat" value="str5" id="str5" style="width:100px; margin:20px; height:100px; font-size:40px;">+5</button></p>
		</div>
		<div class="stat" style="border-right: solid 5px darkgreen;">
		<p style="font-size:50px; color: green;">Dexterity</p>
		<p style="font-size:50px; color: green;">'.$_SESSION['dex'].'</p>
		<p><button type="submit" name="stat" value="dex1" id="dex1" style="width:100px; margin:5px; height:100px; font-size:40px;">+1</button><button type="submit" name="stat" value="dex5" id="dex5" style="width:100px; margin:20px; height:100px; font-size:40px;">+5</button></p>
		</div>
		<div class="stat">
		<p style="font-size:50px; color: blue;">Intellect</p>
		<p style="font-size:50px; color: blue;">'.$_SESSION['int'].'</p>
		<p><button type="submit" name="stat" value="int1" id="int1" style="width:100px; margin:5px; height:100px; font-size:40px;">+1</button><button type="submit" name="stat" value="int5" id="int5" style="width:100px; margin:20px; height:100px; font-size:40px;">+5</button></p>
		</div>
		</div>
		</form>
		<form action="menu.php" method="post">
		<div style="clear:both;">
			<div id="points" style="float:left; width:50%;font-size:50px; padding-left:70px;">';
				$_SESSION['points']=(($_SESSION['lvl']-1)*5)-$_SESSION['UsedSkillPoints'];
			echo'
				<span style="position:relative; top:70px;">Attribute points:'.$_SESSION['points'].'</span>
			</div>
			<div id="statback" style="float:left; width:50%;">
				<button type="submit" name="back" value"back" id="back" style="position:relative; left:230px; top: 50px; height:100px; font-size:40px;">Back</button>
			</div>	
		</div>
</form>
</div>';
?>
</body>
</html>