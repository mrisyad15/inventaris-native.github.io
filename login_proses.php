<?php
session_start();
include "config/conn.php";

if (isset($_POST['email']) && isset($_POST['pw']))
{
	$email = $_POST['email'];
	$pw   = md5($_POST['pw']);
	
	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '".$email."' AND password = '".$pw."' AND active = 'Y'");

	if (mysqli_num_rows($result) > 0 ) {
		$_SESSION['user'] = mysqli_fetch_array($result);
		header("Location: pages/index.php");
		die();
	}
}
echo "<script>alert('Wrong username or password! or your account not verified.'); location='login.php';</script>";
?>