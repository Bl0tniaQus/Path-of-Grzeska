<?php

function skilltrigger()
{
	BuffCheck();
	if ($_SESSION['BaseSpeed']>0)
	{
	
	if ($_POST['skill']=="Basic attack") 
	{
		BasicAttack();
	}
	else if ($_POST['skill']=="Aura of the sword") {AuraOfTheSword();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Enchanted blade") {EnchantedBlade();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Stone skin") {StoneSkin();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Three-sided slash") {ThreeSidedSlash();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Fireball") {Fireball();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Enchanted armour") {EnchantedArmour();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Thunderclap") {Thunderclap();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Piercing arrow") {PiercingArrow();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Empowered storm") {EmpoweredStorm();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Burning arrow") {BurningArrow();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Innate quickness") {InnateQuickness();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Iron chord") {IronChord();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Double shot") {DoubleShot();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Heavy strike") {HeavyStrike();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Frostbolt") {Frostbolt();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	else if ($_POST['skill']=="Viper strike") {ViperStrike();if($_SESSION['ActualMana']>=$_SESSION['ManaCost']){$_SESSION['nomana']=0; }else {$_SESSION['nomana']=1; BasicAttack();}}
	}
	if ($_SESSION['nomana']==0) {$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];}
	BuffExpire();
	}
function PlayerDmg($min,$max)
{	
	
	//RESISTANCES
	include "resistances.php";
	//RESISTANCES
	$speedbonus=0;
	//SPEEDBONUS
	if ($_SESSION['BaseSpeed']>$_SESSION['OppBaseSpeed'])
			{$speedbonus=2-round($_SESSION['OppBaseSpeed']/$_SESSION['BaseSpeed'], 2);}
	//SPEEDBONUS
	
	//PHYSICAL DAMAGE
	if ($_SESSION['damagetype']=="physical")
		
		{
			
			$_SESSION['dmg']=rand($min,$max);
				if ($_SESSION['attacktype']=="melee"){$_SESSION['dmg']+=$_SESSION['EnchantedBladeEff'];}
				
				if ($speedbonus!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*$speedbonus);}
				if ($_SESSION['ShockCounter']!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*1.15);}
				
				if ($_SESSION['SwordAuraCounter']!=0) {if ($_SESSION['attacktype']=="melee"){$_SESSION['dmg']=round($_SESSION['dmg']*$_SESSION['SwordAuraMultiplier']);}}
		if ($_SESSION['IronChordCounter']!=0) {if ($_SESSION['attacktype']=="ranged") {$_SESSION['dmg']=round($_SESSION['dmg']*$_SESSION['IronChordEff']);}}
				
				
				$_SESSION['dmg']-=$_SESSION['OppSoftBodyEff'];
				$_SESSION['dmg']-=$_SESSION['OppChitinCoatingEff'];
				
				$_SESSION['dmg']=round($_SESSION['dmg']*(1-$physred));
		}
		
	//PHYSICAL DAMAGE

	//FIRE DAMAGE
	if ($_SESSION['damagetype']=="fire")
		
		{
			$_SESSION['dmg']=rand($min,$max);
			
				
				if ($speedbonus!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*$speedbonus);}
				if ($_SESSION['ShockCounter']!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*1.15);}
				
				
				$_SESSION['dmg']=round($_SESSION['dmg']*(1-$firered));
				
				$burn = rand(1,100);
				if (($burn>=1)&&($burn<=15))
					{
						$_SESSION['BurnCounter']=4;
						$_SESSION['BurnDamage']=round(($_SESSION['str']/7500)*$_SESSION['OppMaxHP']);
					}
		}
	//FIRE DAMAGE
	
	//COLD DAMAGE
		if ($_SESSION['damagetype']=="cold")
		
		{
			$_SESSION['dmg']=rand($min,$max);
			
				
				if ($speedbonus!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*$speedbonus);}
				if ($_SESSION['ShockCounter']!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*1.15);}
				
				
				$_SESSION['dmg']=round($_SESSION['dmg']*(1-$coldred));
				
				$freeze = rand(1,10);
				if ($freeze==1)
					{
						$_SESSION['FreezeCounter']=2;
					}
				if ($freeze!=1) { $chill = rand(1,10); if (($chill==1)||($chill==2)) {$_SESSION['ChillCounter']=3;}  }
		}
	//COLD DAMAGE
	
	//LIGHTNING DAMAGE
		if ($_SESSION['damagetype']=="lightning")
		
		{
			$min=$min+$_SESSION['EmpoweredStormEff'];
			
			
			$_SESSION['dmg']=rand($min,$max);
			
				
				if ($speedbonus!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*$speedbonus);}
				if ($_SESSION['ShockCounter']!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*1.15);}
				
				
				$_SESSION['dmg']=round($_SESSION['dmg']*(1-$lightningred));
				
				$shock = rand(1,10);
				if ($shock==1)
					{
						$_SESSION['ShockCounter']=4;
					}
		}
	//LIGHTNING DAMAGE
	
	
	//CHAOS DAMAGE
		if ($_SESSION['damagetype']=="chaos")
		
		{
			$_SESSION['dmg']=rand($min,$max);
			
				
				if ($speedbonus!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*$speedbonus);}
				if ($_SESSION['ShockCounter']!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*1.15);}
				
				
				$_SESSION['dmg']=round($_SESSION['dmg']*(1-$chaosred));
				
				$poison = rand(1,100);
				if (($poison>=1)&&($poison<=15))
					{
						$_SESSION['PoisonCounter']=4;
						$_SESSION['PoisonDamage']=$_SESSION['lvl']-1;
					}
		}
	//CHAOS DAMAGE
	//OVERALL REDUCTION
	if ($_SESSION['OppDefensiveStanceCounter']!=0) {$_SESSION['dmg']=round($_SESSION['dmg']*$_SESSION['OppDefensiveStanceEff']);}
	//OVERALL REDUCTION
	
	//SUB-ZERO DAMAGE
	if ($_SESSION['dmg']<=0) {$_SESSION['dmg']=0;}
	//SUB-ZERO DAMAGE
	
	//HIT POINTS CALCULATION
	$_SESSION['ActualOppHP']=$_SESSION['ActualOppHP']-$_SESSION['dmg']*$_SESSION['hits'];
	//HIT POINTS CALCULATION
}

