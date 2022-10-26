<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Path of Grzęska - Skills</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">

	.skillselectdiv
	{
		margin: 30px 30px;
		border: solid 8px darkgreen;
		position:relative; left:25px;
	}
	.skillselect
	{
		width:300px;
		height:60px;
		font-size:20px;
		background-color:lightgreen;
	}
	
	
</style>
</head>
<body style="overflow:hidden;">
<?php
session_start();
include_once "battlefunctions.php";
include_once "skillfunctions.php";
include_once "skillsreq.php";
LoginCheck();
stats();
dbbattleinfo();
SkillRequirements();
SkillSet();
echo '<div id="gamemenu">

	<h1 style="font-size:60px; text-align:center;">Skills</h1>
	
	<div>
	<form action="menu.php" method="post" id="skillform">
	<div class="skillselectdiv" style="float:left;"><select class="skillselect" name="skillset1" form="skillform">'; SkillSelect(1); echo' </select></div>
	<div class="skillselectdiv" style="float:left;"><select class="skillselect" name="skillset2" form="skillform">'; SkillSelect(2); echo' </select></div>
	<div class="skillselectdiv" style="float:left;"><select class="skillselect" name="skillset3" form="skillform">'; SkillSelect(3); echo' </select></div>
	<div class="skillselectdiv" style="clear:both; float:left;"><select class="skillselect" name="skillset4" form="skillform">'; SkillSelect(4); echo' </select></div>
	<div class="skillselectdiv" style="float:left;"><select class="skillselect" name="skillset5" form="skillform">'; SkillSelect(5); echo' </select></div>
	<div class="skillselectdiv" style="float:left;"><select class="skillselect" name="skillset6" form="skillform">'; SkillSelect(6); echo' </select></div>
	</div>
	<div style="text-align:center; position:relative; top:100px;  clear:both;"><button type="submit" name="skillsubmit" value="true" style="width:400px; height:125px; font-size:50px;">Confirm</button></div>
	</form>
	
	
	
</div>';
?>
</body>
</html>