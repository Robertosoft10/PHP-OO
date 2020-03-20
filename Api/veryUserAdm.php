<?php
session_start();
require_once 'conexao.php';
if(isset($_POST['email']) && isset($_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$descrypt = sha1($password);
	
	$get = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email='$email' AND password='$descrypt'");
	$num = mysqli_num_rows($get);
		if($num == 1){
			while($percorre = mysqli_fetch_array($get)){
				$tipo = $percorre['tipo'];

			if($tipo == 'Admin'){
				$_SESSION['Admin'] = $email;
				header('Location: ../View/usuarios.php');
			}else{
				header('Location: ../View/admUser.php');
					$_SESSION['adminFazio'] = 'Atenção! Esta área é apenas para usuário Administrador!';
			}

		}

		}else{
			$_SESSION['adminErro'] = 'Usuário ou senha invalidos';
			header('Location: ../View/admUser.php');
		}
	}
?>
