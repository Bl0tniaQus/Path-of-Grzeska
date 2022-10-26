<?php
function SekillSelectOption($a,$skillnumber)
{
	if ($_SESSION['skill'."$skillnumber"]==$a)
		{
			echo '<option value="'.$a.'" selected="selected">'.$a.'</option>';
		}
		else
		{
			echo '<option value="'.$a.'">'.$a.'</option>';
		}
}
function SkillSelect($skillnumber)
{
		if ($_SESSION['skill'."$skillnumber"]=='None')
		{
			echo '<option value="None" selected="selected">None</option>';
		}
		else
		{
			echo '<option value="None">None</option>';
		}
	
	if ($_SESSION['AuraOfTheSwordSkill']==1)
	{
		SekillSelectOption("Aura of the sword",$skillnumber);
	}
	if ($_SESSION['StoneSkinSkill']==1)
	{
		SekillSelectOption("Stone skin",$skillnumber);
	}
	if ($_SESSION['ThreeSidedSlashSkill']==1)
	{
		SekillSelectOption("Three-sided slash",$skillnumber);
	}
	if ($_SESSION['EnchantedArmourSkill']==1)
	{
		SekillSelectOption("Enchanted armour",$skillnumber);
	}
	if ($_SESSION['EnchantedBladeSkill']==1)
	{
		SekillSelectOption("Enchanted blade",$skillnumber);
	}
	if ($_SESSION['PiercingArrowSkill']==1)
	{
		SekillSelectOption("Piercing arrow",$skillnumber);
	}
	if ($_SESSION['InnateQuicknessSkill']==1)
	{
		SekillSelectOption("Innate quickness",$skillnumber);
	}
	if ($_SESSION['IronChordSkill']==1)
	{
		SekillSelectOption("Iron chord",$skillnumber);
	}
	if ($_SESSION['BurningArrowSkill']==1)
	{
		SekillSelectOption("Burning arrow",$skillnumber);
	}
	if ($_SESSION['FireballSkill']==1)
	{
		SekillSelectOption("Fireball",$skillnumber);
	}
	if ($_SESSION['ThunderclapSkill']==1)
	{
		SekillSelectOption("Thunderclap",$skillnumber);
	}
	if ($_SESSION['EmpoweredStormSkill']==1)
	{
		SekillSelectOption("Empowered storm",$skillnumber);
	}
	if ($_SESSION['DoubleShotSkill']==1)
	{
		SekillSelectOption("Double shot",$skillnumber);
	}
	if ($_SESSION['HeavyStrikeSkill']==1)
	{
		SekillSelectOption("Heavy strike",$skillnumber);
	}
	if ($_SESSION['FrostboltSkill']==1)
	{
		SekillSelectOption("Frostbolt",$skillnumber);
	}
	if ($_SESSION['ViperStrikeSkill']==1)
	{
		SekillSelectOption("Viper strike",$skillnumber);
	}
}
?>