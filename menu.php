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
include_once "skillsreq.php";
LoginCheck();
StatReset();
SkillInsert();
dbbattleinfo();
exprequired();
lvlup();
exprequired();
playerresources();
$exp=$_SESSION['totalexp']-$_SESSION['previousexprequired'];
$expreq=$_SESSION['exprequired']-$_SESSION['previousexprequired'];
echo
'<div id="gamemenu">
<div id="stats">

<table cellpadding="4" cellspacing="0">
<tr style="font-size:24px;"><td colspan="3">'.$_SESSION['Name'].', '.$_SESSION['Class'].', '.$_SESSION['lvl'].'lvl</td></tr>
<tr style="font-size:24px; color:red;"><td rowspan="3"><img class="avatar" src="Grafika/'.$_SESSION['Class'].'.jpg"></td><td>STR: '.$_SESSION['str'].' </td><td>HP: '.$_SESSION['MaxHP'].'</td></tr>
<tr style="font-size:24px; color:blue;"><td>INT: '.$_SESSION['int'].' </td><td>MP: '.$_SESSION['MaxMana'].'</td></tr>
<tr style="font-size:24px; color:green;"><td>DEX: '.$_SESSION['dex'].' </td><td>AS: '.$_SESSION['BaseSpeed'].'</td></tr>
<tr><td style="font-size:24px; color:#cc9900;" colspan="2" align="right">EXP: '.$exp.'/'.$expreq.'</td></tr>
</table>
<br />
<table cellpadding="0" align="center" id="skillstable">
<tr><td class="menuskill">'.$_SESSION['skill1'].'</td><td class="menuskill">'.$_SESSION['skill2'].'</td></tr>
<tr><td class="menuskill">'.$_SESSION['skill3'].'</td><td class="menuskill">'.$_SESSION['skill4'].'</td></tr>
<tr><td class="menuskill">'.$_SESSION['skill5'].'</td><td class="menuskill">'.$_SESSION['skill6'].'</td></tr>
</table>

</div>
<div id="gamenav">

<table id="navmenu" align="center">
<form action="adventure.php" method="post"><tr><td><button name="gamehref" type="submit" class="menubutton" style="width:594px; font-size:50px;" value="true">Adventure</button></td></tr></form>
<form action="stats.php" method="post"><tr><td><button name="gamehref" type="submit" class="menubutton" style="width:594px; font-size:50px;" value="true">Attributes</button></td></tr></form>
<form action="skills.php" method="post"><tr><td><button name="gamehref" type="submit" class="menubutton" style="width:594px; font-size:50px;" value="true">Skills</button></td></tr></form>
<form action="index.php" method="post"><tr><td><button name="logout" type="submit" class="menubutton" style="width:594px; font-size:50px;" value="true">Log out</button></td></tr></form>
</table>

</div>
</div>';
?>
</body>
</html>