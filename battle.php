<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Path of Grzęska - Battle</title>
<link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="jquery-1.11.3.min.js"></script>
</head>
<script type="text/javascript">

jQuery(function() {
  $("#battleform").submit(function() {
		// submit more than once return false
		$(this).submit(function() {
			return false;
		});
		// submit once return true
		return true;
	});
});
</script>
<body style="overflow:hidden;">
<?php
		session_start();
		include "przeciwnicy.php";		
		include "battlefunctions.php";
		include "playerskills.php";
		include "opponentskills.php";
		if ((!isset($_SESSION['loggedin']))&&(!isset($_POST['skill']))) {@session_destroy(); header("location: index.php");}
		else if ((isset($_SESSION['loggedin']))||(isset($_POST['skill'])))
		{
		if (!isset($_SESSION['turn'])) {StatSet();$_SESSION['turn']=0;}
		$_SESSION['turn']++;
		
		if ((isset($_SESSION['ActualOppHP']))&&($_SESSION['ActualOppHP']<=0)) {header("location: win.php");}
		dbbattleinfo();
		OpponentCheck();
		actualresources();
		include "AI/".$_SESSION['AI'];
		battle();
		
		
		echo
'<div id="battlecontainer">
<div id="topleftcorner">';
echo '<p style="font-size:30px;">'; if ($_SESSION['turn']!=1){echo 'Turn: '.($_SESSION['turn']-1);} echo'</p>';
BattleLogs();

echo
'</div>
<div id="toprightcorner">
<table border="0">';

		
		

echo
'<tr><td colspan="2">'.$_SESSION['oppname'].', '.$_SESSION['opplvl'].' lvl</td></tr>
<tr><td rowspan="3"><img class="avatar" src="Grafika/'.$_SESSION['oppname'].'.jpg"></td></tr>
<tr><td>HP: </td><td><meter value="'.$_SESSION['ActualOppHP'].'" max="'.$_SESSION['OppMaxHP'].'" id="hp">HP</meter>'.$_SESSION['ActualOppHP'].'/'.$_SESSION['OppMaxHP'].'<td></tr>
<tr><td>Mana: </td><td><meter value="'.$_SESSION['ActualOppMana'].'" max="'.$_SESSION['OppMaxMana'].'"  id="mana">HP</meter>'.$_SESSION['ActualOppMana'].'/'.$_SESSION['OppMaxMana'].'<td></tr>
<tr><td>'; OppBuffImages(); echo '</td></tr>
</table>


</div>

<div id="bottomleftcorner">';
 
echo
'<table border="0">
<tr><td colspan="2">'.$_SESSION['Name'].', '.$_SESSION['Class'].', '.$_SESSION['lvl'].' lvl</td></tr>
<tr><td rowspan="3"><img class="avatar" src="Grafika/'.$_SESSION['Class'].'.jpg"></td>
<td>HP: </td><td><meter  value="'.$_SESSION['ActualHP'].'" max="'.$_SESSION['MaxHP'].'" min="0" id="hp">HP</meter>'.$_SESSION['ActualHP'].'/'.$_SESSION['MaxHP'].'</td></tr>
<tr><td>Mana: </td><td><meter  value="'.$_SESSION['ActualMana'].'" max="'.$_SESSION['MaxMana'].'" min="0" id="mana">MP</meter>'.$_SESSION['ActualMana'].'/'.$_SESSION['MaxMana'].'<td></tr>';

echo '<tr><td>'; BuffImages();
echo
'</td></tr>
</table>
</div>
<div id="bottomrightcorner">';
echo
'
<form action="battle.php" method="post" id="battleform">
<table border="0">
<tr><td><button type="submit" name="skill" value="Basic attack" style="width:289px;" class="skill">Basic attack</button></td></tr>
<tr><td><button type="submit" name="skill" value="'.$_SESSION['skill1'].'" style="width:289px;" class="skill">'.$_SESSION['skill1'].'</button></td><td><button type="submit" name="skill" value="'.$_SESSION['skill2'].'" style="width:289px;" class="skill">'.$_SESSION['skill2'].'</button></td></tr>
<tr><td><button type="submit" name="skill" value="'.$_SESSION['skill3'].'" style="width:289px;" class="skill">'.$_SESSION['skill3'].'</button></td><td><button type="submit" name="skill" value="'.$_SESSION['skill4'].'" style="width:289px;" class="skill">'.$_SESSION['skill4'].'</button></td></tr>
<tr><td><button type="submit" name="skill" value="'.$_SESSION['skill5'].'" style="width:289px;" class="skill">'.$_SESSION['skill5'].'</button></td><td><button type="submit" name="skill" value="'.$_SESSION['skill6'].'" style="width:289px;" class="skill">'.$_SESSION['skill6'].'</button></td></tr>
</table>
</form>
</div>';
		}
		
echo 

'</div>
</body>
</html>';
?>