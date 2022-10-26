<?php
function dbbattleinfo()
{
include "connect.php";
		$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
			if($connection->connect_errno > 0)
			{
				die('Error while connecting to Database. [' . $connection->connect_error . ']');
			}
				else
				{
	$connection -> query("SET NAMES 'utf8'");
	$username=$_SESSION['username'];
	$sql = <<<SQL
    SELECT *
    FROM accounts
    WHERE Nazwa = '$username'
SQL;
if(!$result = $connection->query($sql))
{
    die('Wystąpił błąd z zapytaniem SQL [' . $connection->error . ']');
}
	
	while($row = $result->fetch_assoc())
	{
			$_SESSION['id']=$row['id'];
			$_SESSION['Name']=$row['Postać'];
			$_SESSION['lvl']=$row['lvl'];
			$_SESSION['Class']=$row['Klasa'];
			$_SESSION['skill1']=$row['skill1'];
			$_SESSION['skill2']=$row['skill2'];
			$_SESSION['skill3']=$row['skill3'];
			$_SESSION['skill4']=$row['skill4'];
			$_SESSION['skill5']=$row['skill5'];
			$_SESSION['skill6']=$row['skill6'];
			$_SESSION['totalexp']=$row['EXP'];
			$_SESSION['str']=$row['strength'];
			$_SESSION['int']=$row['intellect'];
			$_SESSION['dex']=$row['dexterity'];
			$_SESSION['UsedSkillPoints']=$row['UsedSkillpoints'];
			
                
	}
	$connection->close();
				}
}

