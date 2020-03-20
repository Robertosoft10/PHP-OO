<?php
session_start();
include_once '../Api/classUsuarioDao.php';

if(isset($_GET['userId'])){

    $objtUser = new Usuario();

    $objtUser->setUserId($_GET['userId']);
    $objtUser->setNomeUser($_POST['nomeUser']);
    $objtUser->setEmail($_POST['email']);
    $objtUser->setPassword(sha1($_POST['password']));
    $objtUser->setTipo($_POST['tipo']);
    $objtUser->setStatus($_POST['status']);

    $dao = new UsuarioDAO();
    $dao->updateUsusario($objtUser);

    $_SESSION['userAtualizado'] = "Dados atualizados sucesso!";
    header('location: ../View/usuarios.php');

}else{
   $_SESSION ['useroNaoAtualizado'] = "Falha na atualização dos dados";
   header('location: ../View/usuarios.php');
}
?>