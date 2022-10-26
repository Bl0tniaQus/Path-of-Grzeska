<?php
	function OppSkillTrigger()
	{
		OppBuffCheck();
		if ($_SESSION['OppBaseSpeed']>0)
		{
		if ($_SESSION['oppskill']=="Basic attack") {OppBasicAttack();}
		else if ($_SESSION['oppskill']=="Stone skin") {OppStoneSkin();}
		else if ($_SESSION['oppskill']=="Soft body") {OppSoftBody();}
		else if ($_SESSION['oppskill']=="Body slam") {OppBodySlam();}
		else if ($_SESSION['oppskill']=="Bug bite") {OppBugBite();}
		else if ($_SESSION['oppskill']=="Chitin coating") {OppChitinCoating();}
		else if ($_SESSION['oppskill']=="Defensive stance") {OppDefensiveStance();}
		else if ($_SESSION['oppskill']=="Vile toxin") {OppVileToxin();}
		else if ($_SESSION['oppskill']=="Innate quickness") {OppInnateQuickness();}
		else if ($_SESSION['oppskill']=="Spider web") {OppSpiderWeb();}
		else if ($_SESSION['oppskill']=="Paralyzing jab") {OppParalyzingJab();}
		}
		OppBuffExpire();
	}

	
	function OppDmg($min,$max)
	{
		include "playerresistances.php";
		$speedbonus=0;
		//SPEEDBONUS
	if ($_SESSION['OppBaseSpeed']>$_SESSION['BaseSpeed'])
			{$speedbonus=2-round($_SESSION['BaseSpeed']/$_SESSION['OppBaseSpeed'], 2);}
	//SPEEDBONUS
	
	//PHYSICAL DAMAGE
	if ($_SESSION['oppdamagetype']=="physical")
		
		{
			$_SESSION['oppdmg']=rand($min,$max);
				
				if ($speedbonus!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*$speedbonus);}
				if ($_SESSION['OppShockCounter']!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*1.15);}

				$_SESSION['oppdmg']-=$_SESSION['OppEnchantedArmourEff'];
				
				$_SESSION['oppdmg']=round($_SESSION['oppdmg']*(1-$physred));
		}
	//PHYSICAL DAMAGE
		
	//FIRE DAMAGE
	if ($_SESSION['oppdamagetype']=="fire")
		
		{
			$_SESSION['oppdmg']=rand($min,$max);
			
				
				if ($speedbonus!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*$speedbonus);}
				if ($_SESSION['OppShockCounter']!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*1.15);}
				
				
				$_SESSION['oppdmg']=round($_SESSION['oppdmg']*(1-$firered));
				
				$burn = rand(1,100);
				if (($burn>=1)&&($burn<=15))
					{
						$_SESSION['OppBurnCounter']=4;
						$_SESSION['OppBurnDamage']=round(($_SESSION['oppstr']/7500)*$_SESSION['MaxHP']);
					}
		}
	//FIRE DAMAGE	
		
	//COLD DAMAGE
		if ($_SESSION['oppdamagetype']=="cold")
		
		{
			$_SESSION['oppdmg']=rand($min,$max);
			
				
				if ($speedbonus!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*$speedbonus);}
				if ($_SESSION['OppShockCounter']!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*1.15);}
				
				
				$_SESSION['oppdmg']=round($_SESSION['oppdmg']*(1-$coldred));
				
				$freeze = rand(1,10);
				if ($freeze==1)
					{
						$_SESSION['OppFreezeCounter']=2;
					}
				if ($freeze!=1) { $chill = rand(1,10); if (($chill==1)||($chill==2)) {$_SESSION['OppChillCounter']=3;}  }
		}
	//COLD DAMAGE	
	
	//LIGHTNING DAMAGE
		if ($_SESSION['oppdamagetype']=="lightning")
		
		{
			$_SESSION['oppdmg']=rand($min,$max);
			
				
				if ($speedbonus!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*$speedbonus);}
				if ($_SESSION['OppShockCounter']!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*1.15);}
				
				
				$_SESSION['oppdmg']=round($_SESSION['oppdmg']*(1-$lightningred));
				
				$shock = rand(1,10);
				if ($shock==1)
					{
						$_SESSION['OppShockCounter']=4;
					}
		}
	//LIGHTNING DAMAGE
	
	//CHAOS DAMAGE
		if ($_SESSION['oppdamagetype']=="chaos")
		
		{
			$_SESSION['oppdmg']=rand($min,$max);
			
				
				if ($speedbonus!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*$speedbonus);}
				if ($_SESSION['OppShockCounter']!=0) {$_SESSION['oppdmg']=round($_SESSION['oppdmg']*1.15);}
				
				
				$_SESSION['oppdmg']=round($_SESSION['oppdmg']*(1-$chaosred));
				
				$poison = rand(1,100);
				if (($poison>=1)&&($poison<=15))
					{
						$_SESSION['OppPoisonCounter']=4;
						$_SESSION['OppPoisonDamage']=$_SESSION['opplvl']-1;
					}
		}
	//CHAOS DAMAGE
	
		$_SESSION['ActualHP']=$_SESSION['ActualHP']-$_SESSION['oppdmg']*$_SESSION['opphits'];
	}
	
	function OppBasicAttack()
	{
		
			$min=$_SESSION['dmgmin'];
			$max=$_SESSION['dmgmax'];
			
			$_SESSION['oppdamagetype']="physical";
			if ($_SESSION['oppclass']=="Warrior") {$_SESSION['oppattacktype']="melee";}
			else if ($_SESSION['oppclass']=="Archer") {$_SESSION['oppattacktype']="ranged";}
			else if ($_SESSION['oppclass']=="Mage") {$_SESSION['oppattacktype']="spell";}
			 $_SESSION['opphits']=1;
		OppDmg($min,$max);
		
		$_SESSION['OppAttackSkill']=1;
		
		}
	function OppStoneSkin()
	{
		$_SESSION['OppStoneSkinMultiplier']=0.2;
		$_SESSION['OppStoneSkinCounter']=6;
		$_SESSION['OppManaCost']=50;
		$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
		$_SESSION['OppAttackSkill']=0;
	}
	
	function OppSoftBody()
	{
		$_SESSION['OppSoftBodyEff']=$_SESSION['opplvl']*3;
		$_SESSION['OppSoftBodyCounter']=6;
		$_SESSION['OppManaCost']=20;
		$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
		$_SESSION['OppAttackSkill']=0;		
	}
	function OppBodySlam()
	{
		
			$min=round(1.5*$_SESSION['dmgmin']);
			$max=round(1.5*$_SESSION['dmgmax']);
			
			
			$_SESSION['oppattacktype']="melee";
			$_SESSION['oppdamagetype']="physical";
			$_SESSION['opphits']=1;
			
			$_SESSION['OppManaCost']=5;
			$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
			$_SESSION['OppAttackSkill']=1;
			OppDmg($min,$max);
	}
	function OppBugBite()
	{
		
			$min=$_SESSION['dmgmin'];
			$max=$_SESSION['dmgmax'];
			
			$_SESSION['oppattacktype']="melee";
			$_SESSION['oppdamagetype']="chaos";
			$_SESSION['opphits']=1;
			
		$_SESSION['OppManaCost']=8;
		$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
			OppDmg($min,$max);
			$_SESSION['OppAttackSkill']=1;
	}
	function OppChitinCoating()
	{
		$_SESSION['OppChitinCoatingEff']=round(($_SESSION['oppdex']+$_SESSION['oppint'])/10);
		$_SESSION['OppChitinCoatingCounter']=6;
		$_SESSION['OppManaCost']=15;
		$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
		$_SESSION['OppAttackSkill']=0;
	}
	function OppDefensiveStance()
	{
		$_SESSION['OppDefensiveStanceEff']=0.65;
		$_SESSION['OppDefensiveStanceCounter']=4+round($_SESSION['oppstr']/30);
		$_SESSION['OppManaCost']=15;
		$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
		$_SESSION['OppAttackSkill']=0;
	}
	function OppVileToxin()
	{
		$_SESSION['OppVileToxinCounter']=6;
		$_SESSION['OppManaCost']=50;
		$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
		$_SESSION['OppAttackSkill']=0;
	}
	function OppInnateQuickness()
	{
		$_SESSION['OppInnateQuicknessEff']=round($_SESSION['oppdex']*0.4);
		$_SESSION['OppInnateQuicknessCounter']=4+floor($_SESSION['oppdex']/30);
		$_SESSION['OppManaCost']=50;
		$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
		$_SESSION['OppAttackSkill']=0;
	}
	function OppSpiderWeb()
	{
		
			$min=2;
			$max=5;
			$_SESSION['OppManaCost']=25;
			
			$_SESSION['oppattacktype']="melee";
			$_SESSION['oppdamagetype']="physical";
			$_SESSION['opphits']=1;
			
			$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
			$_SESSION['OppSpiderWebCounter']=5;
			$_SESSION['OppAttackSkill']=1;
			OppDmg($min,$max);
	}
	function OppParalyzingJab()
	{
			$min=round(0.3*$_SESSION['dmgmin']);
			$max=$min;
			
			$_SESSION['oppattacktype']="melee";
			$_SESSION['oppdamagetype']="lightning";
			$_SESSION['opphits']=1;
			
			$_SESSION['OppManaCost']=100;
			$_SESSION['ActualOppMana']=$_SESSION['ActualOppMana']-$_SESSION['OppManaCost'];
			
			
			$_SESSION['OppParalyzeCounter']=1+floor($_SESSION['oppdex']/50);
			$_SESSION['OppParalyzeEff']=round(1.3*$_SESSION['oppdex']);
			$_SESSION['OppAttackSkill']=1;
			OppDmg($min,$max);
	}
	function OppBuffCheck()
	{
		include "playerresistances.php";
		if ($_SESSION['OppPoisonCounter']>0) 
		{
			if ($_SESSION['OppVileToxinCounter']>0) {$_SESSION['OppPoisonDamage']=round($_SESSION['OppPoisonDamage']*1.2);}
			$_SESSION['OppPoisonDamage']=$_SESSION['OppPoisonDamage']*(1-$chaosred);
			$_SESSION['ActualHP']=$_SESSION['ActualHP']-$_SESSION['OppPoisonDamage'];
		}
		if ($_SESSION['OppBurnCounter']>0) 
		{
			$_SESSION['OppBurnDamage']=$_SESSION['OppBurnDamage']*(1-$chaosred);
			$_SESSION['ActualHP']=$_SESSION['ActualHP']-$_SESSION['OppBurnDamage'];
			}
		
		if ($_SESSION['OppStoneSkinCounter']==0) {$_SESSION['OppStoneSkinMultiplier']=0;}
		if ($_SESSION['OppSoftBodyCounter']==0) {$_SESSION['OppSoftBodyEff']=0;}
		if ($_SESSION['OppPoisonCounter']==0) {$_SESSION['OppPoisonDmg']=0;}
		if ($_SESSION['OppChitinCoatingCounter']==0) {$_SESSION['OppChitinCoatingEff']=0;}
		if ($_SESSION['OppDefensiveStanceCounter']==0) {$_SESSION['OppDefensiveStanceEff']=0;}
		if ($_SESSION['OppInnateQuicknessCounter']==0) {$_SESSION['OppInnateQuicknessEff']=0;}
	}
	function OppBuffExpire()
	{
		if ($_SESSION['OppStoneSkinCounter']!=0) {$_SESSION['OppStoneSkinCounter']--;}
		if ($_SESSION['OppSoftBodyCounter']!=0) {$_SESSION['OppSoftBodyCounter']--;}
		if ($_SESSION['OppChitinCoatingCounter']!=0) {$_SESSION['OppChitinCoatingCounter']--;}
		if ($_SESSION['OppDefensiveStanceCounter']!=0) {$_SESSION['OppDefensiveStanceCounter']--;}
		if ($_SESSION['OppInnateQuicknessCounter']!=0) {$_SESSION['OppInnateQuicknessCounter']--;}
		if ($_SESSION['OppSpiderWebCounter']!=0) {$_SESSION['OppSpiderWebCounter']--;}
		if ($_SESSION['OppParalyzeCounter']!=0) {$_SESSION['OppParalyzeCounter']--;}
		if ($_SESSION['OppVileToxinCounter']!=0) {$_SESSION['OppVileToxinCounter']--;}
		if ($_SESSION['OppShockCounter']>0) {$_SESSION['OppShockCounter']--;}
		if ($_SESSION['OppChillCounter']>0) {$_SESSION['OppChillCounter']--;}
		if ($_SESSION['OppFreezeCounter']>0) {$_SESSION['OppFreezeCounter']--;}
		if ($_SESSION['OppPoisonCounter']>0) {$_SESSION['OppPoisonCounter']--;}
		if ($_SESSION['OppBurnCounter']>0) {$_SESSION['OppBurnCounter']--;}
	}
?>