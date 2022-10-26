<?php

	if (($_SESSION['OppStoneSkinCounter']==0)&&($_SESSION['ActualOppMana']>=50))
	{
		$_SESSION['oppskill']=$GLOBALS[2];
	}
	else if (($_SESSION['OppStoneSkinCounter']>0)&&($_SESSION['ActualOppMana']-($_SESSION['OppMaxMana']*0.3)>=50))
	{
		$_SESSION['oppskill']=$GLOBALS[1];
	}
	else
	{
		$_SESSION['oppskill']=$GLOBALS[0];
	}

?>