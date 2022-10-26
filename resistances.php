<?php
	$physred=$_SESSION['oppphysred'];
	$firered=$_SESSION['oppfirered'];
	$coldred=$_SESSION['oppcoldred'];
	$lightningred=$_SESSION['opplightningred'];
	$chaosred=$_SESSION['oppchaosred'];
	
	
	if ($_SESSION['OppStoneSkinCounter']!=0) {$physred+=0.2;}
	if ($_SESSION['ArmorBreakCounter']!=0) {$physred-=0.2;}
	
	if ($physred<=-0.6) {$physred=-0.6;}
	if ($physred>=0.95) {$physred=0.95;}
	if ($firered<=-0.6) {$firered=-0.6;}
	if ($firered>=0.95) {$firered=0.95;}
	if ($coldred<=-0.6) {$coldred=-0.6;}
	if ($coldred>=0.95) {$coldred=0.95;}
	if ($lightningred<=-0.6) {$lightningred=-0.6;}
	if ($lightningred>=0.95) {$lightningred=0.95;}
	if ($chaosred<=-0.6) {$chaosred=-0.6;}
	if ($chaosred>=0.95) {$chaosred=0.95;}
?>