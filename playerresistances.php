<?php
	$physred=0;
	$firered=0;
	$coldred=0;
	$lightningred=0;
	$chaosred=0;
	
	
	if ($_SESSION['StoneSkinCounter']!=0) {$physred+=0.2;}
	
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