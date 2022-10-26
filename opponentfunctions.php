<?php
function OpponentInfo($dungeon)
{
	include "connect.php";
	$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
			if($connection->connect_errno > 0)
			{
				die('Error while connecting to Database. [' . $connection->connect_error . ']');
			}
				else
				{
	$connection -> query("SET NAMES 'utf8'");
	$id=$_SESSION['id'];
	
	
		$query="SELECT * FROM opponents WHERE id = '$id'";
		if(!$result = $connection->query($query))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
		while($row = $result->fetch_assoc())
		{
			$_SESSION['GreenSlimeOpp']=$row["Opp1"];
			$_SESSION['BeetleOpp']=$row["Opp2"];
			$_SESSION['ForestSpiderOpp']=$row["Opp3"];
			$_SESSION['WaspOpp']=$row["Opp4"];	 			
		}
	}
	$connection->close();
}

function UnlockOpponent()
{
	include "connect.php";
	$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
			if($connection->connect_errno > 0)
			{
				die('Error while connecting to Database. [' . $connection->connect_error . ']');
			}
				else
				{
	$connection -> query("SET NAMES 'utf8'");
	$id=$_SESSION['id'];
	
	$oppid=$_SESSION['oppid'];
	
	$oppid++;
	
		$query="UPDATE opponents SET Opp$oppid = 1 WHERE id = '$id'";
		if(!$result = $connection->query($query))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}	
	}
	
	$connection->close();
}


?>