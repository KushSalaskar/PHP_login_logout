
<?php
session_start();
if(isset($_SESSION['uidstart'])){

echo'<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Homepage</title>
</head>
<body>
	
	<header>
	<nav class="nav-links">
		<ul>
			<li><a href="#"> Home</a></li>
			<li><a href="#">Profile</a></li>
			
		</ul>

	</nav>
			<form class="lgscript" action="logout.inc.php">
			<input type="submit" name="logout" value="Logout">
			</form>
	</header>


</body>
</html>';
}
else {
	header("Location:../Lphp/site.php");
	exit;
}
?>