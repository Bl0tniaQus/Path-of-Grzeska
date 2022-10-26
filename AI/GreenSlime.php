<?php
	function trigger($a)
	{
		$_SESSION['oppskill']=$_SESSION['oppskill'."$a"];
	}
	function AI()
	{
	$action=rand(0,2);
	
	if ($action==0)	{trigger($action);}
	if ($action==1) 
	{
		
		if (($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost'])&&($_SESSION['OppSoftBodyCounter']==0))
		{
			trigger($action);
		}
		else {AI();}
	}
	if ($action==2)
	{
		
		if ($_SESSION['ActualOppMana']>=$_SESSION['OppManaCost']) { trigger(2); }
		else {AI($action);}
	
	}
	}
	AI();
?>