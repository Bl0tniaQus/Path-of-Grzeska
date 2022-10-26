<?php
	function forest()
	{
		if (($_SESSION['GreenSlimeOpp']==1)&&($_SESSION['BeetleOpp']==0))
		{
			echo '<option value="Green slime" selected="selected">1. Green slime</option>';
		}
		else if (($_SESSION['GreenSlimeOpp']==1)&&($_SESSION['BeetleOpp']==1))
		{
			echo '<option value="Green slime">1. Green slime</option>';
		}
		
		if (($_SESSION['BeetleOpp']==1)&&($_SESSION['ForestSpiderOpp']==0))
		{
			echo '<option value="Beetle" selected="selected">2. Beetle</option>';
		}
		else if (($_SESSION['BeetleOpp']==1)&&($_SESSION['ForestSpiderOpp']==1))
		{
			echo '<option value="Beetle">2. Beetle</option>';
		}
		
		if (($_SESSION['ForestSpiderOpp']==1)&&($_SESSION['WaspOpp']==0))
		{
			echo '<option value="Spider" selected="selected">3. Forest Spider</option>';
		}
		else if (($_SESSION['ForestSpiderOpp']==1)&&($_SESSION['WaspOpp']==1))
		{
			echo '<option value="Spider">3. Spider</option>';
		}
		
		if ($_SESSION['WaspOpp']==1)
		{
			echo '<option value="Wasp" selected="selected">4. Wasp</option>';
		}
		//else if (($_SESSION['WaspOpp']==1)&&($_SESSION['WaspOpp']==1))
		//{
		//	echo '<option value=" wasp">4.  wasp</option>';
		//}
		
	}
?>