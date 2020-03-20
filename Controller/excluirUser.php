<?php
session_start();
include_once '../Api/classUsuarioDao.php';

if(isset($_GET['userId'])){
$usuarioDAO = new UsuarioDAO();
$usuarioDAO->deleteUsuario($_REQUEST['userId']);
    
    $_SESSION['userDeletado'] = "Registro deletado com sucesso";
    header('location: ../View/usuarios.php');
}else{
    $_SESSION['userNaoDeletado'] = "Falha! Registro não deletado";
    header('location: ../View/usuarios.php');
}

?>