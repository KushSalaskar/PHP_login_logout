<?php

session_start();
session_unset();
session_commit();
session_destroy();
header("Location:../Lphp/site.php?Loggedout");
exit();
?>