function BasicAttack()
{
	
	if ($_SESSION['Class']=="Warrior")
		{
			$min=round($_SESSION['str']*0.35);
			$max=round($_SESSION['str']*0.75);
			$_SESSION['attacktype']="melee";
		}
	else if ($_SESSION['Class']=="Mage")
		{
			$min=round($_SESSION['int']*0.45);
			$max=round($_SESSION['int']*0.85);
			$_SESSION['attacktype']="spell";
		}
	else if ($_SESSION['Class']=="Archer")
	{
		$min=round($_SESSION['dex']*0.35);
		$max=round($_SESSION['dex']*0.75);
		$_SESSION['attacktype']="ranged";
	}
	$_SESSION['damagetype']="physical";
	$_SESSION['hits']=1;
	PlayerDmg($min,$max);
	$_SESSION['PlayerAttackSkill']=1;
	
}

function AuraOfTheSword()
{
	$_SESSION['SwordAuraMultiplier']=1.15;
	$_SESSION['SwordAuraCounter']=6;
	$_SESSION['ManaCost']=80;
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=0;
}
function EnchantedBlade()
{
	$_SESSION['EnchantedBladeEff']=round($_SESSION['int']*0.3);
	$_SESSION['EnchantedBladeCounter']=6;
	$_SESSION['ManaCost']=75;
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=0;
}
function StoneSkin()
{
	$_SESSION['StoneSkinMultiplier']=0.2;
	$_SESSION['StoneSkinCounter']=6;
	$_SESSION['ManaCost']=70;
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=0;
}
function ThreeSidedSlash()
{
	$min=round($_SESSION['str']*0.5);
	$max=round($_SESSION['str']*0.7);
	
	$_SESSION['damagetype']="physical";
	$_SESSION['attacktype']="melee";
	$_SESSION['hits']=3;
	$_SESSION['ManaCost']=60;
	PlayerDmg($min,$max);
	
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=1;
}
function Fireball()
{
	$min=round(($_SESSION['int']*0.9)+($_SESSION['str']*0.2));
	$max=round(($_SESSION['int']*1.1)+($_SESSION['str']*0.3));
	
	$_SESSION['damagetype']="fire";
	$_SESSION['attacktype']="spell";
	$_SESSION['hits']=1;
	$_SESSION['ManaCost']=130;
	PlayerDmg($min,$max);
	
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=1;
}
function EnchantedArmour()
{
	$_SESSION['EnchantedArmourEff']=round($_SESSION['lvl']/1.8);
	$_SESSION['EnchantedArmourCounter']=6;
	$_SESSION['ManaCost']=80;
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=0;
}
function Thunderclap()
{
	$min=1;
	$max=round($_SESSION['int']*2.5);
	
	$_SESSION['damagetype']="lightning";
	$_SESSION['attacktype']="spell";
	$_SESSION['hits']=1;
	$_SESSION['ManaCost']=20;
	PlayerDmg($min,$max);
	
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=1;
}
function PiercingArrow()
{
	$min=round($_SESSION['dex']*0.7);
	$max=round($_SESSION['dex']*1);
	
	$_SESSION['damagetype']="physical";
	$_SESSION['attacktype']="ranged";
	$_SESSION['hits']=1;
	$_SESSION['ManaCost']=60;
	PlayerDmg($min, $max);
	
		$i=rand(1,6);
		if ($i==6)
		{
			$_SESSION['ArmorBreakCounter']=4;
		}
	
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=1;	
}
function EmpoweredStorm()
{
	$_SESSION['EmpoweredStormEff']=round($_SESSION['int']*1.2);
	$_SESSION['EmpoweredStormCounter']=6;
	$_SESSION['ManaCost']=150;
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=0;
	
}
function BurningArrow()
{
	$min=round($_SESSION['dex']*0.8);
	$max=round($_SESSION['dex']*1);
	
	$_SESSION['damagetype']="fire";
	$_SESSION['attacktype']="ranged";
	$_SESSION['hits']=1;
	$_SESSION['ManaCost']=10;
	PlayerDmg($min,$max);
	
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=1;
}
function InnateQuickness()
{
	$_SESSION['InnateQuicknessEff']=round($_SESSION['dex']*0.4);
	$_SESSION['InnateQuicknessCounter']=3+floor($_SESSION['dex']/30);
	$_SESSION['ManaCost']=50;
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=0;
}
function IronChord()
{
	$_SESSION['IronChordEff']=1.2;
	$_SESSION['IronChordCounter']=6;
	$_SESSION['ManaCost']=60;
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=0;
}
function DoubleShot()
{
	$min=round($_SESSION['dex']*0.4);
	$max=round($_SESSION['dex']*0.7);
	
	$_SESSION['damagetype']="physical";
	$_SESSION['attacktype']="ranged";
	$_SESSION['hits']=2;
	$_SESSION['ManaCost']=40;
	PlayerDmg($min,$max);
	
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=1;
}
function HeavyStrike()
{
	$min=round($_SESSION['str']*0.8);
	$max=round($_SESSION['str']*1);
	
	
	
	
	$_SESSION['damagetype']="physical";
	$_SESSION['attacktype']="melee";
	$_SESSION['hits']=1;
	$_SESSION['ManaCost']=50;
	PlayerDmg($min,$max);
	$i=rand(1,5);
		if ($i==5)
		{
			$_SESSION['ArmorBreakCounter']=4;
		}
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=1;
}
function Frostbolt()
{
	$min=round($_SESSION['int']*0.9);
	$max=round($_SESSION['int']*0.9);
	
	$_SESSION['damagetype']="cold";
	$_SESSION['attacktype']="spell";
	$_SESSION['hits']=1;
	$_SESSION['ManaCost']=40;
	PlayerDmg($min,$max);
	
	
	$_SESSION['PlayerAttackSkill']=1;
}
function ViperStrike()
{
	$min=round(($_SESSION['str']*0.5)+($_SESSION['int']*0.3)+($_SESSION['dex']*0.3));
	$max=round(($_SESSION['str']*0.8)+($_SESSION['int']*0.8)+($_SESSION['dex']*0.8));
	
	$_SESSION['damagetype']="chaos";
	$_SESSION['attacktype']="melee";
	$_SESSION['hits']=1;
	$_SESSION['ManaCost']=40;
	PlayerDmg($min,$max);
	
	$_SESSION['ActualMana']=$_SESSION['ActualMana']-$_SESSION['ManaCost'];
	$_SESSION['PlayerAttackSkill']=1;
}
function BuffCheck()
{
	include "resistances.php";
	if ($_SESSION['BurnCounter']>0)
		{
		$_SESSION['BurnDamage']=$_SESSION['BurnDamage']*1-$firered;
		$_SESSION['ActualOppHP']=$_SESSION['ActualOppHP']-$_SESSION['BurnDamage'];
		}
	if ($_SESSION['PoisonCounter']>0) 
		{
		$_SESSION['BurnDamage']=$_SESSION['BurnDamage']*1-$chaosred;	
		$_SESSION['ActualOppHP']=$_SESSION['ActualOppHP']-$_SESSION['PoisonDamage'];
		}
	if ($_SESSION['ManaFlowAuraCounter']>0) {$_SESSION['ActualMana']=$_SESSION['ActualMana']+round(0.1*$_SESSION['MaxMana']);  if ($_SESSION['ActualMana']>$_SESSION['MaxMana']){ $_SESSION['ActualMana']=$_SESSION['MaxMana']; }}
	
	
	if ($_SESSION['SwordAuraCounter']==0) {$_SESSION['SwordAuraMultiplier']=0;}
	if ($_SESSION['EnchantedBladeCounter']==0) {$_SESSION['EnchantedBladeEff']=0;}
	if ($_SESSION['StoneSkinCounter']==0) {$_SESSION['StoneSkinCounter']=0;}
	if ($_SESSION['EnchantedArmourCounter']==0) {$_SESSION['EnchantedArmourEff']=0;}
	if ($_SESSION['EmpoweredStormCounter']==0) {$_SESSION['EmpoweredStormEff']=0;}
	if ($_SESSION['BurnCounter']==0) {$_SESSION['BurnDamage']=0;}
	if ($_SESSION['PoisonCounter']==0) {$_SESSION['PoisonDamage']=0;}
	if ($_SESSION['InnateQuicknessCounter']==0) {$_SESSION['InnateQuicknessEff']=0;}
	if ($_SESSION['IronChordCounter']==0) {$_SESSION['IronChordEff']=0;}
	
}
function BuffExpire()
{
	if ($_SESSION['SwordAuraCounter']>0) {$_SESSION['SwordAuraCounter']--;}
	if ($_SESSION['EnchantedBladeCounter']>0) {$_SESSION['EnchantedBladeCounter']--;}
	if ($_SESSION['StoneSkinCounter']>0) {$_SESSION['StoneSkinCounter']--;}
	if ($_SESSION['EnchantedArmourCounter']>0) {$_SESSION['EnchantedArmourCounter']--;}
	if ($_SESSION['EmpoweredStormCounter']>0) {$_SESSION['EmpoweredStormCounter']--;}
	if ($_SESSION['BurnCounter']>0) {$_SESSION['BurnCounter']--;}
	if ($_SESSION['InnateQuicknessCounter']>0) {$_SESSION['InnateQuicknessCounter']--;}
	if ($_SESSION['IronChordCounter']>0) {$_SESSION['IronChordCounter']--;}
	if ($_SESSION['ArmorBreakCounter']>0) {$_SESSION['ArmorBreakCounter']--;}
	if ($_SESSION['ShockCounter']>0) {$_SESSION['ShockCounter']--;}
	if ($_SESSION['ChillCounter']>0) {$_SESSION['ChillCounter']--;}
	if ($_SESSION['FreezeCounter']>0) {$_SESSION['FreezeCounter']--;}
	if ($_SESSION['PoisonCounter']>0) {$_SESSION['PoisonCounter']--;}
}
?>