<?php

$servername = "localhost";
$dBusername = "root";
$dBpassword = "";
$dBname = "fbclone";

$conn = mysqli_connect($servername, $dBusername, $dBpassword, $dBname);
if (!$conn) {
	die("Connection failed:".mysqli_connect_error());
}
