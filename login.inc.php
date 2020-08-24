<?php

require 'dbh.php';

$mailuid = $_POST['userid'];
$pass = $_POST['passwordUSE'];

if (empty($mailuid) || empty($pass)) {
	header("Location:../Lphp/site.php?error=emptyfields&usernname=".$mailuid);
	exit();
}

else {
	$sql = "SELECT * FROM users WHERE Username=? OR Emailusers=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location:../Lphp/site.php?error=sqlerror");
		exit();
	}

	else{
		mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if ($row = mysqli_fetch_assoc($result)) {
			$pwdcheck = password_verify($pass, $row['PassUsers']);
			if ($pwdcheck == false) {
				header("Location:../Lphp/site.php?error=wrongpassword");
				exit();
			}
			elseif ($pwdcheck == true) {
				session_start();
				$_SESSION['uidstart'] = $row['UserID'];
				$_SESSION['uiduserstart'] = $row['Username'];
				if (isset($_SESSION['uiduserstart'])) {
					header("Location:../Lphp/homepage.php");
					exit();
				}
				else{
					header("Location:../Lphp/site.php?error=nosession");
					exit();
				}
				
			}
			else{
				header("Location:../Lphp/site.php?error=wrongpassword");
				exit();
			}
		}
		else{
			header("Location:../Lphp/site.php?error=nouser");
			exit();
		}
	}


}