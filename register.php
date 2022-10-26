<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Path of Grzęska - Register</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="css/fontello.css" rel="stylesheet" type="text/css" /> 
    <script src="jquery-1.11.3.min.js"></script>
</head>
<body style="overflow:hidden;">
<?php
require_once "connect.php";
function errormsg($errormsg)
{
		if ($errormsg!=0)
		{
			if ($errormsg==1)
			{
				echo '<p class="error">Passwords didn\'t match!</p>';
			}
			else if ($errormsg==2)
			{
				echo '<p class="error">Account name is already used!</p>';
			}
			else if ($errormsg==3)
			{
				echo '<p class="error">All fields are required!</p>';
			}
		}
}
echo<<<reg
<div id="regcontainer">
<div id="banner1"></div>
<div id="reg">
<form action="register.php" method="post">
<h1 align="center" style="font-size:65px;"><b>Register</b></h1>
<table border="0" align="center" cellpadding="30">
<tr><td>
<p>Account name:</p>
<input type="text" name="regusername" />
<p>Password:</p>
<input type="password" name="regpassword" />
<p>Repeated password:</p>
<input type="password" name="regpassword2" /><br />
<button type="submit" name="register" value="reg">Register!</button>
<td><p>Character name: </p>
<input type="text" name="imie" />
<p>Wybierz klasę postaci: </p>
<p><img class="regimage" src="Grafika/WarriorIcon.jpg" /><input type="radio" name="class" value="Warrior" /> Warrior
<img class="regimage" src="Grafika/ArcherIcon.jpg" /><input type="radio" name="class" value="Archer" /> Archer
<img class="regimage" src="Grafika/MageIcon.jpg" /><input type="radio" name="class" value="Mage" /> Mage</p>
</td></tr>
</form>
reg;

if (isset($_POST['register']))
{
$regusername=$_POST['regusername'];
$regpassword=$_POST['regpassword'];
$class=$_POST['class'];
$imie=$_POST['imie'];
if ($class=="Archer") {$skill1="DoubleShot"; $skill11="Double shot";}
else if ($class=="Warrior") {$skill1="HeavyStrike"; $skill11="Heavy strike";}
else if ($class=="Mage") {$skill1="Thunderclap"; $skill11="Thunderclap";}
$skill2="None"; $skill3="None"; $skill4="None"; $skill5="None"; $skill6="None";
$exp=0;
$str=5;
$dex=5;
$int=5;
if ($class=="Archer") {$dex=10;}
else if ($class=="Warrior") {$str=10;}
else if ($class=="Mage") {$int=10;}
if (($_POST['regusername']=="")||($_POST['regpassword']=="")||($_POST['regpassword2']=="")||($_POST['class']=="")||($_POST['imie']==""))
{

	$errormsg=3;
	errormsg($errormsg);
} else if (($_POST['regusername']!="")&&($_POST['regpassword']!="")&&($_POST['regpassword2']!="")||($_POST['class']!="")||($_POST['imie']!=""))
	{
		if($_POST['regpassword']==$_POST['regpassword2'])
		{
			$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
			if($connection->connect_errno > 0)
			{
				die('Error with connection to database [' . $connection->connect_error . ']');
			}
			else
	{
	$connection -> query("SET NAMES 'utf8'");
	$sql = <<<SQL
    SELECT Nazwa
    FROM accounts
    WHERE Nazwa = '$regusername'
SQL;
if(!$result = $connection->query($sql))
{
    die('An error occured with SQL query [' . $connection->error . ']');
}
$dbusername="";
while($row = $result->fetch_assoc())
	{
		$dbusername=$row['Nazwa'];
                
	}

			if (($dbusername!=$regusername)||($dbusername==""))
			{
				$insert = "
				INSERT INTO accounts (Nazwa, Hasla, Postać, Klasa, EXP, strength, dexterity, intellect, skill1, skill2, skill3, skill4, skill5, skill6, lvl)
				VALUES ('$regusername', '$regpassword', '$imie', '$class', '$exp', '$str', '$dex', '$int', '$skill11', '$skill2', '$skill3', '$skill4', '$skill5', '$skill6', 1)";
				if(!$result = $connection->query($insert))
{
    die('An error occured with SQL query [' . $connection->error . ']');
}
				
				$insert = "
				INSERT INTO opponents VALUES ()";
				if(!$result = $connection->query($insert))
{
    die('An error occured with SQL query [' . $connection->error . ']');
}
$insert = "
				INSERT INTO skills($skill1) VALUES (1)";
				if(!$result = $connection->query($insert))
{
    die('An error occured with SQL query [' . $connection->error . ']');
}
				
				
	$sql = <<<SQL
    SELECT *
    FROM accounts
    WHERE Nazwa = '$regusername'
SQL;
if(!$result = $connection->query($sql))
{
    die('Wystąpił błąd z zapytaniem SQL [' . $connection->error . ']');
}
	
	while($row = $result->fetch_assoc())
	{
			$id=$row['id'];
             
	}
	$sql = <<<SQL
    UPDATE opponents SET Opp1 = 1 WHERE id = $id;
SQL;
if(!$result = $connection->query($sql))
{
    die('Wystąpił błąd z zapytaniem SQL [' . $connection->error . ']');
}			
				
				
				
		echo '<p style="color:darkgreen; font-size:30px;" align="center">Account has been registered! <a href="index.php">Log in now!</a></p>';	
			}else {$errormsg=2; errormsg($errormsg);}
	
		}
		$connection->close();
		} else {$errormsg=1; errormsg($errormsg);}
	}
}

echo "</td></td></table>";
echo "</div>";
echo '<div id="banner2"></div></div>';

?>

</body>
</html>