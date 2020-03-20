<?php
session_start();
include_once 'conexao.php';

$username = $_POST['username'];
$password = $_POST['password'];
$descrypt = sha1($password);

if (empty($username) || empty($password)){
    $_SESSION['loginVazio'] = "Informe o usuário e a senha";
	header('location: /../PHP-OO/index.php');
     exit;
}

$sql_verifica = "SELECT * FROM usuarios WHERE username='$username' AND password='$descrypt' LIMIT 1";
$executa = $conexao->query($sql_verifica);
$resultado = $executa->fetch_assoc();

if(empty($resultado)) {
  $_SESSION['loginIncorreto'] = "Usuário  ou senha incorreto!";
  header('location: /../PHP-OO/index.php');
}else{
  $_SESSION['username'] = $resultado['username'];
  $_SESSION['password'] = $resultado['password'];
  header('location: ../View/alunos.php');
}
?>