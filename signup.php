<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Create an Account</title>
</head>
<body>
	<form class="formcolor" action="signup.inc.php" method="post">
		<h1>Create an Account</h1>
		<h3>Its easy and quick!</h3>
		<?php
			if (isset($_GET['error'])) {

			 	if ($_GET['error']=='emptyfields') {
			 		echo '<p class="errormsg">Please fill all the details!</p>';
			 	}
			 	elseif ($_GET['error']=='invalidmailUsername') {
			 		echo '<p class="errormsg">Please enter valid Username and Email address!</p>';
			 	}
			 	elseif ($_GET['error']=='invalidmail') {
			 		echo '<p class="errormsg">Please enter valid Email address!</p>';
			 	}
			 	elseif ($_GET['error']=='invalidUsername') {
			 		echo '<p class="errormsg">Please enter valid Username!</p>';
			 	}
			 	elseif ($_GET['error']=='passwordcheck') {
			 		echo '<p class="errormsg">The re-entered password does not match!</p>';
			 	}
			 	elseif ($_GET['error']=='UsernameTaken') {
			 		echo '<p class="errormsg">This username already exists! Please try another.</p>';
			 	}
			 } 
			 elseif ($_GET['success']=='signup') {
			 	echo '<p class="successmsg">Account successfully created!</p>';

			 }
			 else{
			 	header("Location:../Lphp/signup.php?error=emptyfields");
			 	exit();
			 }
			
		?>
		<input type="text" name="uidcreate" placeholder="Username...">
		<input type="text" name="mailcreate" placeholder="E-mail Address...">
		<input type="password" name="pw-create" placeholder="Password...">
		<input type="password" name="pw-checkcreate" placeholder="Confirm Password...">
		<input type="submit" name="createuser" value="Sign Up">
		<a href="site.php">Already an existing User?</a>
	</form>

</body>
</html>