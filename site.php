<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content=" width = device-width, initial-scale = 1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login page</title>
</head>
<body>
	<form class="formcolor" action="login.inc.php" method="post">
		<h1>LOGIN</h1>
		<?php 
			if (isset($_GET['error'])) {
				if ($_GET['error']=='emptyfields') {
					echo '<p class="errormsg">Please fill all the details!</p>';
				}
				elseif ($_GET['error']=='wrongpassword') {
					echo '<p class="errormsg">Please enter correct Password!</p>';
				}
				elseif ($_GET['error']=='nouser') {
					echo '<p class="errormsg">This user does not exist!Please create an Account.</p>';
				}
				
				
			}
		?>
		<input type="text" name="userid" placeholder="Username or Email..." >
		<input type="password" name="passwordUSE" placeholder="Password..." >
		<input type="submit" name="login-btn" value="Login">
		<a href="signup.php" name="crUserUrl" >Create Account</a>
	</form>
	

</body>
</html>