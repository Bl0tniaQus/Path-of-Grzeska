<?php
	function trigger($a)
	{
		$_SESSION['oppskill']=$_SESSION['oppskill'."$a"];
	}
	function base()
	{
		$action=rand(0,5);
			{
				if ($action==0) {trigger($action);}
				if ($action==1) {if ($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost']){trigger($action);}else {AI();}}
				if ($action==2) {if (($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost'])&&($_SESSION['OppChitinCoatingCounter']==0)){trigger($action);}else {AI();}}
				if ($action==3) {if (($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost'])&&($_SESSION['OppVileToxinCounter']==0)){trigger($action);}else {AI();}}
				if ($action==4) {if (($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost'])&&($_SESSION['OppInnateQuicknessCounter']==0)){trigger($action);}else {AI();}}
				if ($action==5) {if ($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost']){trigger($action);}else {AI();}}
			}
	}
	function AI()
	{
		if (($_SESSION['OppInnateQuicknessCounter']==0)&&($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost']))
		{
			$action=4; trigger(4);
			
		}else
		{base();}
	}
	AI();
?>