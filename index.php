<html>

<head>
    <meta charset="UTF-8">
    <title>Path of Grzęska</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 
    <link href="css/fontello.css" rel="stylesheet" type="text/css" /> 
    <script src="jquery-1.11.3.min.js"></script>

    <script>
        $(document).ready(function() {
            var NavY = $('#logowanie').offset().top;

            var stickyNav = function() {
                var ScrollY = $(window).scrollTop();

                if (ScrollY > NavY) {
                    $('#logowanie').addClass('#nielogowanie');
                } else {
                    $('#logowanie').removeClass('#nielogowanie');
                }
            };

            stickyNav();

            $(window).scroll(function() {
                stickyNav();
            });
        });

    </script>

</head>

<body>

    <div id="calastrona">
        <div id="container">
            <script src="wysuwanie.js"></script>
            <div id="social-main"><i class="demo-icon icon-facebook-rect"></i></div>
            <div id="social-hover"><i class="demo-icon icon-facebook-rect"></i></div>
        </div>

        <div id="slider">

            <div class="w3-content w3-display-container">
                <img class="mySlides" src="Grafika/xd.png" style="width:100%">
                <img class="mySlides" src="Grafika/xd2.png" style="width:100%">

                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                <script>
                    var slideIndex = 1;
                    showDivs(slideIndex);

                    function plusDivs(n) {
                        showDivs(slideIndex += n);
                    }

                    function showDivs(n) {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        if (n > x.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = x.length
                        }
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        x[slideIndex - 1].style.display = "block";
                    }

                </script>
            </div>


        </div>
        <div id="logowanie">
           
            <div id="log">

                <?php session_start(); 
				if (isset($_POST['logout']))
					{
						if ($_POST['logout']==true)
						{unset($_SESSION['loggedin']);}
						}
						require_once "connect.php";
						?>
				<?php
		function messg() {echo "Invalid login or password!";}
		
		if (isset($_POST['login']))
		{
		if (($_POST['password']!="")||($_POST['username']!=""))
		{
			$password=$_POST['password'];
			$username=$_POST['username'];
		$connection=@new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
		if($connection->connect_errno > 0)
			{
				die('Error while connecting to database [' . $connection->connect_error . ']');
			}			
		else
{
		$connection -> query("SET NAMES 'utf8'");
	$sql = <<<SQL
    SELECT *
    FROM accounts
    WHERE Nazwa = '$username'
SQL;

if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
$corrusername="";
while($row = $result->fetch_assoc())
	{
		$corrusername=$row['Nazwa'];
		$_SESSION['corrusername']=$corrusername;
	}
		if($corrusername==$username) 
		{
	$sql = <<<SQL
    SELECT Hasla
    FROM accounts
    WHERE Nazwa = '$username'
SQL;

if(!$result = $connection->query($sql))
{
    die('There was an error with SQL query [' . $connection->error . ']');
}
			$corrpassword = "";
				while($row = $result->fetch_assoc())
			{
				$corrpassword=$row['Hasla'];
				$_SESSION['corrpassword']=$corrpassword;
			}
				if (($corrpassword==$password)&&($corrpassword!="")&&($corrusername!=""))
				{
					@session_destroy();
					session_start();
					$_SESSION['username']=$corrusername;
					$_SESSION['loggedin']="true";
				}
				else {messg();}
		} else {messg();}
		$connection->close();
}	
		} else {messg();}
		}
				
				
				
				
				if (!isset($_SESSION['loggedin']))
				{
					echo <<<end
                <form action="index.php" method="post">
                    <h1>Login</h1>
                    <p>Username:</p>
                    <input type="text" name="username" />
                    <p>Password:</p>
                    <input type="password" name="password" /><br /><br />
                    <button type="submit" name="login" value="true">Log in!</button>
                </form>
				<a href="register.php"><button id="reglink"> Register </button></a>
end;
				} else if (isset($_SESSION['loggedin']))
				{
					$echouser=$_SESSION['username'];
					echo <<< end
					<p>Hello, $echouser, you're logged in!</p>
					<form action="menu.php" method="post"><button type="submit" name="tothegame" value="true">Go to the game now!</button></form>
					<form action="index.php" method="post"><button type="submit" name="logout" value="true">Log out</button></form>
end;
				}
				?>
            </div>
            
        </div>
        <div style="clear:both;"></div>
        <div id="opis">
		<p>22-12-2020</p>
		<h1>Beta 1.1</h1>
		Changes:
<ul>
 <li>MAJOR: Added damage types (Physical, Fire, Lightning, Cold and Chaos) and new defence system,</li>
 <li>MAJOR: Added status conditions to their coresponding damage types (including damage over time, slows and "stuns"),</li>
 <li>MAJOR: Domain changed to "pathofgrzeska.cba.pl", </li>
 <li>Added a few new skills, </li>
 <li>Reworked and balanced older skills, </li>
 <li>Changed opponents' names, </li>
 <li>Added support for further updates, </li>
 
</ul>
<hr class="hr">
                <p>17-06-2018</p>
		<h1>Beta 1.0</h1>
		Changes:
<ul>
 <li>Added  many skills and "skills" tab, </li>
 <li>Added "attribute" tab, </li>
 <li>Expanded "adventure" tab, </li>
 <li>Added few new opponents and skills for them, </li>
 <li>Character progression is now more visible, </li>
 <li>Some graphics changes </li>
</ul>
<hr class="hr">

            </div>

</div>







</body>










</html>
