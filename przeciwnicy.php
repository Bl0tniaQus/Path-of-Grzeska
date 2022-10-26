<?php
{
	function GreenSlime()
	{
		
		$_SESSION['OppMaxHP']=24;
		$_SESSION['OppMaxMana']=25;
		$_SESSION['oppclass']="Warrior";
		$_SESSION['opplvl']=1;
		$_SESSION['dmgmin']=2;
		$_SESSION['dmgmax']=4;
		$_SESSION['oppstr']=12;
		$_SESSION['oppdex']=8;
		$_SESSION['oppint']=1;
		$_SESSION['oppphysred']=0;
		$_SESSION['oppfirered']=0;
		$_SESSION['oppcoldred']=0;
		$_SESSION['opplightningred']=0;
		$_SESSION['oppchaosred']=0.3;
		$_SESSION['oppname']="Green slime";
		$_SESSION['oppid']=1;
		$_SESSION['expreward']=2;
		$_SESSION['oppskill0']="Basic attack";
		$_SESSION['oppskill1']="Soft body";
		$_SESSION['oppskill2']="Body slam";
		$_SESSION['AI']="GreenSlime.php";
	}
	
	
	
	
	function Beetle()
	{
		$_SESSION['OppMaxHP']=100;
		$_SESSION['OppMaxMana']=80;
		$_SESSION['oppclass']="Warrior";
		$_SESSION['opplvl']=3;
		$_SESSION['dmgmin']=4;
		$_SESSION['dmgmax']=10;
		$_SESSION['oppstr']=30;
		$_SESSION['oppdex']=1;
		$_SESSION['oppint']=5;
		$_SESSION['oppphysred']=0;
		$_SESSION['oppfirered']=-0.2;
		$_SESSION['oppcoldred']=0;
		$_SESSION['opplightningred']=0;
		$_SESSION['oppchaosred']=0.3;
		$_SESSION['oppname']="Beetle";
		$_SESSION['oppid']=2;
		$_SESSION['expreward']=20;
		$_SESSION['oppskill0']="Basic attack";
		$_SESSION['oppskill1']="Bug bite";
		$_SESSION['oppskill2']="Chitin coating";
		$_SESSION['oppskill3']="Defensive stance";
		
		$_SESSION['AI']="Beetle.php";
	}
	
	function ForestSpider()
	{
		$_SESSION['OppMaxHP']=260;
		$_SESSION['OppMaxMana']=160;
		$_SESSION['oppclass']="Archer";
		$_SESSION['opplvl']=5;
		$_SESSION['dmgmin']=7;
		$_SESSION['dmgmax']=14;
		$_SESSION['oppstr']=20;
		$_SESSION['oppdex']=60;
		$_SESSION['oppint']=30;
		$_SESSION['oppphysred']=0;
		$_SESSION['oppfirered']=-0.2;
		$_SESSION['oppcoldred']=0;
		$_SESSION['opplightningred']=0;
		$_SESSION['oppchaosred']=0.3;
		$_SESSION['oppname']="Forest spider";
		$_SESSION['oppid']=3;
		$_SESSION['expreward']=50;
		$_SESSION['oppskill0']="Basic attack";
		$_SESSION['oppskill1']="Bug bite";
		$_SESSION['oppskill2']="Spider web";
		$_SESSION['oppskill3']="Vile toxin";
		$_SESSION['oppskill4']="Innate quickness";
		
		$_SESSION['AI']="ForestSpider.php";
		
	}
	
	function Wasp()
	{
		$_SESSION['OppMaxHP']=520;
		$_SESSION['OppMaxMana']=300;
		$_SESSION['oppclass']="Warrior";
		$_SESSION['opplvl']=7;
		$_SESSION['dmgmin']=12;
		$_SESSION['dmgmax']=13;
		$_SESSION['oppstr']=55;
		$_SESSION['oppdex']=65;
		$_SESSION['oppint']=20;
		$_SESSION['oppphysred']=0;
		$_SESSION['oppfirered']=-0.2;
		$_SESSION['oppcoldred']=0;
		$_SESSION['opplightningred']=0;
		$_SESSION['oppchaosred']=0.3;
		$_SESSION['oppname']="Wasp";
		$_SESSION['oppid']=4;
		$_SESSION['expreward']=100;
		$_SESSION['oppskill0']="Basic attack";
		$_SESSION['oppskill1']="Bug bite";
		$_SESSION['oppskill2']="Chitin coating";
		$_SESSION['oppskill3']="Vile toxin";
		$_SESSION['oppskill4']="Innate quickness";
		$_SESSION['oppskill5']="Paralyzing jab";
		
		$_SESSION['AI']="Wasp.php";
		
	}
}
?>