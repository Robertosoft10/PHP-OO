<?php
ob_start();
if(($_SESSION['email'] == "") || ($_SESSION['password'] == "")) {
	$_SESSION['secury'] = "Login obrigatório";
	header('location: /../sistema-escolar/index.php');
}

?>
