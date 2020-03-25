<?php
session_start();
include_once 'conexao.php';

$email = $_POST['email'];
$password = $_POST['password'];
$descrypt = sha1($password);

if (empty($email) || empty($password)){
    $_SESSION['loginVazio'] = "Informe o usuário e a senha";
	header('location: /../sistema-escolar/index.php');
     exit;
}

$sql_verifica = "SELECT * FROM usuarios WHERE email='$email' AND password='$descrypt' LIMIT 1";
$executa = $conexao->query($sql_verifica);
$resultado = $executa->fetch_assoc();

if(empty($resultado)) {
  $_SESSION['loginIncorreto'] = "Usuário  ou senha incorreto!";
  header('location: /../sistema-escolar/index.php');
}else{
  $_SESSION['email'] = $resultado['email'];
  $_SESSION['password'] = $resultado['password'];
  $_SESSION['nomeUser'] = $resultado['nomeUser'];
  header('location: ../View/painelAdm.php');
}
?>
