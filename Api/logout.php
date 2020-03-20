<?php
session_destroy();
unset($_SESSION['email'],
	$_SESSION['password']);
	header('location: /../sistema-escolar/index.php');
?>
