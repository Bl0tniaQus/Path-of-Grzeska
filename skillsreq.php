<?php
function SkillSet()
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
	$id=$_SESSION['id'];
	$query="SELECT * FROM skills WHERE id = '$id'";
		if(!$result = $connection->query($query))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
while($row = $result->fetch_assoc())
	{
			$_SESSION['AuraOfTheSwordSkill']=$row['AuraOfTheSword'];
			$_SESSION['StoneSkinSkill']=$row['StoneSkin'];
			$_SESSION['ThreeSidedSlashSkill']=$row['ThreeSidedSlash'];
			$_SESSION['EnchantedArmourSkill']=$row['EnchantedArmour'];
			$_SESSION['EnchantedBladeSkill']=$row['EnchantedBlade'];
			$_SESSION['PiercingArrowSkill']=$row['PiercingArrow'];
			$_SESSION['IronChordSkill']=$row['IronChord'];
			$_SESSION['InnateQuicknessSkill']=$row['InnateQuickness'];
			$_SESSION['BurningArrowSkill']=$row['BurningArrow'];
			$_SESSION['ThunderclapSkill']=$row['Thunderclap'];
			$_SESSION['EmpoweredStormSkill']=$row['EmpoweredStorm'];
			$_SESSION['FireballSkill']=$row['Fireball'];                
			$_SESSION['DoubleShotSkill']=$row['DoubleShot'];                
			$_SESSION['HeavyStrikeSkill']=$row['HeavyStrike'];                            
			$_SESSION['FrostboltSkill']=$row['Frostbolt'];                            
			$_SESSION['ViperStrikeSkill']=$row['ViperStrike'];
			$_SESSION['QuickShotSkill']=$row['QuickShot'];                                                     
	}
}
}
function SkillInsert()
{
	
	if ((isset($_POST['skillset1']))&&(isset($_POST['skillset2']))&&(isset($_POST['skillset3']))&&(isset($_POST['skillset4']))&&(isset($_POST['skillset5']))&&(isset($_POST['skillset6'])))
	{
		$setskill1=$_POST['skillset1'];
		$setskill2=$_POST['skillset2'];
		$setskill3=$_POST['skillset3'];
		$setskill4=$_POST['skillset4'];
		$setskill5=$_POST['skillset5'];
		$setskill6=$_POST['skillset6'];
		$username=$_SESSION['id'];
		
		include "connect.php";
	$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
			if($connection->connect_errno > 0)
			{
				die('Error while connecting to Database. [' . $connection->connect_error . ']');
			}
				else
				{
	$connection -> query("SET NAMES 'utf8'");
	$id=$_SESSION['id'];
	$query="UPDATE accounts SET  skill1='$setskill1', skill2='$setskill2', skill3='$setskill3', skill4='$setskill4', skill5='$setskill5', skill6='$setskill6' WHERE id = '$id'";
		if(!$result = $connection->query($query))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
		
	}
	
}
}
function SkillQuery($s)
{
	include "connect.php";
		$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
			if($connection->connect_errno > 0)
			{
				die('Error while connecting to Database. [' . $connection->connect_error . ']');
			}
		$connection -> query("SET NAMES 'utf8'");
	$id=$_SESSION['id'];
	
		$sql = <<<SQL
		UPDATE skills
		SET $s = 1
		WHERE id = '$id'
SQL;

		if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
	
	$connection->close();
	
}
function SkillRequirements()
{
	
	
	
	if ($_SESSION['Class']=="Archer")
	{
		
		if ($_SESSION['lvl']>=1)
		{
			SkillQuery("DoubleShot");
		}
		if ($_SESSION['lvl']>=3)
		{
			SkillQuery("PiercingArrow");
		}	
		if ($_SESSION['lvl']>=6)
		{
			SkillQuery("InnateQuickness");
		}
		if ($_SESSION['lvl']>=9)
		{
			SkillQuery("IronChord");
		}
		if ($_SESSION['lvl']>=12)
		{
			SkillQuery("BurningArrow");
		}
	}
	if ($_SESSION['Class']=="Warrior")
	{
		
		if ($_SESSION['lvl']>=1)
		{
			SkillQuery("HeavyStrike");

		}
		if ($_SESSION['lvl']>=3)
		{
			SkillQuery("StoneSkin");
		}
		if ($_SESSION['lvl']>=6)
		{
			SkillQuery("ThreeSidedSlash");
		}
		if ($_SESSION['lvl']>=9)
		{
			SkillQuery("EnchantedBlade");
		}
		if ($_SESSION['lvl']>=12)
		{
			SkillQuery("ViperStrike");
		}
	}
	if ($_SESSION['Class']=="Mage")
	{
		
		if ($_SESSION['lvl']>=1)
		{
			SkillQuery("Thunderclap");

		}
		if ($_SESSION['lvl']>=3)
		{
			SkillQuery("Frostbolt");
		}
		if ($_SESSION['lvl']>=6)
		{
			SkillQuery("Fireball");
		}
		if ($_SESSION['lvl']>=9)
		{
			SkillQuery("EnchantedArmour");
		}
		if ($_SESSION['lvl']>=12)
		{
			SkillQuery("EmpoweredStorm");
		}
	}

	
	
}

?>