function stats()
{
	
	if (isset($_POST['stat']))
	{

		include "connect.php";
		$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
			if($connection->connect_errno > 0)
			{
				die('Error while connecting to Database. [' . $connection->connect_error . ']');
			}
				else
				{
	$connection -> query("SET NAMES 'utf8'");
	$username=$_SESSION['username'];
	
	if ($_POST['stat']=="str1")
	{
		if ($_SESSION['points']>=1)
		{
		$sql = <<<SQL
    UPDATE accounts
    SET strength = strength + 1, UsedSkillpoints = UsedSkillpoints + 1 
    WHERE Nazwa = '$username'
SQL;
if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
	}
	}
	else if ($_POST['stat']=="str5")
	{
		if ($_SESSION['points']>=5)
		{
		$sql = <<<SQL
    UPDATE accounts
    SET strength = strength + 5, UsedSkillpoints = UsedSkillpoints + 5 
    WHERE Nazwa = '$username'
SQL;
if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
	}
	}
	else if ($_POST['stat']=="dex1")
	{
		if ($_SESSION['points']>=1)
		{
		$sql = <<<SQL
    UPDATE accounts
    SET dexterity = dexterity + 1, UsedSkillpoints = UsedSkillpoints + 1 
    WHERE Nazwa = '$username'
SQL;
if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
	}
	}
	else if ($_POST['stat']=="dex5")
	{
		if ($_SESSION['points']>=5)
		{
		$sql = <<<SQL
    UPDATE accounts
    SET dexterity = dexterity + 5, UsedSkillpoints = UsedSkillpoints + 5 
    WHERE Nazwa = '$username'
SQL;
if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
	}
	}
	else if ($_POST['stat']=="int1")
	{
		if ($_SESSION['points']>=1)
		{
		$sql = <<<SQL
    UPDATE accounts
    SET intellect = intellect + 1, UsedSkillpoints = UsedSkillpoints + 1 
    WHERE Nazwa = '$username'
SQL;
if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
		}
	}
	else if ($_POST['stat']=="int5")
	{
		if ($_SESSION['points']>=1)
		{
		$sql = <<<SQL
    UPDATE accounts
    SET intellect = intellect + 5, UsedSkillpoints = UsedSkillpoints + 5 
    WHERE Nazwa = '$username'
SQL;
if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
	}
	
	}
}
	$connection->close();
	}
	

	
}
function dbexpgain()
{
	include "connect.php";
		$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
			if($connection->connect_errno > 0)
			{
				die('Error while connecting to Database. [' . $connection->connect_error . ']');
			}
				else
				{
	$connection -> query("SET NAMES 'utf8'");
	$username=$_SESSION['username'];
	$exp=$_SESSION['expreward'];
	$sql = <<<SQL
    UPDATE accounts
    SET EXP = EXP + '$exp'
    WHERE Nazwa = '$username'
SQL;
if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
	
}
$connection->close();
}
function exprequired()
{
	if ($_SESSION['lvl']==1)
	{
		$_SESSION['exprequired']=1;
		$_SESSION['previousexprequired']=0;
	}
	else if ($_SESSION['lvl']>1)
	{
		$actlvl=$_SESSION['lvl'];
		for ($i = 1; $i<=$actlvl; $i++)
		{
			if ($i==1) {$_SESSION['exprequired']=1;}
			else
			{
				$_SESSION['previousexprequired']=$_SESSION['exprequired'];
				$_SESSION['exprequired']=round($_SESSION['exprequired']*1.75);
				
			}
		}
	}
}
function lvlup()
{
	if ($_SESSION['totalexp']>=$_SESSION['exprequired'])
	{
		include "connect.php";
		$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
			if($connection->connect_errno > 0)
			{
				die('Error while connecting to Database. [' . $connection->connect_error . ']');
			}
				else
				{
					$a=1;
					$username=$_SESSION['username'];
		$connection -> query("SET NAMES 'utf8'");
		$sql = <<<SQL
		UPDATE accounts
		SET lvl = lvl + '$a'
		WHERE Nazwa = '$username'
SQL;
if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
		dbbattleinfo();
		exprequired();
		if ($_SESSION['totalexp']>=$_SESSION['exprequired']) {lvlup();}
	}
		$connection->close();
}
}
function playerresources()
{
	$_SESSION['MaxHP']=round(($_SESSION['lvl']*8)+($_SESSION['str']*1.15));
	$_SESSION['MaxMana']=round((55+($_SESSION['lvl']*4)+($_SESSION['int']*2.9)));
	$_SESSION['BaseSpeed']=round(($_SESSION['lvl']*1.5)+($_SESSION['dex']*1.3));
}
function actualresources()
{
	playerresources();
	$_SESSION['OppBaseSpeed']=round(($_SESSION['opplvl']*1.5)+($_SESSION['oppdex']*1.3));
	
	//PLAYER SPEED
	
		if ($_SESSION['InnateQuicknessCounter']>0) {$_SESSION['BaseSpeed']=$_SESSION['BaseSpeed']+$_SESSION['InnateQuicknessEff'];}
		if ($_SESSION['OppParalyzeCounter']>0) {$_SESSION['BaseSpeed']=$_SESSION['BaseSpeed']-$_SESSION['OppParalyzeEff'];}
		if ($_SESSION['OppChillCounter']>0) {$_SESSION['BaseSpeed']=round($_SESSION['BaseSpeed']*0.8);}
		
	
		if ($_SESSION['OppSpiderWebCounter']>0) {$_SESSION['BaseSpeed']=round($_SESSION['BaseSpeed']*0.5);}	
		if ($_SESSION['IronChordCounter']>0) {$_SESSION['BaseSpeed']=round($_SESSION['BaseSpeed']*(1-$_SESSION['IronChordEff']));}
		
		
		if ($_SESSION['OppFreezeCounter']>0) {$_SESSION['BaseSpeed']=0;}
	
	
	//PLAYER SPEED
	
	
	//OPPONENT SPEED
	if ($_SESSION['OppInnateQuicknessCounter']>0) {$_SESSION['OppBaseSpeed']=$_SESSION['OppBaseSpeed']+$_SESSION['OppInnateQuicknessEff'];}
	
	if ($_SESSION['ChillCounter']>0) {$_SESSION['OppBaseSpeed']=round($_SESSION['OppBaseSpeed']*0.8);}
	if ($_SESSION['FreezeCounter']>0) {$_SESSION['OppBaseSpeed']=0;}
	
	if ($_SESSION['OppDefensiveStanceCounter']>0) {$_SESSION['OppBaseSpeed']=1;}
	//OPPONENT SPEED
	
	if (!isset($_SESSION['ActualHP']))
	{
		
    $_SESSION['ActualHP']=$_SESSION['MaxHP'];
	$_SESSION['ActualMana']=$_SESSION['MaxMana'];
	$_SESSION['ActualOppHP']=$_SESSION['OppMaxHP'];
	$_SESSION['ActualOppMana']=$_SESSION['OppMaxMana'];
	}
}
function ResultCheck()
{
	if ($_SESSION['ActualHP']<=0) {header ("location: lose.php"); exit();}
	if ($_SESSION['ActualOppHP']<=0) {dbexpgain(); header ("location: win.php");exit();}
}
function OpponentCheck()
{
	if (!isset($_SESSION['opponent']))
	{	$_SESSION['opponent']=$_POST['opponent'];	}
	
	if ($_SESSION['opponent']=="Green slime")
	{
		GreenSlime();
	}
	else if ($_SESSION['opponent']=="Beetle")
	{
		Beetle();
	}
	else if ($_SESSION['opponent']=="Spider")
	{
		ForestSpider();
	}
	else if ($_SESSION['opponent']=="Wasp")
	{
		Wasp();
	}
	
}
function battle()
{
		if (isset($_POST['skill']))
		{
		if ($_SESSION['BaseSpeed']>$_SESSION['OppBaseSpeed'])
		{
			$_SESSION['move']=1;
			skilltrigger();
			ResultCheck();
			OppSkillTrigger();
			ResultCheck();
			
		}else if ($_SESSION['BaseSpeed']<$_SESSION['OppBaseSpeed'])
		{
			$_SESSION['move']=2;
			OppSkillTrigger();
			ResultCheck();
			skilltrigger();
			ResultCheck();
		}
		else if ($_SESSION['BaseSpeed']==$_SESSION['OppBaseSpeed'])
		{
			$_SESSION['move']=rand(1,2);
			if ($_SESSION['move']==1)
			{
			skilltrigger();
			ResultCheck();
			OppSkillTrigger();
			ResultCheck();
			}
			else if ($_SESSION['move']==2)
			{
			OppSkillTrigger();
			ResultCheck();
			skilltrigger();
			ResultCheck();
			}
			
		}
		}
	
}
function BuffImages()
{
	if($_SESSION['OppBurnCounter']>0){echo '<img src="Grafika/Burn.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['OppShockCounter']>0){echo '<img src="Grafika/Shock.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['OppChillCounter']>0){echo '<img src="Grafika/Chill.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['OppFreezeCounter']>0){echo '<img src="Grafika/Freeze.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['OppPoisonCounter']>0){echo '<img src="Grafika/Poison.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['SwordAuraCounter']>0){echo '<img src="Grafika/SwordAura.jpg" style="border:2px solid darkgreen;"> ';}
	if($_SESSION['EnchantedBladeCounter']>0){echo '<img src="Grafika/EnchantedBlade.jpg" style="border:2px solid darkgreen;"> ';}
	if($_SESSION['StoneSkinCounter']>0){echo '<img src="Grafika/StoneSkin.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['EnchantedArmourCounter']>0){echo '<img src="Grafika/EnchantedArmour.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['EmpoweredStormCounter']>0){echo '<img src="Grafika/EmpoweredStorm.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['InnateQuicknessCounter']>0){echo '<img src="Grafika/InnateQuickness.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['IronChordCounter']>0){echo '<img src="Grafika/IronChord.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['OppSpiderWebCounter']>0){echo '<img src="Grafika/SpiderWeb.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['OppParalyzeCounter']>0){echo '<img src="Grafika/Paralyze.jpg" style="border:2px solid darkred;"> ' ;}
}
function OppBuffImages()
{
	if($_SESSION['BurnCounter']>0){echo '<img src="Grafika/Burn.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['ShockCounter']>0){echo '<img src="Grafika/Shock.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['ChillCounter']>0){echo '<img src="Grafika/Chill.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['FreezeCounter']>0){echo '<img src="Grafika/Freeze.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['PoisonCounter']>0){echo '<img src="Grafika/Poison.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['OppStoneSkinCounter']>0){echo '<img src="Grafika/StoneSkin.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['OppSoftBodyCounter']>0){echo '<img src="Grafika/SoftBody.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['OppChitinCoatingCounter']>0){echo '<img src="Grafika/ChitinCoating.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['OppDefensiveStanceCounter']>0){echo '<img src="Grafika/DefensiveStance.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['ArmorBreakCounter']>0){echo '<img src="Grafika/ArmorBreak.jpg" style="border:2px solid darkgreen;"> ' ;}
	if($_SESSION['OppVileToxinCounter']>0){echo '<img src="Grafika/VileToxin.jpg" style="border:2px solid darkred;"> ' ;}
	if($_SESSION['OppInnateQuicknessCounter']>0){echo '<img src="Grafika/InnateQuickness.jpg" style="border:2px solid darkred;"> ' ;}
}

function BattleLogs()
{
	$PlayerLog=""; $PlayerDmgLog="";
	$OpponentLog=""; $OppDmgLog="";
	if ($_SESSION['BaseSpeed']>0)
	{
	
	if ($_SESSION['nomana']==0)
	{
		
	if ((isset($_POST['skill']))&&($_POST['skill']!="BasicAttack"))
	{
		$PlayerLog=$_SESSION['Name']." has used ".$_POST['skill'];
		$PlayerDmgLog=" and dealt ".$_SESSION['dmg']." ".$_SESSION['damagetype']." damage";
	}
	else if ((isset($_POST['skill']))&&($_POST['skill']=="Basic attack"))
	{
		$PlayerLog=$_SESSION['Name']." performed a basic attack";
		$PlayerDmgLog=" and dealt ".$_SESSION['dmg']." ".$_SESSION['damagetype']." damage";
	}
	}
	else if ($_SESSION['nomana']==1)
	{
		$PlayerLog="Out of mana! You performed a basic attack";
		 $PlayerDmgLog=" and dealt ".$_SESSION['dmg']." ".$_SESSION['damagetype']." damage";
		
	}
	} else {$PlayerLog=$_SESSION['Name']." couldn't move!";}
	if ($_SESSION['OppBaseSpeed']>0)
	{
	if (isset($_POST['skill']))
	{
			if($_SESSION['oppskill']=="Basic attack") {$OpponentLog=$_SESSION['oppname']." performed a basic attack";}
			else if ($_SESSION['oppskill']!="Basic attack")
			{
				$OpponentLog=$_SESSION['oppname']." has used ".$_SESSION['oppskill'];
			}
			$OppDmgLog=" and dealt ".$_SESSION['oppdmg']." ".$_SESSION['oppdamagetype']." damage";
		} 
		
	} else {$OpponentLog=$_SESSION['oppname']." couldn't move!";}
		
	
		if ($_SESSION['PlayerAttackSkill']==1) {$FinalPlayerLog='<p style="font-size:30px; color:blue;">'.$PlayerLog.$PlayerDmgLog.'</p>';} else if ($_SESSION['PlayerAttackSkill']==0) {$FinalPlayerLog='<p style="font-size:30px; color:blue;">'.$PlayerLog.'</p>';}
		if ($_SESSION['OppAttackSkill']==1) {$FinalOppLog='<p style="font-size:30px; color:red;">'.$OpponentLog.$OppDmgLog.'</p>';} else if ($_SESSION['OppAttackSkill']==0) {$FinalOppLog='<p style="font-size:30px; color:red;">'.$OpponentLog.'</p>';}

		
		//if ($_SESSION['BaseSpeed']>$_SESSION['OppBaseSpeed']) {echo $FinalPlayerLog.$FinalOppLog;}
		//else if ($_SESSION['BaseSpeed']<$_SESSION['OppBaseSpeed']) {echo $FinalOppLog.$FinalPlayerLog;}
		
		if ($_SESSION['move']==1) {echo $FinalPlayerLog.$FinalOppLog;}
		else if ($_SESSION['move']==2) {echo $FinalOppLog.$FinalPlayerLog;}
}
function LoginCheck()
{
	if (!isset($_SESSION['loggedin'])) {@session_destroy(); header("location: index.php");}

}
function StatSet()
{
	$_SESSION['OppChitinCoatingCounter']=0;
	$_SESSION['StoneSkinCounter']=0;
	$_SESSION['SwordAuraCounter']=0;
	$_SESSION['EnchantedBladeCounter']=0;
	$_SESSION['EnchantedArmourCounter']=0;
	$_SESSION['OppPoisonCounter']=0;
	$_SESSION['OppInnateQuicknessCounter']=0;
	$_SESSION['OppVileToxinCounter']=0;
	$_SESSION['OppStoneSkinCounter']=0;
	$_SESSION['OppSoftBodyCounter']=0;
	$_SESSION['OppDefensiveStanceCounter']=0;
	$_SESSION['EmpoweredStormCounter']=0;
	$_SESSION['BurnCounter']=0;
	$_SESSION['InnateQuicknessCounter']=0;
	$_SESSION['ArmorBreakCounter']=0;
	$_SESSION['ManaFlowAuraCounter']=0;
	$_SESSION['OppSpiderWebCounter']=0;
	$_SESSION['OppSoftBodyEff']=0;
	$_SESSION['IronChordCounter']=0;
	$_SESSION['OppParalyzeCounter']=0;
	$_SESSION['FreezeCounter']=0;
	$_SESSION['OppEnchantedArmourEff']=0;
	$_SESSION['OppEnchantedArmourCounter']=0;
	$_SESSION['PoisonCounter']=0;
	$_SESSION['ChillCounter']=0;
	$_SESSION['ShockCounter']=0;
	$_SESSION['OppFreezeCounter']=0;
	$_SESSION['OppBurnCounter']=0;
	$_SESSION['OppChillCounter']=0;
	$_SESSION['OppShockCounter']=0;
	$_SESSION['OppManaCost']=0;
	$_SESSION['ManaCost']=0;
	$_SESSION['speedbonus']=0;
	$_SESSION['move']=0;
	$_SESSION['nomana']=0;
	$_SESSION['dmg']=0;
	$_SESSION['oppdmg']=0;
	$_SESSION['oppdmgtype']=0;
	$_SESSION['PlayerAttackSkill']=0;
	$_SESSION['OppAttackSkill']=0;
}
function StatReset()
{
	unset($_POST['skill'],$_SESSION['dmg'],$_SESSION['ActualHP'],$_SESSION['ActualOppHP'],$_SESSION['oppdmg'],$_SESSION['nomana'],$_SESSION['move'],$_SESSION['opponent'],$_SESSION['OppSoftBodyCounter'],$_SESSION['OppDefensiveStanceCounter'], $_SESSION['OppChitinCoatingCounter'],
$_SESSION['StoneSkinCounter'],$_SESSION['SwordAuraCounter'],$_SESSION['EnchantedBladeCounter'],$_SESSION['EnchantedArmourCounter'],$_SESSION['ActualMana'],$_POST['opponent'],$_SESSION['OppPoisonCounter'],$_SESSION['OppInnateQuicknessCounter'], $_SESSION['OppVileToxinCounter'],
$_SESSION['ActualOppMana'],$_SESSION['turn'],$_SESSION['oppskill'],$_SESSION['OppStoneSkinCounter'],$_SESSION['EmpoweredStormCounter'],$_SESSION['BurnCounter'],$_SESSION['InnateQuicknessCounter'],$_SESSION['ArmorBreakCounter'],$_SESSION['ManaFlowAuraCounter'],$_SESSION['OppSpiderWebCounter'],
$_SESSION['IronChordCounter'],$_SESSION['OppParalyzeCounter'],$_SESSION['FreezeCounter'],$_SESSION['PoisonCounter'],$_SESSION['ChillCounter'],$_SESSION['ShockCounter']
,$_SESSION['OppFreezeCounter'],$_SESSION['OppBurnCounter'],$_SESSION['OppChillCounter'],$_SESSION['OppShockCounter']);
}
	?>