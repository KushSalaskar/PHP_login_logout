<?php

	require 'dbh.php';

	$username = $_POST['uidcreate'];
	$email = $_POST['mailcreate'];
	$pass = $_POST['pw-create'];
	$passcheck = $_POST['pw-checkcreate'];

	if (empty($username) || empty($email) || empty($pass) || empty($passcheck)) {
		header("Location:../Lphp/signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}

	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location:../Lphp/signup.php?error=invalidmailUsername");
		exit();
	}

	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location:../Lphp/signup.php?error=invalidmail&uid=".$username);
		exit();
	}

	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location:../Lphp/signup.php?error=invalidUsername&mail=".$email);
		exit();

	}

	elseif ($pass != $passcheck) {
		header("Location:../Lphp/signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();
	}

	else{

		$sql = "SELECT Username FROM users WHERE Username=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location:../Lphp/signup.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location:../Lphp/signup.php?error=UsernameTaken&mail=".$mail);
				exit();
			}
			else{
				$sql = "INSERT INTO users(Username, Emailusers, PassUsers) VALUES (?, ?, ?);";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location:../Lphp/signup.php?error=sqlerror");
					exit();
				}
				else{
					$hashedPass = password_hash($pass, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPass);
					mysqli_stmt_execute($stmt);
					header("Location:../Lphp/signup.php?success=signup");
					exit();
				}
			}
		}

	}
mysqli_stmt_close($stmt);
mysqli_close($conn);
