<?php
function trigger($a)
{
	$_SESSION['oppskill']=$_SESSION['oppskill'."$a"];
}
function base()
{
		$action=rand(0,3);
		if ($action==0) { trigger($action); }
		if ($action==1) { if ($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost']) {trigger($action);} else {AI();}} 
		if ($action==2) { if (($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost'])&&($_SESSION['OppChitinCoatingCounter']==0)) {trigger($action);} else {AI();}} 
		if ($action==3) { if (($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost'])&&($_SESSION['OppDefensiveStanceCounter']==0)) {trigger($action);} else {AI();}}
}
function AI()
{
	if (($_SESSION['OppChitinCoatingCounter']==0)&&($_SESSION['OppDefensiveStanceCounter']==0))
	{
		$action=rand(2,3);
		if ($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost']) { trigger($action); }
		else 
		{
			base();
		}
	}
	else
	{
		base();
	}
	
	
}
AI();
?>